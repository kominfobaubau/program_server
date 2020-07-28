<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim_email extends CI_Controller {
    public function __construct(){
		parent:: __construct();
		$this->load->model('M_download');
	}

    public function index(){

        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('pesan','Pesan','required');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Daftar Software dan Aplikasi',
                'download' => $this->M_download->get_download()->result(),
                'jumlah_software' => $this->M_download->get_download()->num_rows()
            ];
            
            $this->load->view('template/header',$data);
            $this->load->view('template/menu',$data);
            $this->load->view('beranda/index',$data);
            $this->load->view('template/footer',$data);

        } else {
            
            $nama = $this->input->post('nama', TRUE);
            $email = $this->input->post('email', TRUE);
            $pesan = $this->input->post('pesan', TRUE);

            $this->email->from('your@example.com', 'Your Name');
            $this->email->to('someone@example.com');
            $this->email->cc('another@another-example.com');
            $this->email->bcc('them@their-example.com');

            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');

            $this->email->send();

        }


    }
}