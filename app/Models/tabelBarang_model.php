<?php 

class tabelBarang_model {
	private $_db;
	private $_barang;

	// buat koneksi ke database
	public function __construct() {
		$this->_db		= New Database();
		$this->_barang 	= New Barang();
	}

	public function barangCore() {
		return $this->_barang;
	}

	public function getBarang() {
		if (!empty($_POST)) {
		 return $tabelBarang = $this->_db->getLike('barang','nama_barang', '%'.Input::getSearch('search')."%");
		}
		else {
		  return $tabelBarang = $this->_db->get('barang');
		}
	}

	public function get($id) {
		if (isset($id)) {
			Input::geturl($id);
		}
	}

	public function getBarangWhereId($id) {
		$this->_db->query('SELECT * FROM barang WHERE id_barang=:id');
		$this->_db->bind('id',$id);
		return $this->_db->single();
	}

	public function edit($data) {

		if(empty(Input::get($data['id_barang']))) {
  			die ('Maaf halaman ini tidak bisa diakses langsung');
		}

		if (!empty($data)) {
		  $pesanError = $this->_barang->validasi($data);
		  if (empty($pesanError)) {
    		$query = "UPDATE barang SET
			nama_barang		= :nama_barang,
			jumlah_barang	= :jumlah_barang,
			harga_barang	= :harga_barang 
			WHERE id_barang = :id_barang ";

			$this->_db->query($query);

			$this->_db->bind('id_barang', $data['id_barang']);
			$this->_db->bind('nama_barang', $data['nama_barang']);
			$this->_db->bind('jumlah_barang', $data['jumlah_barang']);
			$this->_db->bind('harga_barang', $data['harga_barang']);

			$this->_db->execute();

			return $this->_db->rowCount();
			    header('Location:' . BASEURL . '/home/tampil_barang');
			  }
			}
	}

	public function delet($id) {

		$query = "DELETE FROM barang WHERE id_barang=:id";

		$this->_db->query($query);
		$this->_db->bind('id', $id);

		$this->_db->execute();

		return $this->_db->rowCount();
	}

	public function tambah($data) {
		if (!empty($data)) {
		 
		  $pesanError = $this->_barang->validasi($data);
		  if (empty($pesanError)) {

    		$query = "INSERT INTO barang 
					(nama_barang, jumlah_barang, harga_barang)
					VALUES
					(:nama_barang, :jumlah_barang, :harga_barang)";

			$this->_db->query($query);

			$this->_db->bind('nama_barang', $data['nama_barang']);
			$this->_db->bind('jumlah_barang', $data['jumlah_barang']);
			$this->_db->bind('harga_barang', $data['harga_barang']);

			$this->_db->execute();

			return $this->_db->rowCount();
			    header('Location:' . BASEURL . '/home/tampil_barang');
			  }
		}
	}
}