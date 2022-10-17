<?php 

class M_Saran extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_saran', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->get('tbl_saran');
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_saran', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_saran', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_saran', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_saran', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}