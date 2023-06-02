<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
	}
	
    public function dashboard(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/dashboard';
            $data['page_name'] = 'Dashboard';
            $this->load->view('Admin/dashboard', $data);
		}else{
            redirect('login');
        }
	}
    
    public function collections(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/collections';
            $data['page_name'] = 'Collections';
            $data['collections'] = $this->admin_model->get_collections();
            $this->load->view('Admin/collections', $data);
		}else{
            redirect('login');
        }
	}

    public function pending_requests(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/pending_requests';
            $data['page_name'] = 'Pending Requests';
            $data['pending_requests'] = $this->admin_model->get_pending_requests();
            $this->load->view('Admin/pending_requests', $data);
		}else{
            redirect('login');
        }
	}

    public function borrowed_collections(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/borrowed_collections';
            $data['page_name'] = 'Borrowed Collections';
            $data['borrowed_collections'] = $this->admin_model->get_borrowed_collections();
            $this->load->view('Admin/borrowed_collections', $data);
		}else{
            redirect('login');
        }
	}

    public function reserved_collections(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/reserved_collections';
            $data['page_name'] = 'Reserved Collections';
            $data['reserved_collections'] = $this->admin_model->get_reserved_collections();
            $this->load->view('Admin/reserved_collections', $data);
		}else{
            redirect('login');
        }
	}

    public function history(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/history';
            $data['page_name'] = 'History';
            $data['history'] = $this->admin_model->get_history();
            $this->load->view('Admin/history', $data);
		}else{
            redirect('login');
        }
	}

    public function overdue_lists(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/overdue_lists';
            $data['page_name'] = 'Overdue Lists';
            $data['overdue_lists'] = $this->admin_model->get_overdue_lists();
            $this->load->view('Admin/overdue_lists', $data);
		}else{
            redirect('login');
        }
	}

    public function save_the_collection(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $imgName = '';
                if($this->input->post('img_data')){
                    $img_data = $this->input->post('img_data');
                    $target_path = "assets/uploads/books/";
                    $imgName = 'p'.'_'.uniqid().".jpg"; 
                    $data    = explode(',', $img_data);
                    $decoded = base64_decode($data[1]);
                    file_put_contents($target_path.$imgName, $decoded);
                }
                $data = $this->admin_model->save_the_collection_model($this->input->post(), $imgName);
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'Book saved successfully'
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
    
    public function get_the_collection(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->get_specific_collection($this->input->post('id'));
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

    public function set_request_status(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->set_request_status_model($this->input->post());
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

    public function set_collection_to_return(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->set_collection_to_return_model($this->input->post());
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'Returned successfully'
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

    public function mark_as_borrowed(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->mark_as_borrowed_model($this->input->post());
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
}
