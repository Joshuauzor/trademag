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

class Admin extends Controller
{
	public function __construct()
	{
		helper(['form', 'url', 'date', 'mail']);
        $this->app_services = new App_services();
	}


	#dashboard
	public function index(){
		if(! session()->user['userType'] == 'admin')
			return redirect()->to(base_url('auth/login'));
		
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Dashboard | Trademagoptions'; 
		$user_model = new UserModel();
		$invested_model = new InvestedModel();
		$plan_model = new PlanModel();

		$limit = 5;
		$data['user_history'] = $invested_model->getUser($limit, array('uuid' => $session->user['uuid']));
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['users'] = $user_model->getUsers();
		$data['admins'] = $user_model->getAdmin();
		$data['pendingAcct'] = $user_model->getPendingAcct();
		$data['pendingDeposit'] = $invested_model->getPendingDeposit();
		$data['pendingWithdrawal'] = $invested_model->getPendingWithdrawal();
		$data['plans'] = $plan_model->getAll();
		$data['usersTrans'] = $invested_model->getUsersTrans(5);


		// echo '<pre>'; print_r($data['pendingAcct']); '</pre>'; die;

		echo view('admin/index', $data);
	}

	public function users(){
		$session = session();
        $email = \config\Services::email();
		$data['title'] = 'Users | Trademagoptions';

		$user_model = new UserModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['verifiedUsers'] = $user_model->getVerifiedUsers();
		$data['countries'] = $this->app_services->getCountries();
		
		if($this->request->getMethod() == 'post'){
			// echo '<pre>'; print_r($this->request->getPost()); '</pre>'; die;

			$rules = [
                'email' => 'required|string|valid_email',
                'name' => 'required|string',
                'wallet_bal' => 'required|trim',
				'invested' => 'required|trim',
				'withdrawal' =>  'required|trim',
				'bonus' =>  'required|trim',
				'subscription' =>  'required|trim',
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
				$email = $this->request->getVar('email');

				$data = [
					'wallet_bal' => $this->request->getVar('wallet_bal'),
					'invested' => $this->request->getVar('invested'),
					'withdrawal' => $this->request->getVar('withdrawal'),
					'bonus' => $this->request->getVar('bonus'),
					'subscription' => $this->request->getVar('subscription'),
				];

				$check = $user_model->updateUserByEmail($email, $data);
				try{
                    $to = $this->request->getPost('email');
                    $subject = 'Account Update';
                    $reason = 'Update';
                    $message = 'Dear '.$this->request->getVar('name', FILTER_SANITIZE_STRING).',<br><br> Your Trademagoptions trading account has been updated . <br><br> Kindly login to check new trading account update.<br>
                    <a href="'.base_url().'/login" target="_blank">Login Now
                    </a><br>Thanks, Trademagoptions<br>';

                    #call send_mail helper 
                    if(send_mail($to, $subject, $reason, $message)){
                        $session->setFlashdata('success', 'Account successfully updated.');
                        return redirect()->to(current_url());
                    }
                    else{
                        $session->setFlashdata('success', 'Account successfully updated.');
                        return redirect()->to(current_url());
                    //    $err = $email->printDebugger(['headers']);
                    //     print_r($err); die;
                    }
                }
                catch (\Exception $e)
                {
                    die($e->getMessage());
                }


			}
		}
		echo view('admin/users', $data);
	}

	// profile
	public function profile(){
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
		echo view('admin/profile', $data);
	}
	

	public function history(){
		$session = session();
        $email = \config\Services::email();
		$data['title'] = 'Transaction History | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['user_history'] = $invested_model->getUser(array('uuid' => $session->user['uuid']));

		// echo '<pre>'; print_r($data['user_history']); '</pre>'; die;
		echo view('users/history', $data);
	}

	#approve user
	public function approveUser(){
		if (!$this->request->isAJAX())
        {
            exit('No direct allowed');
        }
		$session = session();
        $email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$user_id = $this->request->getVar('userId');
			$data = [
				'account_status' => 'verified'
			];
			$updateUser = $user_model->updateUser($user_id, $data);
			echo json_encode('success');			
		}
	}

	#decline user 
	public function declineUser(){
		if (!$this->request->isAJAX())
        {
            exit('No direct allowed');
        }
		$session = session();
        $email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$user_id = $this->request->getVar('userId');
			$data = [
				'account_status' => 'declined'
			];
			$updateUser = $user_model->updateUser($user_id, $data);
			echo json_encode('success');			
		}
	}

	// pendingWithdrawal
	public function pendingWithdrawal(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Pending Withdrawal | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['countries'] = $this->app_services->getCountries();
		$data['pendingWithdrawal'] = $invested_model->getPendingWithdrawal();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/pendingWithdrawal', $data);
	}
	

	#approve withdrawal
	public function approveWithdrawal(){
		if (!$this->request->isAJAX())
        {
            exit('No direct allowed');
        }
		$session = session();
        $email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$investedId = $this->request->getVar('investedId');

			$data = [
				'status' => 'approved'
			];
			$updateUser = $invested_model->updateOne($investedId, $data);
			echo json_encode('success');			
		}
	}

	#decline withdrawal
	public function declineWithdrawal(){
		if (!$this->request->isAJAX())
		{
			exit('No direct allowed');
		}
		$session = session();
		$email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$investedId = $this->request->getVar('investedId');

			$data = [
				'status' => 'declined'
			];
			$updateUser = $invested_model->updateOne($investedId, $data);
			echo json_encode('success');			
		}
	}

	// pendingWithdrawal
	public function pendingDeposit(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Pending Deposit | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['countries'] = $this->app_services->getCountries();
		$data['pendingDeposit'] = $invested_model->getPendingDeposit();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/pendingDeposit', $data);
	}

	#approve deposit
	public function approveDeposit(){
		if (!$this->request->isAJAX())
        {
            exit('No direct allowed');
        }
		$session = session();
        $email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$investedId = $this->request->getVar('investedId');

			$data = [
				'status' => 'approved'
			];
			$updateUser = $invested_model->updateOne($investedId, $data);
			echo json_encode('success');			
		}
	}

	#decline deposit
	public function declineDeposit(){
		if (!$this->request->isAJAX())
		{
			exit('No direct allowed');
		}
		$session = session();
		$email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$investedId = $this->request->getVar('investedId');

			$data = [
				'status' => 'declined'
			];
			$updateUser = $invested_model->updateOne($investedId, $data);
			echo json_encode('success');			
		}
	}

	#view all approved deposit
	public function approvedDeposit(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Approved Deposit | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['countries'] = $this->app_services->getCountries();
		$data['approvedDeposit'] = $invested_model->getApprovedDeposit();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/approvedDeposit', $data);
	}

	#view all declined deposit
	public function declinedDeposit(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Declined Deposit | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['countries'] = $this->app_services->getCountries();
		$data['declinedDeposit'] = $invested_model->getDeclinedDeposit();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/declinedDeposit', $data);
	}

	#view all approved withdrawal
	public function approvedWithdrawal(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Approved Withdrawal | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['countries'] = $this->app_services->getCountries();
		$data['approvedWithdrawal'] = $invested_model->getApprovedWithdrawal();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/approvedWithdrawal', $data);
	}

	#view all declined withdrawal
	public function declinedWithdrawal(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Declined Withdrawal | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['countries'] = $this->app_services->getCountries();
		$data['declinedWithdrawal'] = $invested_model->getDeclinedWithdrawal();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/declinedWithdrawal', $data);
	}

	#deactivate
	public function deactivateAcct(){
		if (!$this->request->isAJAX())
        {
            exit('No direct allowed');
        }
		$session = session();
        $email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$userId = $this->request->getVar('userId');

			$data = [
				'account_status' => 'suspended'
			];
			$updateUser = $user_model->updateUser($userId, $data);
			echo json_encode('success');			
		}
	}

	#deactivated account
	public function deactivated(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Declined Withdrawal | Trademagoptions';
		$user_model = new UserModel();
		$invested_model = new InvestedModel();

		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['deactivatedAcct'] = $user_model->deactivated();
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/deactivated', $data);
	}

	#activate
	public function activateAcct(){
		if (!$this->request->isAJAX())
        {
            exit('No direct allowed');
        }
		$session = session();
        $email = \config\Services::email();
		$user_model = new UserModel();
		$plan_model = new PlanModel();
		$invested_model = new InvestedModel();
		
		$data['user'] = $user_model->getOne(array('uuid' => $session->user['uuid']));
		$data['plans'] = $plan_model->getAll();
		if($this->request->getMethod() == 'post'){
			$userId = $this->request->getVar('userId');

			$data = [
				'account_status' => 'verified'
			];
			$updateUser = $user_model->updateUser($userId, $data);
			echo json_encode('success');			
		}
	}

	#settings view
	public function settings(){
        $session = session();
        $email = \config\Services::email();
		$data['title'] = 'Settings | Trademagoptions';
		$settings_model = new SettingsModel();

		$data['currentData'] = $settings_model->getOne(array('id' => 1));
		// echo '<pre>'; print_r($data['countries']); '</pre>'; die;
		
		echo view('admin/settings', $data);
	}

	#settings
	public function settingsPost(){
		if (!$this->request->isAJAX())
        {
            exit('No direct allowed');
        }
		$session = session();
        $email = \config\Services::email();
		$settings_model = new SettingsModel();
		
		// var_dump($this->request->getPost('btc_wallet')); die;
		if($this->request->getMethod() == 'post'){

			$data = [
				'btc_id' => $this->request->getPost('btc_wallet'),
			];
			// $updateUser = $user_model->updateUser($userId, $data);
			$insertUser = $settings_model->update('1', $data);
			echo json_encode('success');			
		}
	}
}
