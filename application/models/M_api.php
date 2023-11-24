
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_data() {
        $query = $this->db->get('MONITOR_DATA_SILANG');
        return $query->result();
    }



}
