<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skpdkb extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('Model_skpdkb','model');  
        $this->load->model('Mlogin','Mlogin');
       
        
    }

    public function index()
	{   
       
        $this->load->helper('url');
		$this->load->view('View_skpdkb');
	}

public function skpdkb()
	{

     //   $list = $this->Model_stpdkb->get_datatables();
        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $model) {
            $no++;
            $row = array();         
            $row[] = $model->NO_FORMULIR;
            $row[] = $model->KODE_OBYEK;
            $row[] = $model->TGL_PENETAPAN;
            $row[] = $model->NILAI_PAJAK;
            $row[] = $model->NILAI_DENDA_PAJAK;
           $row[] = $model->DENDA_PERSEN;
           $row[] = $model->CATATAN;
            $row[] = $model->OPR_CETAK;
            $row[] = $model->TGL_EDIT;
       
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" 
                      title="Edit" onclick="edit_person('."'".$model->NO_SKPDKB."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model->count_all(),
            "recordsFiltered" => $this->model->count_filtered(),
            "data" => $data,
        );
        //output to json format      
        echo json_encode($output);		
	}

    public function update() {
        
     

        $data = array(        
      // $no_stpdkb = $this->input->post('no_stpdkb'),
         'NO_FORMULIR' => $this->input->post('NO_FORMULIR'),        
      // 'KODE_OBYEK' => $this->input->post('KODE_OBYEK'),
     //  'TGL_PENETAPAN' => $this->input->post('TGL_PENETAPAN'),
        'NILAI_DENDA_PAJAK' => $this->input->post('NILAI_DENDA_PAJAK'),
        'DENDA_PERSEN' => $this->input->post('DENDA_PERSEN'),
        'CATATAN' => $this->input->post('CATATAN'),    
        'TGL_EDIT' => date('d-M-y'),
        'USERNAME' => $this->session->userdata('name'), 
        'IP_OPERATOR' => $this->input->ip_address(),
    );    
    $this->model->updateskpdkb(array('NO_SKPDKB' => $this->input->post('NO_SKPDKB')), $data);
    echo json_encode(array("status" => TRUE));
    }    

    public function edit($NO_SKPDKB) {
        $data = $this->model->get_by_id($NO_SKPDKB);
        echo json_encode($data);
    }   

}
