<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_peta extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

		
		
		$this->spd_db = $this->load->database('default',TRUE);
	}

	public function get_all_peta(){
		// $this->db->select('*');
		// $this->db->from('VW_MONITOR_DATA_SILANG_FOTO A');
		// return $this->db->get()->result();
		$this->db->from('MONITOR_DATA_SILANG');
		return $this->db->get()->result();
	}

	// public function get_all_peta(){
	// 	$qry="select * from MONITOR_DATA_SILANG A
	// 	inner join SURVEYAPP.FOTOSURVEY_I B
	// 	on A.NOR = B.NO_OBYEK_REKLAME";
	// 	$query = $this->spd_db->query($qry);
	// 	$hasil=$query->row();	
	// 	return $hasil;
	// }

	public function count_all($key)
	{
		$this->spd_db->from('MONITOR_DATA_SILANG');
		$this->spd_db->where('PROGRES',$key);
		return $this->spd_db->count_all_results();
	}
}
