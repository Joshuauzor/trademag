<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\PlanModel;
use App\Models\InvestedModel;
use App\Models\SettingsModel;

use App\Libraries\App_services;
// import configurations
use Config\Services;
use Config\Database;

class Users extends Controller
{
	public function __construct()
	{
		helper(['form', 'url', 'date', 'mail']);
        $this->app_services = new App_services();
	}


	#dashboard
	public function index(){
		if(! session()->user['userType'] == 'user')
			return redirect()->to(base_url('auth/login'));
		

        $session = session();
        $email = \config\Services::email();
		
		$data['title'] = 'Dashboard | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$limit = 5;
		$data['user_history'] = $invested_model->getUser($limit, array('uuid' => $session->user['uuid']));
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		// var_dump($session->user['uuid']);
		// echo '<pre>'; print_r($data['user_history']); '</pre>'; die;
		echo view('users/index', $data);
	}

	public function trade(){
		if(! session()->user['userType'] == 'user')
			return redirect()->to(base_url('auth/login'));
		

        $session = session();
        $email = \config\Services::email();
		
		$data['title'] = 'Live Trade | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$limit = 5;
		$data['user_history'] = $invested_model->getUser($limit, array('uuid' => $session->user['uuid']));
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		// var_dump($session->user['uuid']);
		// echo '<pre>'; print_r($data['user_history']); '</pre>'; die;
		echo view('users/trade', $data);
	}

	public function verify(){
		if(! session()->user['userType'] == 'user')
			return redirect()->to(base_url('auth/login'));

		$session = session();
        $email = \config\Services::email();
		$data['title'] = 'Verify Account | Trademagoptions';

		$user_model = new UserModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));

		$file = $this->request->getFile('document');
		if($file){	   
			  if ($file->isValid() && ! $file->hasMoved())
			  {
				   $randomName = $file->getRandomName();
				//    $img->move(WRITEPATH.'uploads', $newName);
				//provide random name for file to avoid clash
				if($file->move(FCPATH.'public/users/documents/', $randomName)){
					$path = base_url().'/public/users/documents/'.$file->getName();
					// insert into db
					// var_dump($path); die;
					$data = [
						'document' => $path,
						'account_status' => 'pending'
					];
					$updateDoc = $user_model->updateUser($session->user['uuid'], $data);
					if($updateDoc == true){
						try{
							$to = $session->user['email'];
							$subject = 'Account Verification';
							$reason = 'Action';
							$message = 'Dear '.$session->user['firstname'].' '.$session->user['lastname'].',<br><br> Your Account verification document has been submitted successfully and your account is under review. <br><br> We will inform you once we are done.<br>
							</a><br>Best Regards,<br> 
							Trademagoptions';
		
							#call send_mail helper 
							if(send_mail($to, $subject, $reason, $message)){
								// $session->setFlashdata('success', 'Your document has been submitted successfully');
								echo json_encode(array('status' => 'success', 'redirect' => base_url('users'))); 
							}
							else{
								// $session->setFlashdata('error', 'Opps.. An error occured. We are on it.');
								echo json_encode(array('status' => 'error')); 
							//    $err = $email->printDebugger(['headers']);
							//     print_r($err); die;
							}
						}
						catch (\Exception $e)
						{
							die($e->getMessage());
						}    
					}
					else{
						echo json_encode(array('status' => 'error')); 
					}
				}
				else{
					echo json_encode('error');
					// $session->setFlashdata('error', $file->getErrorString());
					// return redirect()->to(base_url('admin/profile'));
				}
			  }
		   
		}
		else{
			echo view('users/verify', $data);
		}
	}

	// profile
	public function profile(){
		if(! session()->user['userType'] == 'user')
			return redirect()->to(base_url('auth/login'));

        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Profile | Trademagoptions';
		$user_model = new UserModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['countries'] = $this->app_services->getCountries();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		if($this->request->getMethod() == 'post'){
			$rules = [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email'    => [
                    'rules'  => 'required|valid_email|trim',
                    'errors' => [
                        'is_unique' => '{value} already exist!'
                    ]
                ],
                'country' => 'required|trim',
				'username' => 'trim|permit_empty',
				'phone' => 'trim|permit_empty',
				'address' => 'trim|permit_empty',

            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
				$data = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'country' => $this->request->getVar('country'),
					'username' => $this->request->getVar('username'),
					'phone' => $this->request->getVar('phone'),
					'address' => $this->request->getVar('address'),
				];

				$updateUser = $user_model->updateUser($session->user['uuid'], $data);
				if($updateUser){
					$session->setFlashdata('success', 'Profile successfully updated');
					return redirect()->to(current_url());
				}else{
					$session->setFlashdata('error', 'Opps! An Error occured');
					return redirect()->to(current_url());
				}
			}
		}
		echo view('users/profile', $data);
	}
	

	public function history(){
		if(! session()->user['userType'] == 'user')
			return redirect()->to(base_url('auth/login'));

		$session = session();
        $email = \config\Services::email();
		$data['title'] = 'Transaction History | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();
		$limit = null;
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['user_history'] = $invested_model->getUser($limit, array('uuid' => $session->user['uuid']));

		// echo '<pre>'; print_r($data['user_history']); '</pre>'; die;
		echo view('users/history', $data);
	}

	#deposit
	public function deposit(){
		if(! session()->user['userType'] == 'user')
			return redirect()->to(base_url('auth/login'));

		$session = session();
        $email = \config\Services::email();
		$data['title'] = 'Deposit | Trademagoptions';
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		$settings_model = new SettingsModel();

		$data['currentMaster'] = $settings_model->getOne(array('id' => 1));
		$user = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['user'] = $user;
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			// echo '<pre>'; print_r($this->request->getPost()); '</pre>'; die;

			$rules = [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email'    => [
                    'rules'  => 'required|valid_email|trim',
                    'errors' => [
                        'is_unique' => '{value} already exist!'
                    ]
                ],
                'country' => 'required|trim',
				'paymentMethod' => 'trim|required',
				'plan' => 'trim|required',
				'amount' => 'trim|required',
				'avatar' => 'uploaded[depositShot]|max_size[depositShot,4096]|ext_in[depositShot,png,jpeg,jpg,gif,svg]'
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }
			else{
				$checkVerifieAcct = $user->account_status;
				if($checkVerifieAcct == 'verified'){
					$file = $this->request->getFile('depositShot');
					// var_dump($file); die;
					if($file){	   
						if ($file->isValid() && !$file->hasMoved()){
							$randomName = $file->getRandomName();
							//provide random name for file to avoid clash
							if($file->move(FCPATH.'public/users/payment/', $randomName)){
								$path = base_url().'/public/users/payment/'.$file->getName();
								// insert into db
								// split plan
								$planAll = explode("_",$this->request->getVar('plan'));
								$plan = $planAll[0];
								$data = [
									'uuid' => $session->user['uuid'],
									'amount' => $this->request->getVar('amount'),
									'snapshot' => $path,
									'plan' => $plan,
									'status' => 'pending',
									'method' => $this->request->getVar('paymentMethod'),
									'type' => 'deposit',
									'date' => date('Y-m-d')
								];

								$insertDeposit = $invested_model->insert($data);
								if($insertDeposit == true){
									try{
										$to = $session->user['email'];
										$subject = 'Deposit';
										$reason = 'Action';
										$message = 'Dear '.$session->user['firstname'].' '.$session->user['lastname'].',<br><br> Your deposit is pending confirmation. <br><br> We will inform you once we have verified your deposit.<br>
										</a><br>Best Regards,<br> 
										Trademagoptions';
					
										#call send_mail helper 
										if(send_mail($to, $subject, $reason, $message)){
											// $session->setFlashdata('success', 'Your document has been submitted successfully');
											$session->setFlashdata('success', 'Deposit successfully submitted');
											return redirect()->to(base_url('users/deposit'));								}
										else{
											// $session->setFlashdata('error', 'Opps.. An error occured. We are on it.');
											$session->setFlashdata('success', 'Deposit successfully submitted');
											return redirect()->to(base_url('users/deposit'));								//    $err = $email->printDebugger(['headers']);
										//     print_r($err); die;
										}
									}
									catch (\Exception $e)
									{
										die($e->getMessage());
									}    
								}
								else{
									// echo json_encode(array('status' => 'error')); 
									$session->setFlashdata('error', 'Opps an Error Occured');
									return redirect()->to(base_url('users/deposit'));
								}
							}
							else{
								// echo json_encode('error');
								$session->setFlashdata('error', $file->getErrorString());
								return redirect()->to(base_url('users/deposit'));
							}
						}
						else{
							$session->setFlashdata('error', 'An error occured');
							return redirect()->to(base_url('users/deposit'));
						}			
					}
					else{
						$session->setFlashdata('error', 'Screenshot is required');
						return redirect()->to(base_url('users/deposit'));
					}
				}
				else{
					$session->setFlashdata('error', 'Please verify your account to process transaction.');
					return redirect()->to(base_url('users/deposit'));	
				}
			}
		}
		echo view('users/deposit', $data);
	}

	#withdrawal
	public function withdrawal(){
		if(! session()->user['userType'] == 'user')
			return redirect()->to(base_url('auth/login'));

		$session = session();
        $email = \config\Services::email();
		$data['title'] = 'Withdrawal | Trademagoptions';
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		$user = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['user'] = $user;
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			// echo '<pre>'; print_r($this->request->getPost()); '</pre>'; die;

			$rules = [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email'    => [
                    'rules'  => 'required|valid_email|trim',
                    'errors' => [
                        'is_unique' => '{value} already exist!'
                    ]
                ],
                'country' => 'required|trim',
				'paymentMethod' => 'trim|required',
				'amount' => 'trim|required',
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }
			else{	
				$checkVerifieAcct = $user->account_status;
				if($checkVerifieAcct == 'verified'){
					$user_bal = $user->wallet_bal;
					$withdrawal_amt = $this->request->getVar('amount');
					if($withdrawal_amt > $user_bal ){  	
						// insert into db
						//split plan
						$session->setFlashdata('error', 'Insufficient balance!');
						return redirect()->to(current_url());
						
					} else{ 
						$planAll = explode("_",$this->request->getVar('plan'));
						$plan = $planAll[0];
						$data = [
							'uuid' => $session->user['uuid'],
							'amount' => $this->request->getVar('amount'),
							'plan' => $plan,
							'status' => 'pending',
							'method' => $this->request->getVar('paymentMethod'),
							'type' => 'withdrawal',
							'date' => date('Y-m-d')
						];

						$insertDeposit = $invested_model->insert($data);
						if($insertDeposit == true){
							try{
								$to = $session->user['email'];
								$subject = 'Deposit';
								$reason = 'Action';
								$message = 'Dear '.$session->user['firstname'].' '.$session->user['lastname'].',<br><br> Your withdrawal is pending approval. <br><br> We will inform you once withdrawal has been approved. You can contact our live chat support for more information.<br>
								</a><br>Best Regards,<br> 
								Trademagoptions';
			
								#call send_mail helper 
								if(send_mail($to, $subject, $reason, $message)){
									// $session->setFlashdata('success', 'Your document has been submitted successfully');
									$session->setFlashdata('success', 'Withdrawal successfully submitted and awaits approval');
									return redirect()->to(base_url('users/withdrawal'));								}
								else{
									// $session->setFlashdata('error', 'Opps.. An error occured. We are on it.');
									$session->setFlashdata('success', 'withdrawal successfully submitted and awaits approval');
									return redirect()->to(base_url('users/withdrawal'));								//    $err = $email->printDebugger(['headers']);
								//     print_r($err); die;
								}
							}
							catch (\Exception $e)
							{
								die($e->getMessage());
							}    
						}
						else{
							$session->setFlashdata('error', 'Opps an Error Occured');
							return redirect()->to(base_url('users/withdrawal'));
						}
					}
				}
				else{
					$session->setFlashdata('error', 'Please verify your account to process transaction.');
					return redirect()->to(base_url('users/withdrawal'));	
				}
			}
		}
		echo view('users/withdrawal', $data);
	}

}
