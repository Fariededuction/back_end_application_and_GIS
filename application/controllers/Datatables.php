<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        $this->load->model('laporan_masuk_model');
    }

    public function index()
	{
		$this->load->view('datatables_view');
	}


    public function ajax_siswa_tabungan()
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
            $row[] = $data_siswa->TGLSKPD;
            $row[] = $data_siswa->TGL_BAYAR;
            $row[] = $data_siswa->PAJAKLB;
            $row[] = $data_siswa->JAMBONG;
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
