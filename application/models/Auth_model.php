<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function check_user_if_exist($username, $password){
        $this->db->select('*')->from('users');
        $this->db->where("username", $username);
        $this->db->where("password", $password);
		$data = $this->db->get()->row_array();
        if(isset($data['id'])){
            return $data;
        }
        return false;
    }
}   
