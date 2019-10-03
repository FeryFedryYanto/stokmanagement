<?php 

class DB_Generate_Tabel_Barang_Dan_User extends Controller {

	public function index() {
		// Judul Halaman
		$data['judul'] = 'Inventory';

		$this->view('templates/header', $data);
		$this->model('DB_Generate_Tabel_Barang_Dan_User_Model')->buatTabelBarangDanUser();
		$this->view('templates/footer');
	}

}