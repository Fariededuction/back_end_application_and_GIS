<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

class Permanen_tunggakan extends CI_Controller{
	public function __construct(){

		parent::__construct();
		$this->load->model('Model_tunggakan');
	}

	public function index()
	{
		$this->form_validation->set_rules('key', 'key','
		trim|required|min_length[2]|max_length[25]' );
		$this->form_validation->set_rules('tgl1', 'tanggal pertama', 'trim|required');
		$this->form_validation->set_rules('tgl2', 'tanggal terakhir', 'trim|required');
		if ($this->form_validation->run()==false)
		{
			$this->load->view('View_tunggakan_per');
	}else{
		$key=$this->input->post('key');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$selisih=$this->Model_tunggakan->SetTanggal($key, $tgl1, $tgl2);
		echo json_encode($selisih);
	}
}
}
