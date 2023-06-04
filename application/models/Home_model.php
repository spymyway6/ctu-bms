<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function get_page_data($id){
        $this->db->select('*')->from('pages')->where('id', $id);
        return $this->db->get()->row_array();
    }
}   
