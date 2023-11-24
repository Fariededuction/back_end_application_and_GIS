<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    var $view = 'VW_INSIDENTIL_TUNGGAKAN';
    var $column_order = array( null,'NO_SKPD', 'NO_FORMULIR', 'TGL_PERMOHONAN','NAMA',
                                'TGL_PENETAPAN','NILAI_TOTAL_PAJAK_SISTEM','NILAI_TOTAL_JAMBONG_SISTEM'); //set column field database for datatable orderable
    var $column_search = array('NO_SKPD', 'NO_FORMULIR', 'TGL_PERMOHONAN','NAMA', 'TGL_PENETAPAN',
                                'NILAI_TOTAL_PAJAK_SISTEM','NILAI_TOTAL_JAMBONG_SISTEM'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('TGL_PENETAPAN' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function _get_datatables_query()
    {
        //add custom filter here
		if ($this->input->post('tgl_awal')) {
            $tgl_awal = $this->input->post('tgl_awal');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $tgl_a = substr($tgl_awal, 0, 10);
            $tgl_b = substr($tgl_akhir, 14, 11);
            //echo $tgl_awal;
         //   $this->db->where("TO_CHAR(TGL_PENETAPAN,'DD/MM/YYYY')>=",$tgl_a);
        //    $this->db->where("TO_CHAR(TGL_PENETAPAN,'DD/MM/YYYY')<=",$tgl_b);

            $this->db->where('TGL_PENETAPAN>=',$tgl_a);
            $this->db->where('TGL_PENETAPAN<=',$tgl_b);
        } 

      
        $this->db->from($this->view);
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
        $this->db->from($this->view);
        return $this->db->count_all_results();
    }
}
