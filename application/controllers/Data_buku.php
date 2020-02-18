<?php 

class Data_buku extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('username')) {
			header('Location: user/login');
		}

		$this->load->model('Buku_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$data['judul'] = 'Data buku';
		$data['data_buku'] = $this->Buku_model->getAllBuku();
		if( $this->input->post('keyword') ) {
			$data['data_buku'] = $this->Buku_model->cariDataBuku();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('data_buku/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$data['judul'] = 'Tambah Data Buku';

		$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang_buku', 'Pengarang Buku', 'required');
		$this->form_validation->set_rules('penerbit_buku', 'Penerbit Buku', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		if( $this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('data_buku/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Buku_model->tambahDataBuku();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('data_buku');
		}
	}

	public function hapus($id_buku) {
		$this->Buku_model->hapusDataBuku($id_buku);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('data_buku');
	}

	public function detail($id_buku) {
		$data['judul'] = 'Detail buku';
		$data['buku'] = $this->Buku_model->getBukuById_buku($id_buku);
		$this->load->view('templates/header', $data);
		$this->load->view('data_buku/detail', $data);
		$this->load->view('templates/footer');
	}

	public function ubah($id_buku) {
		$data['judul'] = 'Ubah Data Buku';
		$data['buku'] = $this->Buku_model->getBukuById_buku($id_buku);

		$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang_buku', 'Pengarang Buku', 'required');
		$this->form_validation->set_rules('penerbit_buku', 'Penerbit Buku', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		if( $this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('data_buku/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Buku_model->ubahDataBuku();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('data_buku');
		}
	}
}

 ?>