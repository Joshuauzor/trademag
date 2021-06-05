<?php
if(!function_exists('send_mail')) {
    function send_mail($to, $subject, $reason, $message){
        $email = \config\Services::email();
       
        $email->setTo($to);
        $email->setFrom('Zealtechnologies10@gmail.com', $reason);
        $email->setSubject($subject);
        $email->setmessage($message);

        if($email->send()){
        // echo "success";
        return true;
        // $session->setFlashdata('success', 'Account created successfully. Please check your mail to activate your account within an hour.');
        // return redirect()->to(current_url());
        }
        else{
            // $err = $email->printDebugger(['headers']);
            //             print_r($err); die;
            return false;
        // $data = $email->printDebugger(['headers']);
        // print_r($data);
        }
    }
}
