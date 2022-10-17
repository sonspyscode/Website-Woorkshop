<?php 

class M_Service extends Model {
	public function lihat(){
		$query = $this->setQuery('SELECT nama, tbl_cabang.cabang AS cabang, jumlah_tkns, tbl_service.id as id FROM tbl_service INNER JOIN tbl_cabang ON tbl_cabang.id = tbl_service.id_cabang');
		$query = $this->execute();
		return $query;
	}

	public function tambah($data){
		$query = $this->insert('tbl_service', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->setQuery("SELECT *, tbl_service.id AS id_service, tbl_service.id_cabang AS id_cabang FROM tbl_service INNER JOIN tbl_cabang ON tbl_cabang.id = tbl_service.id_cabang where tbl_service.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_service', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_service', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT *, tbl_service.id AS id_service, tbl_service.id_cabang AS id_cabang FROM tbl_service INNER JOIN tbl_cabang ON tbl_cabang.id = tbl_service.id_cabang where tbl_service.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_service', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}