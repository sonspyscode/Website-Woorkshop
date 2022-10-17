<?php 

class C_Cabang extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->cabang = $this->model('M_Cabang');
	}

	public function index(){
		$data = [
			'aktif' => 'cabang',
			'judul' => 'Data Cabang',
			'data_cabang' => $this->cabang->lihat(),
			'no' => 1
		];
		$this->view('cabang/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('cabang');

		$cabang = $this->req->post('cabang');
		if($this->cabang->tambah($cabang)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('cabang');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('cabang');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->cabang->cek($id)->num_rows == 0) redirect('cabang');

		$data = [
			'aktif' => 'cabang',
			'judul' => 'Ubah Cabang',
			'cabang' => $this->cabang->lihat_id($id)->fetch_object(),
		];
		$this->view('cabang/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->cabang->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('cabang');

		$cabang = $this->req->post('cabang');
		if($this->cabang->ubah($cabang, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('cabang');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('cabang');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->cabang->cek($id)->num_rows == 0) redirect('cabang');

		if($this->cabang->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('cabang');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('cabang');
		}
	}
}