<?php 

class Data_anggota extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('username')) {
			header('Location: user/login');
		}

		$this->load->model('Anggota_model');
		$this->load->library('form_validation');
	}
	
	public function index() {
		$data['judul'] = 'Data anggota';
		$data['data_anggota'] = $this->Anggota_model->getAllAnggota();
		if( $this->input->post('keyword') ) {
			$data['data_anggota'] = $this->Anggota_model->cariDataAnggota();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('data_anggota/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$data['judul'] = 'Tambah Data Anggota';

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
		$this->form_validation->set_rules('jenkel', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		if( $this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('data_anggota/tambah');
			$this->load->view('templates/footer');
		} else {
			$nis = htmlspecialchars($this->input->post('nis', true));

			$data = $this->db->get_where('tb_anggota', ['nis' => $nis])->num_rows();

			if ($data > 0) {
				$this->session->set_flashdata('message', 'Ada!');
			redirect('data_anggota/tambah');	
			}
			$this->Anggota_model->tambahDataAnggota();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('data_anggota');
		}
	}

	public function hapus($nis) {
		$this->Anggota_model->hapusDataAnggota($nis);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('data_anggota');
	}

	public function detail($nis) {
		$data['judul'] = 'Detail Anggota';
		$data['anggota'] = $this->Anggota_model->getAnggotaByNis($nis);
		$this->load->view('templates/header', $data);
		$this->load->view('data_anggota/detail', $data);
		$this->load->view('templates/footer');
	}

	public function ubah($nis) {
		$data['judul'] = 'Ubah Data Anggota';
		$data['anggota'] = $this->Anggota_model->getAnggotaByNis($nis);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
		$this->form_validation->set_rules('jenkel', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		if( $this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('data_anggota/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Anggota_model->ubahDataAnggota();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('data_anggota');
		}
	}
}

 ?>