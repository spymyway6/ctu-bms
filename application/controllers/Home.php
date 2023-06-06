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

    /* Pages */
    public function general_rules(){
        $data['is_page'] = 'general_rules';
        $data['page'] = $this->home_model->get_page_data(1);
		$this->load->view('Homepage/general_rules', $data);
    }

    public function borrowing_policy(){
        $data['is_page'] = 'borrowing_policy';
        $data['page'] = $this->home_model->get_page_data(2);
		$this->load->view('Homepage/borrowing_policy', $data);
    }

    public function circulation_services(){
        $data['is_page'] = 'circulation_services';
        $data['page'] = $this->home_model->get_page_data(3);
		$this->load->view('Homepage/circulation_services', $data);
    }

    public function library_orientation(){
        $data['is_page'] = 'library_orientation';
        $data['page'] = $this->home_model->get_page_data(4);
		$this->load->view('Homepage/library_orientation', $data);
    }

    public function document_delivery(){
        $data['is_page'] = 'document_delivery';
        $data['page'] = $this->home_model->get_page_data(5);
		$this->load->view('Homepage/document_delivery', $data);
    }

    public function inter_library(){
        $data['is_page'] = 'inter_library';
        $data['page'] = $this->home_model->get_page_data(6);
		$this->load->view('Homepage/inter_library', $data);
    }

    public function information_services(){
        $data['is_page'] = 'information_services';
        $data['page'] = $this->home_model->get_page_data(7);
		$this->load->view('Homepage/information_services', $data);
    }

    public function printing_services(){
        $data['is_page'] = 'printing_services';
        $data['page'] = $this->home_model->get_page_data(8);
		$this->load->view('Homepage/printing_services', $data);
    }

    public function internet_access(){
        $data['is_page'] = 'internet_access';
        $data['page'] = $this->home_model->get_page_data(9);
		$this->load->view('Homepage/internet_access', $data);
    }

    public function faqs(){
        $data['is_page'] = 'faqs';
        $data['page'] = $this->home_model->get_page_data(11);
		$this->load->view('Homepage/faqs', $data);
    }
    /* Close Pages */

    public function collections(){
        $data['is_page'] = 'collections';
        $data['collections'] = $this->home_model->get_collections();
        $data['categories'] = $this->admin_model->get_categories();
		$this->load->view('Homepage/collections', $data);
    }

    public function new_aquisition(){
        $data['is_page'] = 'new_aquisition';
        $data['collections'] = $this->home_model->get_new_aquisition();
        $data['categories'] = $this->admin_model->get_categories();
		$this->load->view('Homepage/new_aquisition', $data);
    }

    public function get_collection_info(){
        if($this->input->post()){
            $data = $this->home_model->get_collection_info_model($this->input->post('book_id'));
        }
        echo json_encode(
            array(
                'status' => true,
                'data' => $data,
                'dates' => array(
                    'publish_date' => date('M d, Y', strtotime($data['publish_date'])),
                    'copyright_date' => date('M d, Y', strtotime($data['copyright_date'])),
                    'created_at' => date('M d, Y', strtotime($data['created_at'])),
                ),
                'message' => 'Collection fetched successfully'
            )
        );
	}
}
