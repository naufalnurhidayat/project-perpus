<?php 

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username') && $this->uri->segment(2) != 'logout') {
			redirect(base_url());
		}
		$this->load->library('form_validation');
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE ) {
		$data['judul'] = 'Login';
		$this->load->view('templates/link_header', $data);
		$this->load->view('user/login');
		$this->load->view('templates/link_footer');
		} else{
			// validasinya success
			$this->_login();
		}
	}

	private function _login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

		// jika usernya ada
		if($user) {
			// cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username']
				];
				$this->session->set_userdata($data);
				redirect('home');
			} else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
		redirect('user/login');	
			}
		} else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ada!</div>');
			redirect('user/login');
		}
	}

	public function registrasi() {

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'password tidak sama!',
			'min_length' => 'password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
		$data['judul'] = 'Registrasi';
		$this->load->view('templates/link_header', $data);
		$this->load->view('user/registrasi');
		$this->load->view('templates/link_footer');
		} else{
			$username = htmlspecialchars($this->input->post('username', true));
			$data = [
				'username' => $username,
				'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)
			];

			$user = $this->db->get_where('tb_user', ['username' => $username])->num_rows();

			if ($user > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username sudah ada!</div>');
			redirect('user/registrasi');	
			}

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun telah dibuat</div>');
			redirect('user/login');
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout!</div>');
			redirect('user/login');
	}
}

?>