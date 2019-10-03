<?php 

class Login extends Controller {
	public function index() {
		$data['judul'] 	= 'Login';
		$data['user']	= $this->model('User_Model')->getUser();

		$this->model('User_model')->cekUserBelumLogin();
		
		$this->view('templates/header', $data);
		$this->view('Login/index',$data);
		$this->view('templates/footer');
	}

	public function cekLogin () {
		$this->model('User_model')->userLogin($_POST);
	}
}