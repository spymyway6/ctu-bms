<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	function __construct(){
        parent::__construct();
	}
	
    public function dashboard(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			$data['is_page'] = 'student/dashboard';
            $data['page_name'] = 'Dashboard';
            $this->load->view('Student/dashboard', $data);
		}else{
            redirect('login');
        }
	}

    public function collections(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			$data['is_page'] = 'student/collections';
            $data['page_name'] = 'Collections';
            $data['collections'] = $this->student_model->get_collections();
            $this->load->view('Student/collections', $data);
		}else{
            redirect('login');
        }
	}

    public function borrowed_collections(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			$data['is_page'] = 'student/borrowed_collections';
            $data['page_name'] = 'Borrowed Collections';
            $data['borrowed_collections'] = $this->student_model->get_borrowed_collections();
            $this->load->view('Student/borrowed_collections', $data);
		}else{
            redirect('login');
        }
	}

    public function reserved_collections(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			$data['is_page'] = 'student/reserved_collections';
            $data['page_name'] = 'Reserved Collections';
            $data['reserved_collections'] = $this->student_model->get_reserved_collections();
            $this->load->view('Student/reserved_collections', $data);
		}else{
            redirect('login');
        }
	}

    public function overdue_lists(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			$data['is_page'] = 'student/overdue_lists';
            $data['page_name'] = 'Overdue Lists';
            $data['overdue_lists'] = $this->student_model->get_overdue_lists();
            $this->load->view('Student/overdue_lists', $data);
		}else{
            redirect('login');
        }
	}
    
    public function get_the_collection(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			if($this->input->post()){
                $data = $this->student_model->get_specific_collection($this->input->post('id'));
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => ($data) ? $data[0] : [],
                    'message' => 'Book fetched successfully'
                )
            );
		}else{
            echo json_encode(
                array(
                    'status' => false,
                    'data' => [],
                    'message' => 'Unauthorized'
                )
            );
        }
	}

    public function borrow_book(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			if($this->input->post()){
                $data = $this->student_model->set_borrow_book($this->input->post());
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'Saved successfully'
                )
            );
		}else{
            echo json_encode(
                array(
                    'status' => false,
                    'data' => [],
                    'message' => 'Unauthorized'
                )
            );
        }
	}

    public function pending_requests(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			$data['is_page'] = 'student/pending_requests';
            $data['page_name'] = 'Pending Requests';
            $data['pending_requests'] = $this->student_model->get_pending_requests();
            $this->load->view('Student/pending_requests', $data);
		}else{
            redirect('login');
        }
	}

    public function history(){
        if($this->session->userdata('id') && $this->session->userdata('role')==2){
			$data['is_page'] = 'student/history';
            $data['page_name'] = 'History';
            $data['history'] = $this->student_model->get_history();
            $this->load->view('Student/history', $data);
		}else{
            redirect('login');
        }
	}
}
