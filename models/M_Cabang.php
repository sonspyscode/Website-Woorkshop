<?php 

class M_Cabang extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_cabang', ['cabang' => $data]);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->get('tbl_cabang');
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_cabang', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($cabang, $id){
		$query = $this->update('tbl_cabang', ['cabang' => $cabang], ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_cabang', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_cabang', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}