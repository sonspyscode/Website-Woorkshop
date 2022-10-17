<?php 

class C_Akun extends Controller {
	public function __construct(){
		$this->addFunction('url');
		
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
	}

	public function index(){
		$data = [
			'aktif' => 'akun',
			'judul' => 'Data Akun',
			'data_akun' => $this->akun->lihat(),
			'no' => 1
		];
		$this->view('akun/index', $data);
	}

	public function hapus($id = null){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$gambar	= $this->akun->detail($id)->fetch_object()->foto;

		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->akun->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('auth/logout');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('akun');
		}
	}

	public function detail($id){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$data = [
			'aktif' => 'akun',
			'judul' => 'Detail Akun',
			'akun' => $this->akun->detail($id)->fetch_object(),
		];

		$this->view('akun/detail', $data);
	}
}