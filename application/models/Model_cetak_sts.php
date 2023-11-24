<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_cetak_sts extends CI_Model
{
	var $viewsts = 'VIEW_STS_OPS';
    var $column_order = array('JUMLAH_OBYEK','TGL_PERMOHONAN','PAJAK_POKOK'); //set column field database for datatable orderable
    var $column_search = array('TGL_PERMOHONAN'); //set column field database for datatable searchable just firstname , lastname , address are searchable
     var $order = array('TGL_PERMOHONAN' => 'desc'); // default order 

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->reklame_online = $this->load->database('default',TRUE);
    }

	public function _get_datatables_query()
	{
		if ($this->input->post('tgl_awal')) {
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');
			$tgl_a = substr($tgl_awal, 0, 10);
			$tgl_b = substr($tgl_akhir, 14, 11);
	
			$this->db->where('TGL_PERMOHONAN >=', $tgl_a);
			$this->db->where('TGL_PERMOHONAN <=', $tgl_b);
		}
	

		$this->db->from($this->viewsts);


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


   public function get_datatables()
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
        $this->db->from($this->viewsts);
		return $this->db->count_all_results();
    }

	public function get_by_id($id) {
        $query = $this->db->get_where('VIEW_STS_OPS', array('PAJAK_POKOK' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


	public function get_all_data() {  
		return $this->db->get('VIEW_STS_OPS')->result();
    }


}
