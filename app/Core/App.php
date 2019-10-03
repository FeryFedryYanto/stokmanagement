<?php 

class App {
	private $controller = 'Home';
	private $method	 = 'index';
	private $params	 = [];

	public function __construct() {	
		// Tangkap URL yang user ketik kan
		$url = $this->parseURL();
		// Mengecek apakah kalimat yang user masukan di URL sama atau tidak dengan File yang ada di dalam folder Controllers 
		// Jika ada Maka property $controller akan di isi dengan kalimat yang user masukan
		// Jika tidak ada maka gunakan Default $controller = 'Home'
		if(file_exists('../app/Controllers/' . $url[0] . '.php')) {
			// Isi property $controller dengan URL yang user masukan
			$this->controller = $url[0];
			// Hilangkan URL
			unset($url[0]);
		}
		// Sisipkan file 
		require_once '../app/Controllers/' . $this->controller . '.php';
		// Instansiasi property controller, buat mengecek method 
		$this->controller = new $this->controller;

		// cek apakah ada url yang di kirimkan lagi
		if (isset($url[1])) {
			// cek apakah method sama atau tidak 
			if (method_exists($this->controller, $url[1])) {
				// isi property $method dengan URL yang user masukan
				$this->method = $url[1];
				// Hilangkan URL
				unset($url[1]);
			}
		}
		// Cek apakah URL tidak Kosong 
		if (!empty($url)) {
			// Jika tidak kosong maka isi property $params dengan method
			$this->params = array_values($url) ;
		}

		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	public function parseURL() {
		// Jika ada URL yang di kirimkan
		if (isset($_GET['url'])) {
			// Hilangkan /
			$url = rtrim($_GET['url'], '/');
			// Bersihkan URL
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// pecah URL menjadi Array
			$url = explode('/', $url);
			return $url;
		}
	}

}