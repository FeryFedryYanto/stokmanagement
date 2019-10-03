<?php

class Register extends Controller {
	
	public function index() {
		$data['judul']	= 'Register User';
		$data['user']	= $this->model('User_model')->getUser();

		$this->model('User_model')->cekUserBelumLogin();

		$this->view('templates/header',$data);
		$this->view('Register/index',$data);
		$this->view('templates/footer');
	}

	public function cekRegister() {
		$this->model('User_model')->registerUser($_POST);
	}

	public function register_berhasil() {
		$data['judul']	= 'Register User';

		$this->view('templates/header',$data);
		$this->view('Register/register_berhasil',$data);
		$this->view('templates/footer');
	}

}
