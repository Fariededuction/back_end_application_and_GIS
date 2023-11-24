<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jambong_permanen extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
			
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('Model_jambong_per');    
    }



    public function index()
	{
		$this->load->view('View_jambong_permanen');
	}

public function jambong_per()
	{

        $list = $this->Model_jambong_per->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_jb) {

            $no++;
            $row = array();         
            $row[] = $data_jb->NO_FORMULIR;
            $row[] = $data_jb->NAMA;
			$row[] = $data_jb->JUMLAH_JAMBONG;
            $row[] = $data_jb->TGL_BAYAR;
			$row[] = $data_jb->ISI_REKLAME;
			$row[] = $data_jb->FLAG_PERMOHONAN;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_jambong_per->count_all(),
            "recordsFiltered" => $this->Model_jambong_per->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

		
	}

}
