<?php 

class DB_Generate_Tabel_Barang_Dan_User_Model {
	private $Generate;

	public function __construct() {
		$this->Generate = New DB_Generate_Tabel_Barang_Dan_User_Core();
	}

	public function cekTabelBarangDanUser() {
		$this->Generate->cek();
	}

	public function buatTabelBarangDanUser() {
		$this->Generate->buat();
	}
}