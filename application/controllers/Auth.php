<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model(['M_download','M_user']);
	}

	public function index(){
		$data = [
			'title' => 'LOGIN',
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('auth/login',$data);
		$this->load->view('template/footer',$data);

	}

	public function proses_login(){
		$this->form_validation->set_rules('username','Username','required|callback_username_check');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run() == FALSE) {

			$data = [
				'title' => 'LOGIN',
			];
	
			$this->load->view('template/header',$data);
			$this->load->view('template/menu',$data);
			$this->load->view('auth/login',$data);
			$this->load->view('template/footer',$data);

		} else {
			if ($this->_cek_password() == TRUE) {
				$username = $this->input->post('username', TRUE);
				$status = $this->M_user->get_user(array('username'=>$username))->row_array();
				if ($status['aktif'] == 1) {
					$data = [
						'username' => $this->input->post('username',TRUE),
						'status' => 'aktif',
						'logged_in' => TRUE
					];
					$this->session->set_userdata($data);
					$this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil login</div>');
					redirect(base_url('index.php/auth/admin'));
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Akun anda belum aktif</div>');
					redirect(base_url('index.php/login'));	
				}
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Username atau password anda salah!!!</div>');
				redirect(base_url('index.php/login'));
			}

		}
		
	}

	function _cek_password() {
		$passwordinput = $this->input->post('password', TRUE);
		$passworddb = $this->M_user->get_user(array('password' => $passwordinput));
		if ($passworddb->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function username_check($str)
	{
			$data = [
				'username' => $str
			];

			$user = $this->M_user->get_user($data);

			if ($user->num_rows() == 0 )    
			{
					$this->form_validation->set_message('username_check', '<div class="alert alert-danger">Username atau password anda salah!!!</div>');
					return FALSE;
			}
			else
			{
					return TRUE;
			}
	}

	public function admin()
	{
		if ($this->session->userdata('status') == "" || $this->session->userdata('logged_in') == FALSE) {
			redirect(base_url('index.php/login'));
		}
		$data = [
			'title' => 'TAMBAH DAFTAR DOWNLOAD',
			'download' => $this->M_download->get_download()->result(),
			'jumlah_software' => $this->M_download->get_download()->num_rows()
		];
		
		$this->load->view('template/header',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('template/footer',$data);
	}

	public function tambah()
	{
		if ($this->session->userdata('status') == '' && $this->session->userdata('logged_in') === FALSE) {
			redirect(base_url('index.php/login'));
		}

		$data = [
			'title' => 'TAMBAH DATA DOWNLOAD',

		];
		
		$this->load->view('template/header',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('admin/tambah',$data);
		$this->load->view('template/footer',$data);
	}

	public function proses()
	{
		if ($this->session->userdata('status') == "" || $this->session->userdata('logged_in') == FALSE) {
			redirect(base_url('index.php/login'));
		}
		$this->form_validation->set_rules('nama','Nama','required',array('required' => '%s harus diisi'));
		$this->form_validation->set_rules('link','Link','required',array('required' => '%s harus diisi'));
		if($this->form_validation->run() == FALSE){
			$data = [
				'title' => 'TAMBAH DATA DOWNLOAD',
	
			];
			$this->load->view('template/header',$data);
			$this->load->view('template/menu',$data);
			$this->load->view('admin/tambah',$data);
			$this->load->view('template/footer',$data);

		} else {

			$nama = $this->input->post('nama', TRUE);
			$link = $this->input->post('link', TRUE);
			$data = [
				'nama' => $nama,
				'link' => $link,
			];
			$this->M_download->insert_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Tambah data berhasil</div>');
			redirect(base_url('index.php/auth/admin'));

		}

	}

	public function hapus($id)
	{
		if ($this->session->userdata('status') == "" || $this->session->userdata('logged_in') == FALSE) {
			redirect(base_url('index.php/login'));
		}
		if ($id == "") {
			redirect(base_url('index.php/auth/admin'));
		} else {
			$data = [
				'id' => $id
			];
			$this->M_download->hapus($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil di hapus</div>');
			redirect(base_url('index.php/auth/admin'));

		}
	}

	public function ubah($id)
	{
		if ($this->session->userdata('status') == "" || $this->session->userdata('logged_in') == FALSE) {
			redirect(base_url('index.php/login'));
		}
		if ($id == "") {
			redirect(base_url('index.php/auth/admin'));
		}else {
			$datadownload = $this->M_download->get_download_id($id)->row_array();

			if ($datadownload > 0) {
				$data = [
					'title' => 'UBAH DATA DOWNLOAD',
					'data' => $datadownload
		
				];
				
				$this->load->view('template/header',$data);
				$this->load->view('template/menu',$data);
				$this->load->view('admin/ubah',$data);
				$this->load->view('template/footer',$data);
			} else {
				redirect(base_url('index.php/auth/admin'));
			}
		}
	}

	public function proses_ubah()
	{
		if ($this->session->userdata('status') == "" || $this->session->userdata('logged_in') == FALSE) {
			redirect(base_url('index.php/login'));
		}
		$this->form_validation->set_rules('nama','Nama','required',array('required' => '%s harus diisi'));
		$this->form_validation->set_rules('link','Link','required',array('required' => '%s harus diisi'));
		if($this->form_validation->run() == FALSE){
			$data = [
				'title' => 'TAMBAH DATA DOWNLOAD',
	
			];
			$this->load->view('template/header',$data);
			$this->load->view('template/menu',$data);
			$this->load->view('admin/ubah',$data);
			$this->load->view('template/footer',$data);

		} else {

			$nama = $this->input->post('nama', TRUE);
			$link = $this->input->post('link', TRUE);
			$id = $this->input->post('id', TRUE);
			$data = [
				'nama' => $nama,
				'link' => $link,
			];
			$this->M_download->update_data($data, $id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Ubah data berhasil</div>');
			redirect(base_url('index.php/auth/admin'));

		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil logout</div>');
		redirect(base_url('index.php/login'));
	}
}
