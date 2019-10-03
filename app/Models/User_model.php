<?php 

class User_model extends Controller {
	private $_db;
	private $_user;
 
	public function __construct() {
		$this->_db		= New Database();
		$this->_user = New User_core();
	}

	public function getUser() {
		return $this->_user;
	}

	public function userLogin() {

		if (!empty($_POST)) {
		  $pesanError = $this->_user->validasiLogin($_POST);
		  if (empty($pesanError)) {
		    // jika tidak ada error, proses login user
		    return $this->_user->login();
		  } else {
		  	$data['judul'] 	= 'Login';
		  	$data['user']	= $this->getUser();
		  	$data['pesanError'] = $pesanError;
		  	$this->view('templates/header', $data);
			$this->view('Login/index',$data);
			$this->view('templates/footer');
		  }
		} else {
			global $pesanError;

			$data['judul'] 	= 'Login';
		  	$data['user']	= $this->getUser();
		  	$data['pesanError'] = $pesanError;
		  	$this->view('templates/header', $data);
			$this->view('Login/index',$data);
			$this->view('templates/footer');
		}
	}

	public function  registerUser(){
		if (!empty($_POST)) {
		  // jika terdeteksi form $_POST di submit, jalankan proses validasi
		  $pesanError = $this->_user->validasiInsert($_POST);
		  if (empty($pesanError)) {
		    // jika tidak ada error, proses insert user
		    $this->_user->insert();
		    header('Location:' . BASEURL . '/Register/register_berhasil');
		  } else {
		  	$data['judul'] 	= 'Register User';
		  	$data['user']	= $this->getUser();
		  	$data['pesanError'] = $pesanError;
		  	$this->view('templates/header', $data);
			$this->view('Register/index',$data);
			$this->view('templates/footer');
		  }
		} else {
			global $pesanError;

			$data['judul'] 	= 'Register User';
		  	$data['user']	= $this->getUser();
		  	$data['pesanError'] = $pesanError;
		  	$this->view('templates/header', $data);
			$this->view('Register/index',$data);
			$this->view('templates/footer');
		}
	}

	public function ubahPasswordAkun() {
		// ambil semua data user yang akan diupdate dari database
		$user->generate($_SESSION["username"]);

		if (!empty($_POST)) {
		  // jika terdeteksi form $_POST di submit, jalankan proses validasi
		  $pesanError = $user->validasiUbahPassword($_POST);
		  if (empty($pesanError)) {
		    // jika tidak ada error, proses update password
		    $user->ubahPassword();
		    header('Location:ubah_password_berhasil.php');
		  }
		}
	}

	public function getUsers() {

		if (!empty($_POST)) {
		 return $tabelBarang = $this->_db->getLike('user','username', '%'.Input::getSearch('search')."%");
		}
		else {
		  return $tabelBarang = $this->_db->get('user');
		}
	}

	public function cekUserSudahLogin() {
		$this->_user->cekUserSessionBelumAda();
	}

	public function cekUserBelumLogin() {
		$this->_user->cekUserSessionSudahAda();
	}

	public function logout() {
		return $this->_user->logout();
	}

	public function generate($item) {
		$user = new User_core();

		$user->generate($item);

		return $user;
	}
}
	