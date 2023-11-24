<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insidentil_tunggakan extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
			
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('laporan_model');    
    }



    public function index()
	{
		$this->load->view('View_insidentil_tunggakan');
	}

public function tunggakan()
	{

        $list = $this->laporan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_siswa) {


            $no++;
            $row = array();         
            $row[] = $data_siswa->NO_SKPD;
            $row[] = $data_siswa->NO_FORMULIR;
            $row[] = $data_siswa->TGL_PERMOHONAN;
            $row[] = $data_siswa->NAMA;
            $row[] = $data_siswa->TGL_PENETAPAN;
        //    $row[] = $data_siswa->TGL_BAYAR;
            $row[] = $data_siswa->NILAI_TOTAL_PAJAK_SISTEM;
            $row[] = $data_siswa->NILAI_TOTAL_JAMBONG_SISTEM;
          //  $row[] = $data_siswa->JAMBONG;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->laporan_model->count_all(),
            "recordsFiltered" => $this->laporan_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

		
	}

}
