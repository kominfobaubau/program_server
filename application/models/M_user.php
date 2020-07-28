<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function get_user($data)
    {
        return $this->db->get_where('user', $data);
    }

    public function cek_login($username,$password){
        $u = htmlspecialchars($username);
        $p = htmlspecialchars($password);
        $data = [
            'username' => $u,
            'password' => $p
        ];
        $query = $this->db->get_where('user', $data);
        return $query;
    }

}