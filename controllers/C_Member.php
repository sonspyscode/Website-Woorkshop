<?php 

class C_Member extends Controller{
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->member = $this->model('M_Member');
	}

	public function index(){
		$data = [
			'aktif' => 'member',
			'judul' => 'Data Member',
			'data_member' => $this->member->lihat(),
			'no' => 1
		];
		$this->view('member/index', $data);
	}

	public function detail($id){
		if(!isset($id) || $this->member->cek($id)->num_rows == 0) redirect('member');

		$data = [
			'aktif' => 'member',
			'judul' => 'Detail Member',
			'member' => $this->member->detail($id)->fetch_object(),
		];

		$this->view('member/detail', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('member');

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
					'alamat' => $this->req->post('alamat'),
					'jenis_kelamin' => $this->req->post('jenis_kelamin'),
					'foto' => $img_name . '.' . $ekstensi,
				];

				if($this->member->tambah($data)){
					setSession('success', 'Data berhasil ditambahkan!');
					redirect('member');
				} else {
					setSession('error', 'Data gagal ditambahkan!');
					redirect('member');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}

	public function hapus($id = null){
		if(!isset($id) || $this->member->cek($id)->num_rows == 0) redirect('member');

		$gambar	= $this->member->detail($id)->fetch_object()->foto;

		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->member->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('member');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('member');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->member->cek($id)->num_rows == 0) redirect('member');

		$data = [
			'aktif' => 'member',
			'judul' => 'Ubah Member',
			'member' => $this->member->lihat_id($id)->fetch_object(),
		];
		$this->view('member/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->member->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('member');

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
					'alamat' => $this->req->post('alamat'),
					'jenis_kelamin' => $this->req->post('jenis_kelamin'),
					'foto' => $img_name . '.' . $ekstensi,
				];

				if($this->member->ubah($data, $id)){
					setSession('success', 'Data berhasil diubah!');
					redirect('member');
				} else {
					setSession('error', 'Data gagal diubah!');
					redirect('member');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}
}