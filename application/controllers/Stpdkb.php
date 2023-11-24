<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stpdkb extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('Model_stpdkb','model');  
        $this->load->model('Mlogin','Mlogin');
       
        
    }

    public function index()
	{   
       
        $this->load->helper('url');
		$this->load->view('View_stpdkb');
	}

public function stpdkb()
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
            $row[] = $model->POKOK_PAJAK;
            $row[] = $model->SANKSI;
           $row[] = $model->BUNGA;
		   $row[] = $model->SANKSI_PERSEN;
		   $row[] = $model->BUNGA_PERSEN;
		   $row[] = $model->TOTAL_PAJAK;
           $row[] = $model->KETERANGAN;
            $row[] = $model->USERNAME;
            $row[] = $model->TGL_ENTRY_EDIT;
       
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" 
                      title="Edit" onclick="edit_person('."'".$model->NO_STPDKB."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

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
    
         'NO_FORMULIR' => $this->input->post('NO_FORMULIR'),        
        'SANKSI' => $this->input->post('SANKSI'),
        'BUNGA' => $this->input->post('BUNGA'),
		'SANKSI_PERSEN' => $this->input->post('SANKSI_PERSEN'),
		'BUNGA_PERSEN' => $this->input->post('BUNGA_PERSEN'),
		'TOTAL_PAJAK' => $this->input->post('TOTAL_PAJAK'),  
        'KETERANGAN' => $this->input->post('KETERANGAN'),
		'USERNAME' => $this->session->userdata('name'), 
		'TGL_ENTRY_EDIT' => date('d-M-y'), 
        'IP_OPERATOR' => $this->input->ip_address(),
    );    
    $this->model->updatestpdkb(array('NO_STPDKB' => $this->input->post('NO_STPDKB')), $data);
    echo json_encode(array("status" => TRUE));
    }    

    public function edit($NO_STPDKB) {
        $data = $this->model->get_by_id($NO_STPDKB);
        echo json_encode($data);
    }   

}
