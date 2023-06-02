<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function get_collections(){
        $this->db->select('*')->from('books')->where('status !=', 'Inactive');
        return $this->db->get()->result_array();
    }

    public function get_specific_collection($id){
        $this->db->select('*')->from('books')->where('id', $id);
        return $this->db->get()->result_array();
    }

    public function set_borrow_book($form_data){
        $data = array(
            'user_id'        => $this->session->userdata('id'),
            'book_id'        => $form_data['id'],
            'request_type'   => ($form_data['request_type']=='Borrow') ? 1 : 2,
            'request_status' => 0,
        );
        $this->db->insert('issue_book', $data);
        return true;
    }

    public function get_pending_requests(){
        $user_id = $this->session->userdata('id');
        $this->db->select('a.*, b.*')->from('issue_book a')->where('user_id', $user_id)->where('request_status', 0);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_borrowed_collections(){
        $user_id = $this->session->userdata('id');
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a')->where('request_type', 1)->where('request_status', 1)->where('user_id', $user_id);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_reserved_collections(){
        $user_id = $this->session->userdata('id');
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a')->where('request_type', 2)->where('request_status', 1)->where('user_id', $user_id);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_history(){
        $user_id = $this->session->userdata('id');
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a')->where('user_id', $user_id);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_overdue_lists(){
        $toDate = date('Y-m-d');
        $user_id = $this->session->userdata('id');
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a')->where('user_id', $user_id);
        $this->db->where('STR_TO_DATE(expiry_date, "%Y-%m-%d") <', $toDate);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }
}   
