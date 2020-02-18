<?php 

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('username')) {
			header('Location: user/login');
		}
	}

	public function index() {
		$data['judul'] = 'Home';
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}

?>