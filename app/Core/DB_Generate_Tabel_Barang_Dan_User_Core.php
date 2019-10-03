<?php 

class DB_Generate_Tabel_Barang_Dan_User_Core extends Controller {
	
	public function cek() {

		try {
		  $mysqli = new mysqli("localhost", "root", "");

		  // Cek apakah database Stock Manager tersedia
		  $mysqli->select_db("Stock_Manager");
		  if ($mysqli->error){
		    throw new Exception();
		  }

		  // Cek apakah tabel barang tersedia
		  $query = "SELECT 1 FROM barang";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception();
		  }

		  // Cek apakah tabel user tersedia
		  $query = "SELECT 1 FROM user";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception();
		  }

		  // tutup koneksi ke database
		  if (isset($mysqli)) {
		    $mysqli->close();
		  }

		  // jika database Stock Manager, tabel barang & user ada, redirect ke halaman login
		  header('Location:' . BASEURL . '/Login');
		}
		catch (Exception $e) {
			$data['judul'] = 'Inventory';
			$this->view('templates/header', $data);
			$this->view('createTabelBarangDanUser/index');
			$this->view('templates/footer');
			exit();
		}
	}

	public function buat() {

		mysqli_report(MYSQLI_REPORT_STRICT);

		try {
		  $mysqli = new mysqli("localhost", "root", "");

		  echo '<center><h3 class="mt-5">Proses Generate Database</h3>
        <hr class="w-50"></center>';

		  // Buat database "Stock_Manager" (jika belum ada)
		  $query = "CREATE DATABASE IF NOT EXISTS Stock_Manager";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }
		  else {
		    echo "<center><li>Database 'Stock_Manager' berhasil di buat / sudah tersedia</li></center>";
		  };

		  // Pilih database "Stock_Manager"
		  $mysqli->select_db("Stock_Manager");
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }
		  else {
		    echo "<center><li>Database 'Stock_Manager' berhasil di pilih</li></center>";
		  };

		  // Hapus tabel "barang" (jika ada)
		  $query = "DROP TABLE IF EXISTS barang";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }

		  // Buat tabel "barang"
		  $query = "CREATE TABLE barang (
		           id_barang INT PRIMARY KEY AUTO_INCREMENT,
		           nama_barang VARCHAR(50),
		           jumlah_barang INT,
		           harga_barang DEC,
		           tanggal_update TIMESTAMP
		           )";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }
		  else {
		    echo "<center><li>Tabel 'barang' berhasil di buat</li></center>";
		  };

		  // Isi tabel "barang"
		  $sekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		  $timestamp = $sekarang->format("Y-m-d H:i:s");

		  $query = "INSERT INTO barang
		    (nama_barang, jumlah_barang, harga_barang, tanggal_update) VALUES
		      ('TV Samsung 43NU7090 4K',5,5399000,'$timestamp'),
		      ('Kulkas LG GC-A432HLHU',10,7600000,'$timestamp'),
		      ('Laptop ASUS ROG GL503GE',7,16200000,'$timestamp'),
		      ('Printer Epson L220',14,2099000,'$timestamp'),
		      ('Smartphone Xiaomi Pocophone F1',25,4750000,'$timestamp'),
		      ('Kipas Angin',2,270000,'$timestamp'),
		      ('Laptop Aple',2,47000000,'$timestamp'),
		      ('Jam Tangan',7,3750000,'$timestamp'),
		      ('Lemari',5,850000,'$timestamp'),
		      ('Tas',12,4750000,'$timestamp')
		    ;";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }
		  else {
		    echo "<center><li>Tabel 'barang' berhasil di isi ".$mysqli->affected_rows."
		         baris data</li></center>";
		  };

		  // Hapus tabel "user" (jika ada)
		  $query = "DROP TABLE IF EXISTS user";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }

		  // Buat tabel "user"
		  $query = "CREATE TABLE user (
		           username VARCHAR(50) PRIMARY KEY,
		           password VARCHAR(255),
		           email VARCHAR(100)
		           )";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }
		  else {
		    echo "<center><li>Tabel 'user' berhasil di buat</li></center>";
		  };

		  // Isi tabel "user"
		  $passwordAdmin = password_hash('rahasia',PASSWORD_DEFAULT);

		  $query = "INSERT INTO user
		    (username, password, email) VALUES
		      ('admin','$passwordAdmin','admin@gmail.com')
		    ;";
		  $mysqli->query($query);
		  if ($mysqli->error){
		    throw new Exception($mysqli->error, $mysqli->errno);
		  }
		  else {
		    echo "<center><li>Tabel 'user' berhasil di isi ".$mysqli->affected_rows."
		         baris data</li></center>";
		  };

		?>
		  </ul>

		  <center>
		  	<hr class="w-50">
		  </center>
		  <center>
		  	<p class="lead">Database berhasil dibuat, silahkan <a href="Login">
		  	Login</a> dengan username: <code>admin</code>, password: <code>rahasia</code>
		  	<br>Atau <a href="Register">Register</a> untuk membuat user baru</p>
		  </center>

		<?php
		}
		catch (Exception $e) {
		  echo "<p>Koneksi / Query bermasalah: ".$e->getMessage().
		       " (".$e->getCode().")</p>";
		}
		finally {
		  if (isset($mysqli)) {
		    $mysqli->close();
		  }
		}
	}
}