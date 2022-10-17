<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class C_Auth extends Controller{
	public function __construct(){
		$this->addFunction('url');
		if(isset($_SESSION['login'])) {
			header('Location: ' . base_url('dashboard'));
		}

		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
	}
	
	public function index(){
		$this->view('login');
	}

	public function login(){
		if(!isset($_POST['login'])) redirect();
		else {
			$username = $this->req->post('username');
			$password = $this->req->post('password');

			$akun = $this->akun->cek_login($username);
			
			if($akun->num_rows > 0){
				$akun = $akun->fetch_object();
				if(password_verify($password, $akun->password)){
					setSession('login', [
						'auth' => true,
						'nama' => $akun->nama,
						'username' => $akun->username,
						'foto' => $akun->foto,
						'waktu' => date('d M Y H:i:s')
					]);
					redirect('dashboard');
				} else {
					setSession('error', 'Password salah!');
					redirect();
				}
			} else {
				setSession('error', 'Username tidak ditemukan!');
				redirect();
			}
		}
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect();
		
		if($_POST['password'] !== $_POST['password2']) {
			setSession('error', 'Password tidak sama!');
			redirect('akun');
		} else {
			// proses upload
			$upload_dir = BASEPATH . DS . 'uploads' . DS;
			$asal = $_FILES['foto']['tmp_name'];
			$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
			$error = $_FILES['foto']['error'];

			$img_name = $this->req->post('nama');
			$img_name = $this->req->post('nama');
			$img_name = strtolower($img_name);
			$img_name = str_replace(' ', '-', $img_name);
			$img_name = $img_name . '-' . time();

			if($error == 0){
				if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
				
				if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
					$data = [
						'nama' => $this->req->post('nama'),
						'nohp' => $this->req->post('nohp'),
						'username' => $this->req->post('username'),
						'password' => password_hash($this->req->post('password'), PASSWORD_DEFAULT),
						'foto' => $img_name . '.' . $ekstensi,
					];

					if($this->akun->tambah($data)){
						setSession('success', 'Data berhasil ditambahkan!');
						redirect('auth');
					} else {
						setSession('error', 'Data gagal ditambahkan!');
						redirect('auth');
					}
				} else die('gagal upload gambar');
			} else die('gambar error');
		}
	}

	public function logout(){
		unset($_SESSION['login']);
		redirect('auth/login');
	}
}