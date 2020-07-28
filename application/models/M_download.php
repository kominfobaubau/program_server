<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_download extends CI_Model {

    function get_download(){

        return $this->db->get('download');

    }

    function insert_data($data){

        $this->db->insert('download',$data);

    }

    function hapus($id)
    {
        $this->db->delete('download',$id);
    }

    function get_download_id($id){

        return $this->db->get_where('download',['id' => $id]);

    }

    function update_data($data, $id)
    {
        $this->db->where('id',$id);
        $this->db->update('download',$data);
    }

}