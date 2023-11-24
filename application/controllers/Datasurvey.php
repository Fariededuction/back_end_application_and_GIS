<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasurvey extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datasurvey','model1','model2');  
        $this->load->model('m_config_cpanel','config_cpanel');
        $this->load->model('Mlogin','Mlogin');
       
        
    }

    public function index()
	{   

      
        $this->load->helper('url');
		$this->load->view('View_datasurvey');
       
	}

public function datasurvey()
	{

     //   $list = $this->Model_stpdkb->get_datatables();
        $list = $this->model1->get_datatables();
      
    //    $list = $this->model1->get_datatables1(NO_TRANSAKSI1);
        $data = array();
       
        $no = $_POST['start'];
        foreach ($list as $model1) {
            $no++;
            $row = array();         
            $row[] = $model1->NO_TRANSAKSI;
         //   $row[] = $model1->NO_TRANSAKSI1;
            $row[] = $model1->NO_FORMULIR;
            $row[] = $model1->NO_OBYEK_REKLAME;
            $row[] = $model1->TIM_SURVEY;
            $row[] = $model1->TGL_SURVEY;
            $row[] = $model1->TGL_VERIFIKASI;
            $row[] = $model1->TGL_ENTRY;
            $row[] = $model1->JENIS_PRODUK_SURVEY;
            $row[] = $model1->LETAK_REKLAME_SURVEY;
            $row[] = $model1->STATUS_TANAH_SURVEY;
            $row[] = $model1->TEKS_REKLAME_SURVEY;
            $row[] = $model1->ALAMAT_PENEMPATAN_SURVEY;
            $row[] = $model1->NAMA_KEC_SURVEY;
            $row[] = $model1->NAMA_KEL_SURVEY;
            $row[] = $model1->INFO_ENTRY;
        //    $row[] = $model1->INFO_E;
        if ($model1->STATUS_PERIKSA_OL == 'CEK')
        {
            $status="<span class='btn btn-primary'>CEK</span>";
        }
        else if ($model1->STATUS_PERIKSA_OL == 'BERANGKAT')
        {
            $status="<span class='btn btn-warning'>BERANGKAT</span>";
        }
        else 
        {
            $status="<span class='btn btn-success'>SUDAH SKPD</span>";
        }
            $row[] = $status;
            $row[] = '<a class="btn btn-sm btn-info" i class="fa fa-check" href="javascript:void(0)" 
            title="Edit" onclick="lihat_foto('."'".$model1->NO_TRANSAKSI."'".')"><i class="fa fa-image"></i> FOTO VERIFIKASI</a>'; 
            $row[] = '<a class="btn btn-sm btn-info" i class="fa fa-check" href="javascript:void(0)" 
            title="Edit" onclick="edit_person('."'".$model1->NO_TRANSAKSI."'".')"><i class="fa fa-check"></i> OLAH</a>';
      //      $row[] = '<a class="btn btn-sm btn-info" i class="fa fa-check" href="javascript:void(0)" 
       //     title="lokasi" onclick="view_foto('."'".$model1->NO_TRANSAKSI1."'".','."'".$model1->NO_TRANSAKSI."'".')"><i class="fa fa-image"></i> OLAH</a>';
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model1->count_all(),
            "recordsFiltered" => $this->model1->count_filtered(),
            "data" => $data,
        );
        //output to json format      
        echo json_encode($output);		
	}

    public function update() {
        $data = array(        
       'NO_TRANSAKSI' => $this->input->post('NO_TRANSAKSI'),
      'NO_FORMULIR' => $this->input->post('NO_FORMULIR'),   
      'TEKS_REKLAME_SURVEY' => $this->input->post('TEKS_REKLAME_SURVEY'),
    //  'KETERANGAN' => $this->input->post('KETERANGAN'),
      'ALAMAT_PENEMPATAN_SURVEY' => $this->input->post('ALAMAT_PENEMPATAN_SURVEY'),
      'NAMA_KEC_SURVEY' => $this->input->post('NAMA_KEC_SURVEY'),
      'NAMA_KEL_SURVEY' => $this->input->post('NAMA_KEL_SURVEY'),
      'TGL_ENTRY' => $this->input->post('TGL_ENTRY'),
      'LETAK_REKLAME_SURVEY' => $this->input->post('LETAK_REKLAME_SURVEY'),
        'STATUS_PERIKSA_OL' => $this->input->post('STATUS_PERIKSA_OL'),  
    //    'FOTO' => $this->input->post('FOTO'),        
        'USERNAME' => $this->session->userdata('name'), 
        'IP_OPERATOR' => $this->input->ip_address(),
    );    
    $this->model1->updatesurvey(array('NO_TRANSAKSI' => $this->input->post('NO_TRANSAKSI')), $data);
    echo json_encode(array("status" => TRUE));
    }    

    public function edit($NO_TRANSAKSI) {

     //   $urutnop=$this->input->post('NO_TRANSAKSI1',true);
     $data=$this->model1->get_by_id($NO_TRANSAKSI);
       
    //   echo $hasil;
     //   $data = $this->model1->get_by_id($NO_TRANSAKSI);
  
        echo json_encode($data);
    }   

    // public function edit1($NO_TRANSAKSI1) {

    //     //   $urutnop=$this->input->post('NO_TRANSAKSI1',true);
    //        $data=$this->model1->get_foto_lokal($NO_TRANSAKSI1);
       
    //        if(!empty($data) || $data!=null)
    //        {
    //            $_foto=$data->FOTO->load();	
    //            $_foto=base64_encode($_foto);
    //            $data='<img alt="" height="500" width="100%" src="data:image/jpeg;base64,'.$_foto.'"/>';
    //        }
    //        else
    //        {
    //            $data="<span class='label label-danger'>Gambar tidak ada</span>";
    //        }
    //    //   echo $hasil;
    //     //   $data = $this->model1->get_by_id($NO_TRANSAKSI);
            
           
    //        echo json_encode($data);
    //    }   

       public function edit1($no_transaksi) {

   //        $trans=$this->input->post('no_transaksi1',true);
           $data=$this->model1->get_foto_lokal($no_transaksi);
       
               $_foto=$data->FOTO->load();	
               $_foto=base64_encode($_foto);
               $data='<img alt="" height="500" width="100%" src="data:image/jpeg;base64,'.$_foto.'"/>';
        
       //   echo $hasil;
        //   $data = $this->model1->get_by_id($NO_TRANSAKSI);
            
           
        echo json_encode($data);
       } 

    
  
  }



