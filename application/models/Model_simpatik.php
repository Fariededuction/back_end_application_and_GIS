<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_simpatik extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function get_by_id($NPWPD)
    {
        $this->db->from('VWTABELPERMOHONAN');
        $this->db->where('NPWPD',$NPWPD);
        $query = $this->db->get();
        return $query->row();
    }

	public function get_by_nor($NOR)
    {
        $this->db->from('SURVEYAPP.DATASURVEY');
        $this->db->where('NO_OBYEK_REKLAME',$NOR);
        $query = $this->db->get();
        return $query->row();
    }

	public function get_no_nota(){
        $cd = $this->db->query("SELECT MAX(substr(ID,4)) AS KD_MAX FROM TESTING_REK_OPS");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->KD_MAX)+1;
                $kd = sprintf("%07s", $tmp);
            }
        }else{
            $kd = "3014201";
        }
        return 'SIM'.$kd;
    }

	public function get_no_formulir(){
        $cd = $this->db->query("SELECT MAX(substr(NO_FORMULIR,3)) AS KD_MAX 
		FROM TESTING_REK_OPS_SKPD
		WHERE NO_FORMULIR LIKE '%T-4%'");
        $kd = "";
        if($cd->num_rows()>0){
            foreach($cd->result() as $k){
                $tmp = ((int)$k->KD_MAX)+1;
                $kd = sprintf("%07s", $tmp);
            }
        }else{
            $kd = "4908568";
        }
        return 'T-'.$kd;
    }

	public function insert_data($data, $data2) {
		 $this->db->insert('TESTING_REK_OPS', $data);
		 $this->db->insert('TESTING_REK_OPS_SKPD', $data2);
		 return true;      
    }

	public function getsurvey($nor) {
		$sql = "SELECT A.FOTO, A.PROGRES, A.LATITUDE, A.LONGITUDE, A.TEKS_REKLAME, A.NO_FORM, A.PHOTO, A.NOR, A.SURVEY_KE
				FROM TEST_INSERT_OBYEK A
				-- INNER JOIN (
				-- 	SELECT survey_ke, no_obyek_reklame, foto FROM surveyapp.fotosurvey
				-- 	UNION ALL
				-- 	SELECT survey_ke, no_obyek_reklame, foto FROM surveyapp.fotosurvey_i
				-- 	UNION ALL
				-- 	SELECT survey_ke, no_obyek_reklame, foto FROM surveyapp.fotosurvey_k
				-- 	UNION ALL
				-- 	SELECT survey_ke, no_obyek_reklame, foto FROM surveyapp.fotosurvey_l
				-- ) b ON a.nor = b.no_obyek_reklame
				-- WHERE A.NOR = ?
				";
		$query = $this->db->query($sql, [$nor]);
		return $query->result();
	}

}
