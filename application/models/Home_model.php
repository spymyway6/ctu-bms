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
        if(isset($_GET['category']) && $_GET['category'] != ''){
            $this->db->where('a.category', $_GET['category']);
        }
        if(isset($_GET['keywords']) && $_GET['keywords'] != ''){
            $this->db->group_start();
            $this->db->or_like('a.book_name', $_GET['keywords']);
            $this->db->or_like('a.author', $_GET['keywords'], 'both');
            $this->db->or_like('a.location', $_GET['keywords'], 'both');
            $this->db->or_like('a.accession_no', $_GET['keywords'], 'both');
            $this->db->group_end();
        }
        return $this->db->get()->result_array();
    }

    public function get_collection_info_model($book_id){
        $this->db->select('a.*, b.category_name')->from('books a')->where('id', $book_id);
        $this->db->join('book_categories b', 'b.category_id = a.category', 'left');
        return $this->db->get()->row_array();
    }
}   
