<?php 

class Transaksi_model extends CI_Model {
	public function getAllAnggotaPinjam() {
		return $this->db->get('tb_anggota')->result_array();
	}

	public function getAllBukuPinjam() {
		return $this->db->get('tb_buku')->result_array();
	}

	public function tambahDataPinjam() {
		$data = [
			"nis" => $this->input->post('nama', true),
			"id_buku" => $this->input->post('judul', true),
			"tanggal_peminjaman" => $this->input->post('tanggal_pinjam', true),
			"tanggal_pengembalian" => $this->input->post('tanggal_kembali', true)
		];

		return $this->db->insert('tb_transaksi', $data);
	}

	public function getAllPeminjaman() {
		return $this->db->select('*')
						->from('tb_transaksi')
						->join('tb_anggota', 'tb_anggota.nis = tb_transaksi.nis')
						->join('tb_buku', 'tb_buku.id_buku = tb_transaksi.id_buku')
						->get()
						->result_array();
	}

	public function getPeminjamanById_peminjaman($id_transaksi) {
		return $this->db->get_where('tb_transaksi', ['id_transaksi' => $id_transaksi])->row_array();
	}

	public function cariDataPeminjaman() {
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama', $keyword);
		$this->db->or_like('judul_buku', $keyword);
		$this->db->or_like('tanggal_peminjaman', $keyword);
		$this->db->or_like('tanggal_pengembalian', $keyword);
		return $this->getAllPeminjaman();
	}

	public function bukuKembali($id_transaksi) {
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('tb_transaksi');
	}

	public function perpanjangBuku($id_transaksi) {
		$data = [
			"tanggal_peminjaman" => date('l, d-M-Y'),
			"tanggal_pengembalian" => date('l, d-M-Y', time()+60*60*24*7)
		];

		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('tb_transaksi', $data);
	}
 }

?>