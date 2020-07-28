<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('M_download');
	}

    public function index()
	{
		$data = [
			'title' => 'Daftar Software dan Aplikasi',
			'download' => $this->M_download->get_download()->result(),
			'jumlah_software' => $this->M_download->get_download()->num_rows()
		];
		
		$this->load->view('template/header',$data);
		$this->load->view('template/menu',$data);
		$this->load->view('beranda/index',$data);
		$this->load->view('template/footer',$data);
	}
}
