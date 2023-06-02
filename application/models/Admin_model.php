<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function save_the_collection_model($form_data, $imgName){
        $data = array(
            'book_name'      => $form_data['book_name'],
            'accession_no'   => $form_data['accession_no'],
            'author'         => $form_data['author'],
            'other_author'   => $form_data['other_author'],
            'edition'        => $form_data['edition'],
            'publish_date'   => $form_data['publish_date'],
            'copyright_date' => $form_data['copyright_date'],
            'location'       => $form_data['location'],
            'quantity'       => $form_data['quantity'],
            'available'      => ($form_data['book_id']) ? $form_data['available'] : $form_data['quantity'],
            'unavailable'    => $form_data['unavailable'],
            'category'       => $form_data['category'],
            'status'         => $form_data['status']
        );

        if($imgName){
            $data['book_image'] = $imgName;
        }

        if($form_data['book_id']){
            $this->db->where('id', $form_data['book_id']);
            $result = $this->db->update('books', $data);
            return ($result) ? true : false;
        }else{
            $this->db->insert('books', $data);
            return true;
        }
    }

    public function get_collections(){
        $this->db->select('*')->from('books');
        return $this->db->get()->result_array();
    }

    public function get_specific_collection($id){
        $this->db->select('*')->from('books')->where('id', $id);
        return $this->db->get()->result_array();
    }

    public function get_pending_requests(){
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a')->where('request_status', 0); // Pending
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }
    
    public function get_borrowed_collections(){
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a')->where('request_type', 1)->where('request_status', 1);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_reserved_collections(){
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a')->where('request_type', 2)->where('request_status', 1);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_history(){
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a');
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_overdue_lists(){
        $toDate = date('Y-m-d');
        $this->db->select('a.*, b.*, c.firstname, c.lastname')->from('issue_book a');
        $this->db->where('STR_TO_DATE(expiry_date, "%Y-%m-%d") <', $toDate);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function set_request_status_model($form_data){

        if($form_data['request_type'] == 1){
            if($form_data['status'] == 1){
                $data = array(
                    'request_status' => 1,
                    'expiry_date' => date('Y-m-d', strtotime("+3 days"))
                );
            }else{
                $data = array(
                    'request_status' => 2
                );
            }
            $this->db->where('issue_id', $form_data['issue_id']);
            $this->db->update('issue_book', $data);
    
            // Update Books
            $books_data = array(
                'available' => $form_data['availableQTY'] - 1,
                'unavailable' => $form_data['unavailableQTY'] + 1,
            );
            $this->db->where('id', $form_data['book_id']);
            $this->db->update('books', $books_data);
        }else{
            $data = array(
                'request_status' => $form_data['status']
            );
            $this->db->where('issue_id', $form_data['issue_id']);
            $this->db->update('issue_book', $data);
        }

        return true;
    }

    public function set_collection_to_return_model($form_data){
        $data = array(
            'request_status' => 3,
            'return_date' => date('Y-m-d'),
        );
        $this->db->where('issue_id', $form_data['issue_id']);
        $this->db->update('issue_book', $data);

        // Update Books
        $books_data = array(
            'available' => $form_data['availableQTY'] + 1,
            'unavailable' => $form_data['unavailableQTY'] - 1,
        );
        $this->db->where('id', $form_data['book_id']);
        $this->db->update('books', $books_data);

        return true;
    }

    public function mark_as_borrowed_model($form_data){
        $data = array(
            'request_type' => 1,
            'request_status' => 1,
            'expiry_date' => date('Y-m-d', strtotime("+3 days"))
        );
        $this->db->where('issue_id', $form_data['issue_id']);
        $this->db->update('issue_book', $data);

        // Update Books
        $books_data = array(
            'available' => $form_data['availableQTY'] - 1,
            'unavailable' => $form_data['unavailableQTY'] + 1,
        );
        $this->db->where('id', $form_data['book_id']);
        $this->db->update('books', $books_data);

        return true;
    }
}   
