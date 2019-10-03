<?php 

class User extends Controller {
	public function index() {
		$data['judul']	= 'Halaman User';
		$data['user']	= $this->model('User_model')->getUsers();

		$this->model('User_model')->cekUserSudahLogin();

		$this->view('templates/headerCore', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');
	}

	public function profile() {
		$data['judul']	= 'Profile';
		$data['user']	= $this->model('User_model')->generate($_SESSION["username"]);

		$this->model('User_model')->cekUserSudahLogin();

		$this->view('templates/headerCore',$data);
		$this->view('User/profile',$data);
		$this->view('templates/footer');
	}

	public function ubahPassword() {
		$data['judul']	= 'Halaman Ubah password';

		$this->model('User_model')->cekUserSudahLogin();

		$this->view('templates/headerCore',$data);
		$this->view('User/ubahPassword');
		$this->view('templates/footer');
	}

	public function ubahPasswordProsses() {
		$user = new User_Core();
		
		$this->model('User_model')->cekUserSudahLogin();

		// ambil semua data user yang akan diupdate dari database
		$user->generate($_SESSION["username"]);

		if (!empty($_POST)) {
		  // jika terdeteksi form $_POST di submit, jalankan proses validasi
		  $pesanError = $user->validasiUbahPassword($_POST);
		  if (empty($pesanError)) {
		    // jika tidak ada error, proses update password
		    $user->ubahPassword();
		    header('Location:' . BASEURL . '/User/ubahPasswordBerhasil');
		  }else {
		  	$data['judul']	= 'Halaman Ubah password';
		  	$data['error']	= $pesanError;

			$this->model('User_model')->cekUserSudahLogin();

			$this->view('templates/headerCore',$data);
			$this->view('User/ubahPassword', $data);
			$this->view('templates/footer');
		  }
		}
	}

	public function ubahPasswordBerhasil() {
		$data['judul']	= 'Stock Management';

		$this->model('User_model')->cekUserSudahLogin();

		$this->view('templates/headerCore', $data);
		$this->View('user/ubahPasswordBerhasil');
		$this->view('templates/footer');
	}
}