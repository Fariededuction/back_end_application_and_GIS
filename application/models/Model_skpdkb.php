<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_skpdkb extends CI_Model
{

    var $tabel_skpdkb = 'SURVEYAPP.SKPDKB';
	var $sql = "SELECT * FROM SURVEYAPP.SKPDKB";
    var $column_order = array( 'NO_FORMULIR','KODE_OBYEK',
                                'TGL_PENETAPAN','NILAI_PAJAK','NILAI_DENDA_PAJAK','DENDA_PERSEN',
                                 'CATATAN','OPR_CETAK','TGL_EDIT'); //set column field database for datatable orderable
    var $column_search = array('NO_FORMULIR', 'NILAI_PAJAK'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('NO_SKPDKB' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   
    private function _get_datatables_query()
    {
        //add custom filter here
       
       
		$sql = "SELECT * FROM SURVEYAPP.SKPDKB";
       
        $i = 0;

		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {
				$searchTerms = explode(' ', $_POST['search']['value']);
				
				if ($i === 0) {
					$sql .= " WHERE (";
				} else {
					$sql .= " OR ";
				}
		
				$sql .= "(";
				foreach ($searchTerms as $term) {
					foreach ($this->column_search as $column) {
						$sql .= "$column LIKE '%$term%' OR ";
					}
				}
				$sql = rtrim($sql, ' OR '); // Remove the last ' OR '
				$sql .= ")";
				
				if (count($this->column_search) - 1 == $i) {
					$sql .= ")";
				}
			}
			$i++;
		}

        if (isset($_POST['order']))
        {
            $sql .= " ORDER BY " . $this->column_order[$_POST['order']['0']['column']] . " " . $_POST['order']['0']['dir'];
        } else if (isset($this->order))
        {
            $order = $this->order;
            $sql .= " ORDER BY " . key($order) . " " . $order[key($order)];
        }

        // Execute the custom SQL query
        $query = $this->db->query($sql);

        return $query->result();
    }

    function get_datatables()
    {
        $result = $this->_get_datatables_query();

        // Optional: Apply pagination manually
        if ($_POST['length'] != -1)
        {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $result = array_slice($result, $start, $length);
        }

        return $result;
    }

	function count_filtered()
    {
        $result = $this->_get_datatables_query();
        return count($result);
    }

    public function count_all()
    {
		$result = $this->_get_datatables_query();
		return count($result);
    }


    public function save($data)
    {
        $this->db->insert($this->tabel_skpdkb, $data);
        return $this->db->insert_id();
    }

    public function updateskpdkb($where, $data) { 
        $this->db->update($this->tabel_skpdkb, $data, $where);
        return $this->db->affected_rows();
    }   

    public function get_by_id($NO_SKPDKB)
    {
        $this->db->from($this->tabel_skpdkb);
        $this->db->where('NO_SKPDKB',$NO_SKPDKB);
        $query = $this->db->get();
 
        return $query->row();
    }
}
