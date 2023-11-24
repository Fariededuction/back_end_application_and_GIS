<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_realisasi');    
    }



    public function index()
	{
		$this->load->view('View_realisasi');
	}

public function data_realisasi()
	{

        $list = $this->Model_realisasi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $data_real) {


            $no++;
            $row = array();         
            $row[] = $data_real->NO_SSPD;
            $row[] = $data_real->NO_FORMULIR;
            $row[] = $data_real->NAMA;
            $row[] = $data_real->NAMA_PERUSAHAAN;
            $row[] = $data_real->ALAMATREKLAME;
            $row[] = $data_real->ISI_REKLAME;
            $row[] = $data_real->TGLSKPD;
            $row[] = $data_real->TGL_BAYAR;
            $row[] = $data_real->PAJAKLB;
            $row[] = $data_real->TOTALSANKSI;
            $row[] = $data_real->JAMBONG;
            $row[] = $data_real->FLAG_PERMOHONAN;
            $row[] = $data_real->NAMA_JENIS;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_realisasi->count_all(),
            "recordsFiltered" => $this->Model_realisasi->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

		
	}

}