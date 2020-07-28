<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {


    public function index($data=null)
	{
        if($data){
            force_download(APPPATH.'../assets/program/'.$data,null);
        } else {
            redirect(base_url());
        }
        
	}
}
