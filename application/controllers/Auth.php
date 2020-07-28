<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('M_download');
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
		$this->form_validation->set_rules('password','Username','required');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'LOGIN',
			];
	
			$this->load->view('template/header',$data);
			$this->load->view('template/menu',$data);
			$this->load->view('auth/login',$data);
			$this->load->view('template/footer',$data);
		} else {
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$this->M_user->get_user($username,$password);
			redirect(base_url('index.php/auth/admin'));
		}
		
	}

	private function username_check($str)
	{
			$user = $this->M_user->get_user($str);
			if ($user->num_rows() > 0 )    
			{
					$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
					return FALSE;
			}
			else
			{
					return TRUE;
			}
	}

	public function admin()
	{
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
			redirect(base_url('index.php/auth/admin'));

		}

	}

	public function hapus($id)
	{
		$data = [
			'id' => $id
		];
		$this->M_download->hapus($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil di hapus</div>');
		redirect(base_url('index.php/auth/admin'));
	}

	public function ubah($id)
	{
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

	public function proses_ubah()
	{
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
			redirect(base_url('index.php/auth/admin'));

		}
	}
}
