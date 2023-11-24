<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datasurvey extends CI_Model
{
   // var $_get_datatables_query;
    var $tabel_datasurvey = 'SURVEYAPP.DATASURVEY A';
    var $tabel_fotosurvey = 'SURVEYAPP.FOTOSURVEY B';
  //  var $tabel_fotosurvey_k = 'SURVEYAPP.FOTOSURVEY_K C';
    var $column_order = array( 'NO_TRANSAKSI','NO_OBYEK_REKLAME',
                                'NO_FORMULIR','KODE_OBYEK','NO_FORMULIR_LAMA','TGL_SURVEY','TGL_VERIFIKASI','SURVEY_KE',
                                 'TGL_ENTRY','JENIS_PRODUK_SURVEY','LETAK_REKLAME_SURVEY','STATUS_TANAH_SURVEY','TEKS_REKLAME_SURVEY', 'ALAMAT_PENEMPATAN_SURVEY',
                                  'NAMA_KEC_SURVEY', 'NAMA_KEL_SURVEY','INFO_ENTRY','A.STATUS_PERIKSA_OL'); //set column field database for datatable orderable
    var $column_search = array('A.NO_TRANSAKSI','A.STATUS_PERIKSA_OL'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('A.TGL_ENTRY' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->reklame_online = $this->load->database('default',TRUE);
    }
   
    private function _get_datatables_query()
    {
        //add custom filter here
       
       // $this->db->from($this->tabel_datasurvey);
         // $this->db->select( 'tgl_transfer', SUM(ttl_closing) as ttl_closing, SUM(total_so) as total_so, SUM(ttl_transfer) as ttl_transfer, SUM(jml_so) as jml_so);

        // $this->db->get(table_1);
        // $this->db->select('tgl_so, SUM(harga_total) as ttl_closing, SUM(nilai_so) as total_so, SUM(total_transfer) as ttl_transfer, COUNT(nilai_so) as jml_so', FALSE);
        // $this->db->from($this->view);
        // $this->db->group_by("tgl_so");
        $column_search = array('A.NO_TRANSAKSI','A.STATUS_PERIKSA_OL');
        $this->db->select('A.NO_TRANSAKSI, A.NO_OBYEK_REKLAME, A.NO_FORMULIR, A.TIM_SURVEY, A.TGL_SURVEY, A.TGL_VERIFIKASI, A.TGL_ENTRY,
                            A.JENIS_PRODUK_SURVEY, A.LETAK_REKLAME_SURVEY, A.STATUS_TANAH_SURVEY, A.TEKS_REKLAME_SURVEY, A.ALAMAT_PENEMPATAN_SURVEY,
                            A.NAMA_KEC_SURVEY, A.NAMA_KEL_SURVEY, A.INFO_ENTRY, A.STATUS_PERIKSA_OL');
        $this->db->from($this->tabel_datasurvey, 'A');
        $this->db->join('SURVEYAPP.FOTOSURVEY B', 'A.NO_TRANSAKSI = B.NO_TRANSAKSI');
   //     $this->db->join('SURVEYAPP.FOTOSURVEY_K C', 'A.NO_TRANSAKSI = C.NO_TRANSAKSI');
        $this->db->where('A.INFO_ENTRY', 'SSW');
       
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
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    public function save($data)
    {
        $this->db->insert($this->tabel_datasurvey, $data);
        return $this->db->insert_id();
    }

    public function updatesurvey($where, $data) { 
        $this->db->update($this->tabel_datasurvey, $data, $where);
        return $this->db->affected_rows();
    }  
    

    public function get_foto_lokal($no_transaksi)
 	{
         $this->db->select('A.NO_TRANSAKSI,B.NO_TRANSAKSI, A.NO_OBYEK_REKLAME, A.NO_FORMULIR, B.KETERANGAN,B.FOTO, A.TGL_SURVEY, A.TGL_VERIFIKASI, A.TGL_ENTRY,
         A.JENIS_PRODUK_SURVEY, A.LETAK_REKLAME_SURVEY, A.STATUS_TANAH_SURVEY, A.TEKS_REKLAME_SURVEY, A.ALAMAT_PENEMPATAN_SURVEY,
         A.NAMA_KEC_SURVEY, A.NAMA_KEL_SURVEY, A.INFO_ENTRY, A.STATUS_PERIKSA_OL');
 $this->db->from('SURVEYAPP.DATASURVEY A');
 //   $this->db->from($this->tabel_datasurvey);
 $this->db->JOIN('SURVEYAPP.FOTOSURVEY B','A.NO_TRANSAKSI = B.NO_TRANSAKSI');
 //  $this->db->JOIN($this->tabel_fotosurvey_k,'A.NO_TRANSAKSI = C.NO_TRANSAKSI');
 // $this->_get_datatables_query();
 $this->db->where('A.NO_TRANSAKSI',$no_transaksi);
 $this->db->where('A.INFO_ENTRY','SSW');
 $query = $this->db->get();
 return $query->row();
 	}

// public function get_foto_lokal($no_transaksi1)
// 	{
// 			$sql="select NO_TRANSAKSI, FOTO from SURVEYAPP.FOTOSURVEY where NO_TRANSAKSI='$no_transaksi1'";
// 			$query = $this->reklame_online->query($sql);
// 			$hasil=$query->row();		
// 			return $hasil;
// 	}


    public function get_by_id($NO_TRANSAKSI)
    {     
        $this->db->select('A.NO_TRANSAKSI,B.NO_TRANSAKSI, A.NO_OBYEK_REKLAME, A.NO_FORMULIR, B.KETERANGAN,A.TGL_SURVEY, A.TGL_VERIFIKASI, A.TGL_ENTRY,
                            A.JENIS_PRODUK_SURVEY, A.LETAK_REKLAME_SURVEY, A.STATUS_TANAH_SURVEY, A.TEKS_REKLAME_SURVEY, A.ALAMAT_PENEMPATAN_SURVEY,
                            A.NAMA_KEC_SURVEY, A.NAMA_KEL_SURVEY, A.INFO_ENTRY, A.STATUS_PERIKSA_OL');
        $this->db->from('SURVEYAPP.DATASURVEY A');
     //   $this->db->from($this->tabel_datasurvey);
        $this->db->JOIN('SURVEYAPP.FOTOSURVEY B','A.NO_TRANSAKSI = B.NO_TRANSAKSI');
      //  $this->db->JOIN($this->tabel_fotosurvey_k,'A.NO_TRANSAKSI = C.NO_TRANSAKSI');
       // $this->_get_datatables_query();
        $this->db->where('A.NO_TRANSAKSI',$NO_TRANSAKSI);
       
        $this->db->where('A.INFO_ENTRY','SSW');
        $query = $this->db->get();
 
        return $query->row();
    }
   
}
