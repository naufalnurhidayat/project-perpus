<?php 

class Transaksi extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('username')) {
			header('Location: user/login');
		}

		$this->load->model('Transaksi_model');
		$this->load->model('Buku_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$data['judul'] = 'Pinjam buku';
		$data['anggota_pinjam'] = $this->Transaksi_model->getAllAnggotaPinjam();
		$data['buku_pinjam'] = $this->Transaksi_model->getAllBukuPinjam();

		$this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		if( $this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/index', $data);
			$this->load->view('templates/footer');
		} else {
			$insert_data = $this->Transaksi_model->tambahDataPinjam();
			
			if ($insert_data == TRUE) {
				$this->Buku_model->setStokPinjam();
			}
			
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('transaksi/data_transaksi');
		}
	}

	public function data_transaksi() {
		$data['judul'] = 'Data Peminjaman';
		$data['data_peminjaman'] = $this->Transaksi_model->getAllPeminjaman();

		if( $this->input->post('keyword') ) {
			$data['data_peminjaman'] = $this->Transaksi_model->cariDataPeminjaman();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/data_transaksi');
		$this->load->view('templates/footer');
	}

	public function bukuKembali($id_transaksi, $id_buku) {
		$kembali = $this->Transaksi_model->bukuKembali($id_transaksi);
		if ($kembali == TRUE) {
		
			$buku = $this->Buku_model->setStokKembali($id_buku);
		
		}
		$this->session->set_flashdata('flash', 'Dikembalikan');
		redirect('transaksi/data_transaksi');
	}

	public function perpanjangBuku($id_transaksi) {
		$data['judul'] = 'Data peminjaman';
		$data['data_peminjaman'] = $this->Transaksi_model->getPeminjamanById_peminjaman($id_transaksi);
		if( $data == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/data_transaksi', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Transaksi_model->perpanjangBuku($id_transaksi);
			$this->session->set_flashdata('flash', 'Diperpanjang');
			redirect('transaksi/data_transaksi');
		}
	}
}

?>