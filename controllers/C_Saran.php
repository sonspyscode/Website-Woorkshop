<?php 

class C_Saran extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->saran = $this->model('M_Saran');
	}

	public function index(){
		$data = [
			'aktif' => 'saran',
			'judul' => 'Data Saran',
			'data_Saran' => $this->saran->lihat(),
			'no' => 1
		];
		$this->view('saran/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('saran');
		
		$data = [
			'teks' => $this->req->post('teks'),
		];

		if($this->saran->tambah($data)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('saran');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('saran');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->saran->cek($id)->num_rows == 0) redirect('saran');

		$data = [
			'aktif' => 'saran',
			'judul' => 'Ubah Saran',
			'saran' => $this->saran->lihat_id($id)->fetch_object(),
		];
		$this->view('saran/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->saran->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('saran');

		$data = [
			'teks' => $this->req->post('teks'),
		];
		if($this->saran->ubah($data, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('saran');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('saran');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->saran->cek($id)->num_rows == 0) redirect('saran');

		if($this->saran->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('saran');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('saran');
		}
	}
}