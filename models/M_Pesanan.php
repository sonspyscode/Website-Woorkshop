<?php 

class M_Pesanan extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_pesanan', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->setQuery("SELECT tbl_pesanan.id, tbl_member.nama AS nama_member, tbl_service.nama AS nama_service, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_member ON tbl_pesanan.id_member = tbl_member.id INNER JOIN tbl_service ON tbl_pesanan.id_service = tbl_service.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id");
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_pesanan', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT tbl_pesanan.*, tbl_member.nama AS nama_member, tbl_service.nama AS nama_service, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_member ON tbl_pesanan.id_member = tbl_member.id INNER JOIN tbl_service ON tbl_pesanan.id_service = tbl_service.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id WHERE tbl_pesanan.id = $id");
		$query = $this->execute();
		return $query;
	}
}