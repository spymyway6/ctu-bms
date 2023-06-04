<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
        parent::__construct();
	}
	
	public function index(){
		$data['is_page'] = 'homepage';
		$this->load->view('Homepage/index', $data);
	}

    public function general_rules(){
        $data['is_page'] = 'general_rules';
		$this->load->view('Homepage/general_rules', $data);
    }
    public function borrowing_policy(){
        $data['is_page'] = 'borrowing_policy';
		$this->load->view('Homepage/borrowing_policy', $data);
    }
    public function circulation_services(){
        $data['is_page'] = 'circulation_services';
		$this->load->view('Homepage/circulation_services', $data);
    }
    public function library_orientation(){
        $data['is_page'] = 'library_orientation';
		$this->load->view('Homepage/library_orientation', $data);
    }
    public function document_delivery(){
        $data['is_page'] = 'document_delivery';
		$this->load->view('Homepage/document_delivery', $data);
    }
    public function inter_library(){
        $data['is_page'] = 'inter_library';
		$this->load->view('Homepage/inter_library', $data);
    }
    public function information_services(){
        $data['is_page'] = 'information_services';
		$this->load->view('Homepage/information_services', $data);
    }
    public function printing_services(){
        $data['is_page'] = 'printing_services';
		$this->load->view('Homepage/printing_services', $data);
    }
    public function internet_access(){
        $data['is_page'] = 'internet_access';
		$this->load->view('Homepage/internet_access', $data);
    }

}
