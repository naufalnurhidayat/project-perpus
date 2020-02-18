<?php 

class Buku_model extends CI_model {
	public function getAllBuku() {
		return $this->db->get('tb_buku')->result_array();
	}

	public function tambahDataBuku() {
		$data = [
			"judul_buku" => $this->input->post('judul_buku', true),
			"pengarang_buku" => $this->input->post('pengarang_buku', true),
			"penerbit_buku" => $this->input->post('penerbit_buku', true),
			"stok" => $this->input->post('stok', true)
		];

		$this->db->insert('tb_buku', $data);
	}

	public function hapusDataBuku($id_buku) {
		$this->db->where('id_buku', $id_buku);
		$this->db->delete('tb_buku');
	}

	public function getBukuById_buku($id_buku) {
		return $this->db->get_where('tb_buku', ['id_buku' => $id_buku])->row_array();
	}

	public function ubahDataBuku() {
		$data = [
			"judul_buku" => $this->input->post('judul_buku', true),
			"pengarang_buku" => $this->input->post('pengarang_buku', true),
			"penerbit_buku" => $this->input->post('penerbit_buku', true),
			"stok" => $this->input->post('stok', true)
		];

		$this->db->where('id_buku', $this->input->post('id_buku'));
		$this->db->update('tb_buku', $data);
	}

	public function cariDataBuku() {
		$keyword = $this->input->post('keyword', true);
		$this->db->like('judul_buku', $keyword);
		$this->db->or_like('pengarang_buku', $keyword);
		$this->db->or_like('penerbit_buku', $keyword);
		return $this->db->get('tb_buku')->result_array();
	}

	public function setStokPinjam() {
		$id_buku = $this->input->post('judul', true);
		$data_buku = $this->getBukuById_buku($id_buku);
		$data = [
			"stok" => (int) $data_buku['stok'] - 1
		];
		$this->db->where('id_buku', $id_buku);
		$this->db->update('tb_buku', $data);

	}

	public function setStokKembali($id_buku) {
		$data_buku = $this->getBukuById_buku($id_buku);
		$data = [
			"stok" => (int) $data_buku['stok'] + 1
		];
		$this->db->where('id_buku', $id_buku);
		$this->db->update('tb_buku', $data);

	}
}

 ?>