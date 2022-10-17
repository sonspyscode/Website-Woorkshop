<?php 

class M_Member extends Model {
	public function lihat(){
		$query = $this->get('tbl_member', ['nama', 'nohp', 'jenis_kelamin', 'id']);
		$query = $this->execute();
		return $query;
	}

	public function tambah($data){
		$query = $this->insert('tbl_member', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_member', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_member', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_member', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->get_where('tbl_member', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_member', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}