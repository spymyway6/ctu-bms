<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function count_all_request(){
        $toDate = date('Y-m-d');
        $get_data = array(
            'count_pending'  => $this->db->where('request_status', 0)->from("issue_book")->count_all_results(),
            'count_borrowed' => $this->db->where('request_status', 1)->where('request_type', 1)->from("issue_book")->count_all_results(),
            'count_reserved' => $this->db->where('request_status', 1)->where('request_type', 2)->from("issue_book")->count_all_results(),
            'count_history'  => $this->db->where('request_status', 3)->from("issue_book")->count_all_results(),
            'count_users'    => $this->db->from("users")->count_all_results(),
            'count_books'    => $this->db->from("books")->count_all_results(),
            'count_expired'  => $this->db->where('STR_TO_DATE(expiry_date, "%Y-%m-%d") <', $toDate)->from("issue_book")->count_all_results(),
        );
        $data = array(
            'count_pending'  => ($get_data['count_pending'] > 99) ? '99+' : $get_data['count_pending'],
            'count_borrowed' => ($get_data['count_borrowed'] > 99) ? '99+' : $get_data['count_borrowed'],
            'count_reserved' => ($get_data['count_reserved'] > 99) ? '99+' : $get_data['count_reserved'],
            'count_history'  => $get_data['count_history'],
            'count_expired'  => $get_data['count_expired'],
            'count_books'    => $get_data['count_books'],
            'count_users'    => $get_data['count_users'],
        );
        return $data;
    }

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

    public function save_the_student_model($form_data, $imgName){
        $data = array(
            'firstname'  => $form_data['firstname'],
            'lastname'   => $form_data['lastname'],
            'username'   => $form_data['username'],
            'email'      => $form_data['email'],
            'contact'    => $form_data['contact'],
            'status'     => $form_data['status'],
            'department' => $form_data['department'],
            'address'    => $form_data['address'],
            'role'       => 2,
        );

        if($imgName){
            $data['pic'] = $imgName;
        }

        if($form_data['password']){
            $data['password'] = md5($form_data['password']);
        }

        if($form_data['user_id']){
            $this->db->where('id', $form_data['user_id']);
            $result = $this->db->update('users', $data);
            return ($result) ? true : false;
        }else{
            $this->db->insert('users', $data);
            return true;
        }
    }

    public function save_the_user_model($form_data, $imgName){
        $data = array(
            'firstname'  => $form_data['firstname'],
            'lastname'   => $form_data['lastname'],
            'username'   => $form_data['username'],
            'email'      => $form_data['email'],
            'contact'    => $form_data['contact'],
            'status'     => $form_data['status'],
            'department' => $form_data['department'],
            'address'    => $form_data['address'],
            'role'       => 1,
        );

        if($imgName){
            $data['pic'] = $imgName;
        }

        if($form_data['password']){
            $data['password'] = md5($form_data['password']);
        }

        if($form_data['user_id']){
            $this->db->where('id', $form_data['user_id']);
            $result = $this->db->update('users', $data);
            return ($result) ? true : false;
        }else{
            $this->db->insert('users', $data);
            return true;
        }
    }

    public function save_the_teacher_model($form_data, $imgName){
        $data = array(
            'firstname'  => $form_data['firstname'],
            'lastname'   => $form_data['lastname'],
            'username'   => $form_data['username'],
            'email'      => $form_data['email'],
            'contact'    => $form_data['contact'],
            'status'     => $form_data['status'],
            'department' => $form_data['department'],
            'address'    => $form_data['address'],
            'role'       => 3,
        );

        if($imgName){
            $data['pic'] = $imgName;
        }

        if($form_data['password']){
            $data['password'] = md5($form_data['password']);
        }

        if($form_data['user_id']){
            $this->db->where('id', $form_data['user_id']);
            $result = $this->db->update('users', $data);
            return ($result) ? true : false;
        }else{
            $this->db->insert('users', $data);
            return true;
        }
    }

    public function get_all_pages(){
        $this->db->select('*')->from('pages');
        return $this->db->get()->result_array();
    }

    public function get_specific_page($page_id){
        $this->db->select('*')->from('pages')->where('id', $page_id);
        return $this->db->get()->row_array();
    }

    public function get_collections(){
        $this->db->select('*')->from('books');
        return $this->db->get()->result_array();
    }

    public function get_specific_collection($id){
        $this->db->select('*')->from('books')->where('id', $id);
        return $this->db->get()->result_array();
    }

    public function get_specific_student($id){
        $this->db->select('*')->from('users')->where('id', $id);
        return $this->db->get()->result_array();
    }

    public function get_specific_user($id){
        $this->db->select('*')->from('users')->where('id', $id);
        return $this->db->get()->result_array();
    }

    public function get_specific_teacher($id){
        $this->db->select('*')->from('users')->where('id', $id);
        return $this->db->get()->result_array();
    }

    public function get_latest_transactions(){
        $this->db->select('a.*, b.id, b.accession_no, b.book_name, b.author, b.publish_date, b.quantity, b.unavailable, b.category, b.book_image, c.firstname, c.lastname, c.department, c.role')->from('issue_book a')->where('request_status', 0); // Pending
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        $this->db->limit(20);
        return $this->db->get()->result_array();
    }

    public function get_pending_requests(){
        $this->db->select('a.*, b.id, b.accession_no, b.book_name, b.author, b.publish_date, b.quantity, b.unavailable, b.category, b.book_image, c.firstname, c.lastname, c.department, c.role')->from('issue_book a')->where('request_status', 0);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }
    
    public function get_borrowed_collections(){
        $this->db->select('a.*, b.id, b.accession_no, b.book_name, b.author, b.publish_date, b.quantity, b.unavailable, b.category, b.book_image, c.firstname, c.lastname, c.department, c.role')->from('issue_book a')->where('request_type', 1)->where('request_status', 1);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_reserved_collections(){
        $this->db->select('a.*, b.id, b.accession_no, b.book_name, b.author, b.publish_date, b.quantity, b.unavailable, b.category, b.book_image, c.firstname, c.lastname, c.department, c.role')->from('issue_book a')->where('request_type', 2)->where('request_status', 1);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_history(){
        $this->db->select('a.*, b.id, b.accession_no, b.book_name, b.author, b.publish_date, b.quantity, b.unavailable, b.category, b.book_image, c.firstname, c.lastname, c.department, c.role')->from('issue_book a');
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_overdue_lists(){
        $toDate = date('Y-m-d');
        $this->db->select('a.*, b.id, b.accession_no, b.book_name, b.author, b.publish_date, b.quantity, b.unavailable, b.category, b.book_image, c.firstname, c.lastname, c.department, c.role')->from('issue_book a');
        $this->db->where('STR_TO_DATE(expiry_date, "%Y-%m-%d") <', $toDate);
        $this->db->join('books b', 'b.id = a.book_id', 'left');
        $this->db->join('users c', 'c.id = a.user_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_teachers(){
        $this->db->select('*')->from('users')->where('role', 3);
        return $this->db->get()->result_array();
    }

    public function get_students(){
        $this->db->select('*')->from('users')->where('role', 2);
        return $this->db->get()->result_array();
    }

    public function get_users(){
        $this->db->select('*')->from('users')->where('role', 1);
        return $this->db->get()->result_array();
    }

    public function set_request_status_model($form_data){
        $this->db->select('*')->from('issue_book')->where('issue_id', $form_data['issue_id']);
        $get_issue_book = $this->db->get()->row_array();
        if($get_issue_book){
            $get_book = $this->db->select('*')->from('books')->where('id', $get_issue_book['book_id'])->get()->row_array();
            if($form_data['request_status'] == 'Approve'){ // Approve
                if($form_data['request_type']==1){ // Borrow
                    // Approve the request
                    $issue_data = array(
                        'request_status' => 1,
                        'expiry_date' => date('Y-m-d', strtotime("+3 days"))
                    );
                    $this->db->where('issue_id', $form_data['issue_id']);
                    $this->db->update('issue_book', $issue_data);

                    // Update the books availability
                    $book_data = array(
                        'unavailable' => $get_book['unavailable'] + 1
                    );
                    $this->db->where('id', $get_issue_book['book_id']);
                    $this->db->update('books', $book_data);
                }else{ // Reserve the request
                    $issue_data = array(
                        'request_status' => 1,
                    );
                    $this->db->where('issue_id', $form_data['issue_id']);
                    $this->db->update('issue_book', $issue_data);
                }
            }else{ // Decline
                // Decline the request
                $issue_data = array(
                    'request_status' => 2,
                );
                $this->db->where('issue_id', $form_data['issue_id']);
                $this->db->update('issue_book', $issue_data);
            }
            return true;
        }
        return false;
    }

    public function set_collection_to_return_model($form_data){
        $data = array(
            'request_status' => 3,
            'return_date' => date('Y-m-d'),
        );
        $this->db->where('issue_id', $form_data['issue_id']);
        $this->db->update('issue_book', $data);

        // Update the books availability
        $get_book = $this->db->select('*')->from('books')->where('id', $form_data['book_id'])->get()->row_array();
        $book_data = array(
            'unavailable' => $get_book['unavailable'] - 1
        );
        $this->db->where('id', $form_data['book_id']);
        $this->db->update('books', $book_data);
        return true;
    }

    public function mark_as_borrowed_model($form_data){
        $get_book = $this->db->select('*')->from('books')->where('id', $form_data['book_id'])->get()->row_array();
        // Approve the request
        $issue_data = array(
            'request_status' => 1,
            'request_type' => 1,
            'expiry_date' => date('Y-m-d', strtotime("+3 days"))
        );
        $this->db->where('issue_id', $form_data['issue_id']);
        $this->db->update('issue_book', $issue_data);

        // Update the books availability
        $book_data = array(
            'unavailable' => $get_book['unavailable'] + 1
        );
        $this->db->where('id', $form_data['book_id']);
        $this->db->update('books', $book_data);
        return true;
    }

    public function get_my_profile($id){
        $this->db->select('*')->from('users')->where('id', $id);
        return $this->db->get()->row_array();
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

    public function save_page_settings_model($form_data){
        $data = array(
            'page_name' => $form_data['page_name'],
            'page_content' => $form_data['page_content'],
        );
        $this->db->where('id', $form_data['page_id']);
        $result = $this->db->update('pages', $data);
        return ($result) ? true : false;
    }
}   
