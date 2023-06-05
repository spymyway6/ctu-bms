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
            $data['latest_transactions'] = $this->admin_model->get_latest_transactions();
            $data['count_request'] = $this->admin_model->count_all_request();
            $this->load->view('Admin/dashboard', $data);
		}else{
            redirect('login');
        }
	}

    public function categories(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/categories';
            $data['page_name'] = 'Book Categories';
            $data['categories'] = $this->admin_model->get_categories();
            $this->load->view('Admin/categories', $data);
		}else{
            redirect('login');
        }
	}
    
    public function collections(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/collections';
            $data['page_name'] = 'Collections';
            $data['collections'] = $this->admin_model->get_collections();
            $data['categories'] = $this->admin_model->get_active_categories();
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

    public function students(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/students';
            $data['page_name'] = 'Students Lists';
            $data['students'] = $this->admin_model->get_students();
            $this->load->view('Admin/students', $data);
		}else{
            redirect('login');
        }
	}

    public function teachers(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/teachers';
            $data['page_name'] = 'Teachers Lists';
            $data['teachers'] = $this->admin_model->get_teachers();
            $this->load->view('Admin/teachers', $data);
		}else{
            redirect('login');
        }
	}

    public function users(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/users';
            $data['page_name'] = 'Librarians Lists';
            $data['users'] = $this->admin_model->get_users();
            $this->load->view('Admin/users', $data);
		}else{
            redirect('login');
        }
	}

    public function pages($page_id=''){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page'] = 'admin/pages';
            $data['page_name'] = 'Page Lists';
            $data['page'] = $this->admin_model->get_specific_page($page_id);
            $this->load->view('Admin/pages', $data);
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

    public function save_the_student(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $imgName = '';
                if($this->input->post('img_data')){
                    $img_data = $this->input->post('img_data');
                    $target_path = "assets/uploads/users/";
                    $imgName = 'p'.'_'.uniqid().".jpg"; 
                    $data    = explode(',', $img_data);
                    $decoded = base64_decode($data[1]);file_put_contents($target_path.$imgName, $decoded);
                }
                $data = $this->admin_model->save_the_student_model($this->input->post(), $imgName);
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'Student saved successfully'
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

    public function save_the_user(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $imgName = '';
                if($this->input->post('img_data')){
                    $img_data = $this->input->post('img_data');
                    $target_path = "assets/uploads/users/";
                    $imgName = 'p'.'_'.uniqid().".jpg"; 
                    $data    = explode(',', $img_data);
                    $decoded = base64_decode($data[1]);
                    file_put_contents($target_path.$imgName, $decoded);
                }
                $data = $this->admin_model->save_the_user_model($this->input->post(), $imgName);
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'User saved successfully'
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

    public function save_the_teacher(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $imgName = '';
                if($this->input->post('img_data')){
                    $img_data = $this->input->post('img_data');
                    $target_path = "assets/uploads/users/";
                    $imgName = 'p'.'_'.uniqid().".jpg"; 
                    $data    = explode(',', $img_data);
                    $decoded = base64_decode($data[1]);
                    file_put_contents($target_path.$imgName, $decoded);
                }
                $data = $this->admin_model->save_the_teacher_model($this->input->post(), $imgName);
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'User saved successfully'
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

    public function get_the_student(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->get_specific_student($this->input->post('id'));
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
    
    public function get_the_teacher(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->get_specific_teacher($this->input->post('id'));
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

    public function get_the_user(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->get_specific_user($this->input->post('id'));
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => ($data) ? $data[0] : [],
                    'message' => 'User fetched successfully'
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

    public function profile_settings(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			$data['is_page']   = 'admin/profile_settings';
            $data['page_name'] = 'Profile Settings';
            $data['profile']   = $this->admin_model->get_my_profile($this->session->userdata('id'));
            $data['count_request'] = $this->admin_model->count_all_request();
            $this->load->view('Admin/profile_settings', $data);
		}else{
            redirect('login');
        }
	}

    public function save_profile_settings(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $imgName = '';
                if($this->input->post('img_data')){
                    $img_data = $this->input->post('img_data');
                    $target_path = "assets/uploads/users/";
                    $imgName = 'p'.'_'.uniqid().".jpg"; 
                    $data    = explode(',', $img_data);
                    $decoded = base64_decode($data[1]);
                    file_put_contents($target_path.$imgName, $decoded);
                }
                $data = $this->admin_model->save_profile_settings_model($this->input->post(), $imgName);
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'Profile saved successfully'
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

    public function save_page_settings(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->save_page_settings_model($this->input->post());
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'Student saved successfully'
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

    // Categories
    public function save_the_category(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->save_the_category_model($this->input->post());
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => [],
                    'message' => 'Category saved successfully'
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
    
    public function get_the_category(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			if($this->input->post()){
                $data = $this->admin_model->get_specific_category($this->input->post('category_id'));
            }
            echo json_encode(
                array(
                    'status' => true,
                    'data' => $data,
                    'message' => 'Category fetched successfully'
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
