<?php
namespace App\Controllers;

use App\Models\RequestModel;

class Home extends BaseController
{
	public function __construct()
	{
		helper(['form', 'url', 'date']);
	}
	
	public function index(){
		$data['title'] = 'Home | Trademagoptions';
		echo view('landing/home', $data);
	}

	#terms
	public function terms(){
		$data['title'] = 'terms and condition | Trademagoptions';
		echo view('landing/terms', $data);
	}

	#contact
	public function contact(){
		$data['title'] = 'Contact | Trademagoptions';
		echo view('landing/contact', $data);
	}

	#register
	public function register(){
		$data['title'] = 'Register | Trademagoptions';
		echo view('landing/register', $data);
	}

	#login
	public function login(){
		$data['title'] = 'Login | Trademagoptions';
		echo view('landing/login', $data);
	}
}


