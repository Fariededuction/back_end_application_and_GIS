<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_request extends CI_Controller {


public function api2() {
		$query = $this->db->query("SELECT * FROM MONITOR_DATA_SILANG")->result();
		$data = [];
		foreach ($query as $row) { 
			$data[] = [
				"status" => "success",
				"PROGRES" => $row->PROGRES,
				"NO_FORMULIR" => $row->NO_FORM,
				"DETAIL" => array(
					"NAMA JALAN" => $row->JALAN,
				//	"KETERANGAN" => $row->KETERANGAN,
					"NOR" => $row->NOR
				)
			];
		}
	//	$this->response($query, 200);
		header('Content-Type: application/json');
		echo json_encode(["Data_reklame" => $data]);
	}

	public function getdatasurvey(){
		$this->load->model('Model_simpatik');
		header('Content-Type: application/json');
		$datasurvey = $this->Model_simpatik->getsurvey();
		echo json_encode(["data" => $datasurvey]);	
	}
}
