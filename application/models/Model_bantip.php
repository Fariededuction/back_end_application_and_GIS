<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_bantip extends CI_Model
{
    var $table_b = 'MONITOR_DATA_BANTIP';
    var $column_order = array( 'NOR', 'LUAS', 'PAJAK',
                                'TEKS_REKLAME','JALAN','NO_FORM','TGL_AKHIR_BERLAKU','TGL_BANTIP'
								); //set column field database for datatable orderable
    var $column_search = array('NOR', 'NO_FORM', 'TEKS_REKLAME','TGL_AKHIR_BERLAKU'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('TGL_AKHIR_BERLAKU' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->spd_db = $this->load->database('default',TRUE);
    }

    private function _get_datatables_query()
    {

		if ($this->input->post('tgl_awal1')) {
            $tgl_awal1 = $this->input->post('tgl_awal1');
            $tgl_akhir1 = $this->input->post('tgl_akhir1');
            $tgl_a1 = substr($tgl_awal1, 0, 10);
            $tgl_b1 = substr($tgl_akhir1, 14, 11);
            //echo $tgl_awal;
         //   $this->db->where("TO_CHAR(TGL_PENETAPAN,'DD/MM/YYYY')>=",$tgl_a);
        //    $this->db->where("TO_CHAR(TGL_PENETAPAN,'DD/MM/YYYY')<=",$tgl_b);

            $this->db->where('TGL_AKHIR_BERLAKU>=',$tgl_a1);
            $this->db->where('TGL_AKHIR_BERLAKU<=',$tgl_b1);
        } 


        //add custom filter here
		if($this->input->post('JALAN'))
        {
            $this->db->like('JALAN', $this->input->post('JALAN'));
        }


        $this->db->from($this->table_b );
        // $this->db->select( 'tgl_transfer', SUM(ttl_closing) as ttl_closing, SUM(total_so) as total_so, SUM(ttl_transfer) as ttl_transfer, SUM(jml_so) as jml_so);

        // $this->db->get(table_1);
        // $this->db->select('tgl_so, SUM(harga_total) as ttl_closing, SUM(nilai_so) as total_so, SUM(total_transfer) as ttl_transfer, COUNT(nilai_so) as jml_so', FALSE);
        // $this->db->from($this->view);
        // $this->db->group_by("tgl_so");

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                   $this->db->group_end(); //close bracket
            }
            $i++;
        }

       

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

	

    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   public function count_filtered()
    {
        $this->_get_datatables_query();     

        $query = $this->db->get();
       
        return $query->num_rows();
    }

  

    public function count_all()
    {
		$this->db->from($this->table_b);
		return $this->db->count_all_results();
    }

	  

	public function get_by_id($NO_FORM)
    {
        $this->db->from($this->table_b);
        $this->db->where('NO_FORM',$NO_FORM);
        $query = $this->db->get();
        return $query->row();
    }

	public function update($where, $data)
    {
        $this->db->update($this->table_b, $data, $where);
        return $this->db->affected_rows();
    }

	public function save($data)
    {
        $this->db->insert($this->table_b, $data);
        return $this->db->insert_id();
    }

	public function count_all1()
	{
		$this->spd_db->from('MONITOR_DATA_BANTIP');
		
		return $this->spd_db->count_all_results();
	}

	public function insert($data) {
		$res = $this->db->insert_batch('MONITOR_DATA_BANTIP',$data);
		if($res){
		return TRUE;
		}else{
		return FALSE;
		}

	}
}
