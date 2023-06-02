<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
        parent::__construct();
	}

    public function login(){
        if($this->session->userdata('id') && $this->session->userdata('role')==1){
			redirect('admin/dashboard');
		}else{
            if($this->session->userdata('id') && $this->session->userdata('role')==2){
                redirect('student/dashboard');
            }
            else{
                $this->load->view('Auth/login');
            }
        }
	}
	
	public function login_user(){
        if($this->input->post()){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$data     = $this->auth_model->check_user_if_exist($username, $password);
			if($data){
                $this->session->set_userdata($data);
                $this->session->set_flashdata('success_msg', 'Welcome to CTU Book Monitoring System');
                if($this->session->userdata('id') && $this->session->userdata('role')==1){
                    redirect('admin/dashboard');
                }
                else{
                    redirect('student/dashboard');
                }
               
			} else{
                $this->session->set_flashdata('error_msg', 'Incorrect email or password.');
                redirect('login');
            }
		}else{
			redirect('login');
		}
	}

    public function user_logout(){
        $this->session->sess_destroy();
		redirect(base_url());
    }
}
