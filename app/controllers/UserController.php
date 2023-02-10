<?php 

class UserController extends Controller{

	public function login(){
		$data['title'] = 'Login';
		$this->view('templates/header', $data);
		$this->view('user/login');
	}
	public function logout(){
		$this->model('User')->logout();
		header("Location: ".BASEURL."/Home");
	}
}