<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function count_all_request($id){
        $get_data = array(
            'count_pending' => $this->db->where('user_id', $id)->where('request_status', 0)->from("issue_book")->count_all_results(),
            'count_borrowed' => $this->db->where('user_id', $id)->where('request_status', 1)->where('request_type', 1)->from("issue_book")->count_all_results(),
            'count_reserved' => $this->db->where('user_id', $id)->where('request_status', 1)->where('request_type', 2)->from("issue_book")->count_all_results(),
            'count_history' => $this->db->where('user_id', $id)->where('request_status', 3)->from("issue_book")->count_all_results(),
        );

        $data = array(
            'count_pending' => ($get_data['count_pending'] > 99) ? '99+' : $get_data['count_pending'],
            'count_borrowed' => ($get_data['count_borrowed'] > 99) ? '99+' : $get_data['count_borrowed'],
            'count_reserved' => ($get_data['count_reserved'] > 99) ? '99+' : $get_data['count_reserved'],
            'count_history' => $get_data['count_history'],
        );

        return $data;
    }

    public function get_collections(){
        $this->db->select('*')->from('books')->where('status !=', 'Inactive');
        return $this->db->get()->result_array();
    }

    public function get_my_profile($id){
        $this->db->select('*')->from('users')->where('id', $id);
        return $this->db->get()->row_array();
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

    public function save_profile_settings_model($form_data, $imgName){
        $data = array(
            'firstname'  => $form_data['firstname'],
            'lastname'   => $form_data['lastname'],
            'username'   => $form_data['username'],
            'email'      => $form_data['email'],
            'contact'    => $form_data['contact'],
            'department' => $form_data['department'],
            'address'    => $form_data['address'],
        );

        if($imgName){
            $data['pic'] = $imgName;
        }

        if($form_data['password']){
            $data['password'] = md5($form_data['password']);
        }

        $this->db->where('id', $this->session->userdata('id'));
        $result = $this->db->update('users', $data);
        return ($result) ? true : false;
    }

}   
