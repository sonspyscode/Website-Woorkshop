<?php 

class C_Service extends Controller{
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
		$this->service = $this->model('M_Service');
	}

	public function index(){
		$data = [
			'aktif' => 'service',
			'judul' => 'Data Service',
			'data_cabang' => $this->cabang->lihat(),
			'data_service' => $this->service->lihat(),
			'no' => 1
		];
		$this->view('service/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('service');

		// proses upload
		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];

		$img_name = $this->req->post('nama');
		$img_name = $this->req->post('nama');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();

		if($error == 0){
			if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
			
			if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
				$data = [
					'id_cabang' => $this->req->post('id_cabang'),
					'nama' => $this->req->post('nama'),
					'alamat' => $this->req->post('alamat'),
					'jumlah_tkns' => $this->req->post('jumlah_tkns'),
					'jeniskndrn' => $this->req->post('jeniskndrn'),
					'biaya' => $this->req->post('biaya'),
					'gambar' => $img_name . '.' . $ekstensi,
				];

				if($this->service->tambah($data)){
					setSession('success', 'Data berhasil ditambahkan!');
					redirect('service');
				} else {
					setSession('error', 'Data gagal ditambahkan!');
					redirect('service');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}

	public function detail($id){
		if(!isset($id) || $this->service->cek($id)->num_rows == 0) redirect('service');

		$data = [
			'aktif' => 'service',
			'judul' => 'Detail Service',
			'service' => $this->service->detail($id)->fetch_object(),
		];

		$this->view('service/detail', $data);
	}

	public function ubah($id){
		if(!isset($id) || $this->service->cek($id)->num_rows == 0) redirect('service');

		$data = [
			'aktif' => 'service',
			'judul' => 'Ubah Service',
			'service' => $this->service->lihat_id($id)->fetch_object(),
			'data_cabang' => $this->cabang->lihat(),
		];
		$this->view('service/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->service->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('service');

		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];

		$img_name = $this->req->post('nama');
		$img_name = $this->req->post('nama');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();

		$data = [
			'id_cabang' => $this->req->post('id_cabang'),
			'nama' => $this->req->post('nama'),
			'alamat' => $this->req->post('alamat'),
			'jumlah_tkns' => $this->req->post('jumlah_tkns'),
			'jeniskndrn' => $this->req->post('jeniskndrn'),
			'biaya' => $this->req->post('biaya'),
			'gambar' => $img_name . '.' . $ekstensi,
		];

		$gambar_sebelumnya = $this->service->detail($id)->fetch_object()->gambar;

		if($this->service->ubah($data, $id)){
			unlink($upload_dir . $gambar_sebelumnya) or die('gagal hapus gambar lama');
			if($error == 0){
				if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
			
				if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
					setSession('success', 'Data berhasil diubah!');
					redirect('service');
				} else die('gagal upload gambar');
			} else die('gambar error');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('service');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->service->cek($id)->num_rows == 0) redirect('service');

		$gambar	= $this->service->detail($id)->fetch_object()->gambar;
		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->service->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('service');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('service');
		}
	}
}