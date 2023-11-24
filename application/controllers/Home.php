<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 public	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	
		$this->load->model('M_api');
	
	}


	public function index()
	{
	
		$this->load->view('dashboard');
	}

	


}
