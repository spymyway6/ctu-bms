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
}
