<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ops_reklame extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
			
            $url=base_url('login');
            redirect($url);
		};
		$this->load->model('Model_simpatik');
    }

    public function index()
	{
		$data['nota']=$this->Model_simpatik->get_no_nota();
		$data['no_formulir']=$this->Model_simpatik->get_no_formulir();
		
		$this->load->view('View_ops_reklame',$data);
	}

	public function get_data_ops($NPWPD) {
        $data = $this->Model_simpatik->get_by_id($NPWPD);
        echo json_encode($data);
    }   

	public function get_data_id(){

$newNota = $this->Model_simpatik->get_no_nota();

$response = array(
    'newNota' => $newNota
);

header('Content-Type: application/json');


echo json_encode($response);
	}

	public function get_data_formulir(){

		$newFor = $this->Model_simpatik->get_no_formulir();
		
		$response = array(
			'newFor' => $newFor
		);
		
		header('Content-Type: application/json');
		
		echo json_encode($response);
			}

	public function getdatasurvey(){
		$nor = $this->input->post('NOR');
		$datasurvey = $this->Model_simpatik->getsurvey($nor);
		echo json_encode($datasurvey);
	}

	public function add_data() {

			
		
		$ID = $this->input->post('ID');
		$NAMA = $this->input->post('NAMA');
		$ALAMAT = $this->input->post('ALAMAT');
		$NO_ALAMAT = $this->input->post('NO_ALAMAT');
		$BLOK_ALAMAT = $this->input->post('BLOK_ALAMAT');
		$NO_TELP = $this->input->post('NO_TELP');
		$NAMA_PERUSAHAAN = $this->input->post('NAMA_PERUSAHAAN');
		$NO_ALAMAT_PERUSAHAAN = $this->input->post('NO_ALAMAT_PERUSAHAAN');
		$BLOK_ALAMAT_PERUSAHAAN = $this->input->post('BLOK_ALAMAT_PERUSAHAAN');
		$TELP_PERUSAHAAN = $this->input->post('TELP_PERUSAHAAN');
		$JABATAN = $this->input->post('JABATAN');
		$NPWPD = $this->input->post('NPWPD');
		$ALAMAT_PERUSAHAAN = $this->input->post('ALAMAT_PERUSAHAAN');
        $data = array(
            'ID' => $ID,
            'NAMA' => $NAMA,
			'ALAMAT' => $ALAMAT,
			'NO_ALAMAT' => $NO_ALAMAT,
			'BLOK_ALAMAT' => $BLOK_ALAMAT,
			'NO_TELP' => $NO_TELP,
			'NAMA_PERUSAHAAN' => $NAMA_PERUSAHAAN,
			'NO_ALAMAT_PERUSAHAAN' => $NO_ALAMAT_PERUSAHAAN,
			'BLOK_ALAMAT_PERUSAHAAN' => $BLOK_ALAMAT_PERUSAHAAN,
			'TELP_PERUSAHAAN' => $TELP_PERUSAHAAN,
			'JABATAN' => $JABATAN,
			'NPWPD' => $NPWPD,
			'ALAMAT_PERUSAHAAN' => $NAMA
        );
		
		$ID = $this->input->post('ID');
		$NO_FORMULIR = $this->input->post('NO_FORMULIR');
		$TGL_PERMOHONAN = $this->input->post('TGL_PERMOHONAN');
		$LOKASI_REKLAME = $this->input->post('LOKASI_REKLAME');
		$DETAIL_LOKASI = $this->input->post('DETAIL_LOKASI');
		
		list($startDate, $endDate) = explode(' s/d ', $TGL_PERMOHONAN);
		$data2 = array(
            'NO_FORMULIR' => $NO_FORMULIR,
			'ID' => $ID,
			'LOKASI_REKLAME' => $LOKASI_REKLAME,
			'DETAIL_LOKASI' => $DETAIL_LOKASI,
			'TGL_AWAL_BERLAKU' => $startDate,
            'TGL_AKHIR_BERLAKU' => $endDate
		);

		$inserted = $this->Model_simpatik->insert_data($data, $data2);

		if ($inserted) {
			redirect('Ops_reklame/print_report/' . $ID);
		} else {
			
			echo "Failed to insert data into the database.";
		}
    }

	public function print_report($ID) {
		$data = $this->db->get_where('VW_TESTING_REK_OPS1', array('ID' => $ID))->row();
         $this->load->view('printable_output_view', $data);
    }

}
