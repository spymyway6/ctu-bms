<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function get_page_data($id){
        $this->db->select('*')->from('pages')->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function get_collections(){
        $this->db->select('a.*, b.category_name')->from('books a')->where('status', 'Active');
        $this->db->join('book_categories b', 'b.category_id = a.category', 'left');
        if(isset($_GET['category'])){
            $this->db->where('a.category', $_GET['category']);
        }
        return $this->db->get()->result_array();
    }

    public function get_collection_info_model($book_id){
        $this->db->select('a.*, b.category_name')->from('books a')->where('id', $book_id);
        $this->db->join('book_categories b', 'b.category_id = a.category', 'left');
        return $this->db->get()->row_array();
    }
}   
