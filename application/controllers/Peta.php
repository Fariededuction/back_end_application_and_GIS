<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

class Peta extends CI_Controller{
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
		$this->load->model('Model_peta');
	}

	public function index()
	{	
		$data = [
			'title' => 'Pemetaan wajib pajak',
			'tps' => $this->Model_peta->get_all_peta(),
			'isi'   => 'View_peta'
		];

	
		// Count data based on specific criteria
		$data['total_silang']=$this->Model_peta->count_all('SILANG');
		 $data['total_bongkar'] = $this->Model_peta->count_all('BONGKAR');
	
	
	
		// Load your view with the prepared data
		$this->load->view('v_wrapper', $data);


}
}
