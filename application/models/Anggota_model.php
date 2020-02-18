<?php 

class Anggota_model extends CI_model {
	public function getAllAnggota() {
		return $this->db->get('tb_anggota')->result_array();
	}

	public function tambahDataAnggota() {
		$data = [
			"nama" => $this->input->post('nama', true),
			"nis" => $this->input->post('nis', true),
			"agama" => $this->input->post('agama', true),
			"jenkel" => $this->input->post('jenkel', true)
		];

		$this->db->insert('tb_anggota', $data);
	}

	public function hapusDataAnggota($nis) {
		$this->db->where('nis', $nis);
		$this->db->delete('tb_anggota');
	}

	public function getAnggotaByNis($nis) {
		return $this->db->get_where('tb_anggota', ['nis' => $nis])->row_array();
	}

	public function ubahDataAnggota() {
		$data = [
			"nama" => $this->input->post('nama', true),
			"nis" => $this->input->post('nis', true),
			"jenkel" => $this->input->post('jenkel', true),
			"agama" => $this->input->post('agama', true)
		];

		$this->db->where('nis', $this->input->post('nis'));
		$this->db->update('tb_anggota', $data);
	}

	public function cariDataAnggota() {
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama', $keyword);
		$this->db->or_like('nis', $keyword);
		$this->db->or_like('jenkel', $keyword);
		$this->db->or_like('agama', $keyword);
		return $this->db->get('tb_anggota')->result_array();
	}
}

 ?>