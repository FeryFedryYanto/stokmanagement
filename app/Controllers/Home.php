<?php

class Home extends Controller {

	public function index() {
		// Cek apakah sudah ada tabel barang dan user, Kalau tidak ada maka akan dibuat, kalau sudah ada tabel barang dan user akan di alihkan ke halaman login / Register
		$this->model('DB_Generate_Tabel_Barang_Dan_User_Model')->cekTabelBarangDanUser();
	}

	public function tampil_barang() {
		$data['judul']			= 'Stock Management';
		$data['tabelBarang']	= $this->model('tabelBarang_model')->getBarang();
		$this->model('User_model')->cekUserSudahLogin();

		$this->view('templates/headerCore', $data);
		$this->View('home/index', $data);
		$this->view('templates/footer');
	}
		
	public function hapusBarang() {
		$this->model('User_model')->cekUserSudahLogin();

		$url = Input::geturl($_GET['url']);

		if(!empty($_SESSION["username"])) {
			if ( $this->model('tabelBarang_model')->delet($url[2]) > 0 ) {
			Flasher::setFlash('Berhasil', 'di hapus', 'success');
			header('Location:' . BASEURL );
			exit();
		}else {
			Flasher::setFlash('gagal', 'di hapus', 'danger');
			header('Location:' . BASEURL );
			exit();
			}
		}else {
			die(header('Location:' . BASEURL));
		}

	}

	public function editBarang($id) {
		$data['judul']	= 'Halaman Edit';
		$data['tabelBarang']	= $this->model('tabelBarang_model')->getBarangWhereId($id);			

		$this->model('User_model')->cekUserSudahLogin();

		$this->view('templates/headerCore',$data);
		$this->view('home/edit',$data);
		$this->view('templates/footer');

	}

	public function editBarangProssess() {
		$this->model('User_model')->cekUserSudahLogin();

		if(!empty($_SESSION["username"])) {
			if ( $this->model('tabelBarang_model')->edit($_POST) > 0 ) {
			Flasher::setFlash('Berhasil', 'di update', 'success');
			header('Location:' . BASEURL );
			exit();
		}else {
			Flasher::setFlash('gagal', 'di update', 'danger');
			header('Location:' . BASEURL );
			exit();
			}
		}else {
			die(header('Location:' . BASEURL));
		}
	}

	public function tambahBarang() {
		$data['judul']	= 'Halaman tambah';
		$data['barang']	= $this->model('tabelBarang_model')->barangCore();

		$this->model('User_model')->cekUserSudahLogin();

		$this->view('templates/headerCore',$data);
		$this->view('home/tambah',$data);
		$this->view('templates/footer');
	}

	public function tambahBarangProssess() {
		$this->model('User_model')->cekUserSudahLogin();

		if(!empty($_SESSION["username"])) {
			if ( $this->model('tabelBarang_model')->tambah($_POST) > 0 ) {
			Flasher::setFlash('Berhasil', 'di tambah', 'success');
			header('Location:' . BASEURL );
			exit();
		}else {
			Flasher::setFlash('gagal', 'di tambah', 'danger');
			header('Location:' . BASEURL );
			exit();
			}
		}else {
			die(header('Location:' . BASEURL));
		}
	}
}	