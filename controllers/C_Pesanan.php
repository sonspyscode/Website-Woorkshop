<?php 

class C_Pesanan extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->pesanan = $this->model('M_Pesanan');
		$this->j_bayar = $this->model('M_Jenis_Bayar');
		$this->service = $this->model('M_Service');
		$this->member = $this->model('M_Member');
	}

	public function index(){
		$data = [
			'aktif' => 'pesanan',
			'judul' => 'Data Pesanan',
			'data_pesanan' => $this->pesanan->lihat(),
			'data_member' => $this->member->lihat(),
			'data_service' => $this->service->lihat(),
			'data_jenis_bayar' => $this->j_bayar->lihat(),
			'no' => 1
		];
		$this->view('pesanan/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('pesanan');
		$data = [
			'id_member' => $this->req->post('id_member'),
			'id_service' => $this->req->post('id_service'),
			'id_jenis_bayar' => $this->req->post('id_jenis_bayar'),
			'harga' => $this->req->post('harga'),
			'jam_service' => $this->req->post('jam_service'),
			'tgl_service' => $this->req->post('tgl_service'),
		];

		if($this->pesanan->tambah($data)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('pesanan');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('pesanan');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->pesanan->cek($id)->num_rows == 0) redirect('pesanan');
		$pesanan = $this->pesanan->lihat_id($id)->fetch_object();
		$id_member = $pesanan->id_member;
		$id_service = $pesanan->id_service;
		$id_jenis_bayar = $pesanan->id_jenis_bayar;

		$data = [
			'aktif' => 'pesanan',
			'judul' => 'Ubah Pesanan',
			'member' => $this->member->lihat_id($id_member)->fetch_object(),
			'service' => $this->service->lihat_id($id_service)->fetch_object(),
			'jenis_bayar' => $this->j_bayar->lihat_id($id_jenis_bayar)->fetch_object(),
			'pesanan' => $pesanan
		];
		$this->view('pesanan/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->pesanan->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('pesanan');

		$data = [
			'jenis_bayar' => $this->req->post('jenis_bayar'),
			'harga' => $this->req->post('harga'),
			'jam_service' => $this->req->post('jam_service'),
			'tgl_service' => $this->req->post('tgl_service'),
		];
		if($this->pesanan->ubah($data, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('pesanan');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('pesanan');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->pesanan->cek($id)->num_rows == 0) redirect('pesanan');

		if($this->pesanan->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('pesanan');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('pesanan');
		}
	}

	public function detail($id){
		if(!isset($id) || $this->pesanan->cek($id)->num_rows == 0) redirect('pesanan');

		$data = [
			'aktif' => 'pesanan',
			'judul' => 'Detail Pesanan',
			'pesanan' => $this->pesanan->detail($id)->fetch_object(),
		];

		$this->view('pesanan/detail', $data);
	}
}