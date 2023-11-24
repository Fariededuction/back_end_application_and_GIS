<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sts extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
     
        $this->load->model('Mlogin','Mlogin');
       
    }

    public function index()
	{   
       
		$this->load->model('Model_cetak_sts');
		$data['data'] = $this->Model_cetak_sts->get_all_data(); // Fetch all data
	//	$data['data'] = $this->Model_cetak_sts->get_by_id($id); // Fetch all data
		$this->load->view('View_sts_test', $data);
	}

	public function index1($PAJAK_POKOK) {
		$data['data'] = $this->Model_cetak_sts->get_by_id($PAJAK_POKOK);
		$data['selected_id'] = $PAJAK_POKOK;
		
		// Load the view with data
	
	}



}
