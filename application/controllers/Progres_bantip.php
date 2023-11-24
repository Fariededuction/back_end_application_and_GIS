<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progres_bantip extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('Model_bantip','import1'); 
		$this->load->model('Model_bantip'); 
		//$this->load->model('Model_peta');
		//$this->load->helper(array('url','html','form'));   
    }


    public function index()
	{
		$data['totalban']=$this->Model_bantip->count_all1();
	//	$data['totalter']=$this->Model_peta->count_all('BONGKAR');
		$this->load->view('View_progres_bantip',$data);
	}

public function progres_bantip()
	{

        $list = $this->import1->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $import1) {

            $no++;
            $row = array();         
            $row[] = $import1->NOR;
            $row[] = $import1->LUAS;
            $row[] = $import1->PAJAK;
            $row[] = $import1->TEKS_REKLAME;
            $row[] = $import1->JALAN;
            $row[] = $import1->NO_FORM;
            $row[] = $import1->TGL_AKHIR_BERLAKU;
			$row[] = $import1->TGL_BANTIP;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->import1->count_all(),
            "recordsFiltered" => $this->import1->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

		
	}

	public function update()
    {

		$this->_validate();
        $data = array(
                'PROGRES' => $this->input->post('PROGRES'),
                'KETERANGAN_SILANG' => $this->input->post('KETERANGAN_SILANG'),
				'TGL_SILANG' => $this->input->post('TGL_SILANG'),
				'TGL_BONGKAR' => $this->input->post('TGL_BONGKAR'),
				'LATITUDE' => $this->input->post('LATITUDE'),
				'LONGITUDE' => $this->input->post('LONGITUDE'),
				'USERNAME' => $this->session->userdata('name'), 
        		'IP_USER' => $this->input->ip_address(),
				'TIME_ENTRY_UPDATE' => date('d-M-y h:i:s')
			//	'TIME_ENTRY_UPDATE' => datetime()
            );

			if($this->input->post('remove_photo')) // if remove photo checked
			{
				if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
					unlink('upload/'.$this->input->post('remove_photo'));
				$data['PHOTO'] = '';
			}

			if (!empty($_FILES['PHOTO']['name'])) {
				$upload = $this->_do_upload();
		
				// Delete existing file
				$import = $this->import->get_by_id($this->input->post('NO_FORM'));
				if (file_exists('upload/'.$import->PHOTO) && $import->PHOTO) 
					unlink('upload/'.$import->PHOTO);
					$data['PHOTO'] = $upload;
			}
	
        $this->import->update(array('NO_FORM' => $this->input->post('NO_FORM')), $data);
        echo json_encode(array("status" => TRUE));
    }
	

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
      //
	 //  $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

      //  $this->load->library('upload', $config);
		$this->upload->initialize($config);

        if(!$this->upload->do_upload('PHOTO')) //upload and validate
        {
            $data['inputerror'][] = 'PHOTO';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	public function edit($NO_FORM) {
        $data = $this->import->get_by_id($NO_FORM);
		$data->TGL_SILANG = ($data->TGL_SILANG == '00-0-0000') ? '' : $data->TGL_SILANG; // if 0000-00-00 set tu empty for datepicker compatibility
		$data->TGL_BONGKAR = ($data->TGL_BONGKAR == '00-0-0000') ? '' : $data->TGL_BONGKAR; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
    }   


	public function importBantip1(){
		if ($this->input->post('submit')) {
		$path = 'uploads_bantip/';
		require_once APPPATH . "/third_party/PHPExcel.php";
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);            
		if (!$this->upload->do_upload('uploadFile')) {
		$error = array('error' => $this->upload->display_errors());
		} else {
		$data = array('upload_data' => $this->upload->data());
		}
		if(empty($error)){
		if (!empty($data['upload_data']['file_name'])) {
		$import_xls_file = $data['upload_data']['file_name'];
		} else {
		$import_xls_file = 0;
		}
		$inputFileName = $path . $import_xls_file;
		try {
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
		$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$flag = true;
		$i=0;
		foreach ($allDataInSheet as $value) {
		if($flag){
		$flag =false;
		continue;
		}
		$inserdata[$i]['NOR'] = $value['A'];
		$inserdata[$i]['LUAS'] = $value['B'];
		$inserdata[$i]['PAJAK'] = $value['C'];
		$inserdata[$i]['TEKS_REKLAME'] = $value['D'];
		$inserdata[$i]['JALAN'] = $value['E'];
		$inserdata[$i]['NO_FORM'] = $value['F'];
		$inserdata[$i]['TGL_AKHIR_BERLAKU'] = $value['G'];
		$inserdata[$i]['TGL_BANTIP'] = $value['H'];
	//	$inserdata[$i]['TGL_ENTRY'] = $value['G'];
	//	$inserdata[$i]['PROGRES'] = $value['H'];
	//	$inserdata[$i]['PHOTO'] = $value['<a href="'.base_url('upload/'.$import->PHOTO).'" target="_blank">'];
		//$inserdata[$i]['PROGRES'] = $value['H'];
		$i++;
		}               
		$result = $this->import1->insert($inserdata);   
		if($result){
		echo "<h2>Data Berhasil Di Import!!</h2>";
		}else{
		echo "ERROR !";
		}             
		} catch (Exception $e) {
		die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
		. '": ' .$e->getMessage());
		}
		}else{
		echo $error['error'];
		}
		}
		$this->load->view('ImportBantip1');
		}

		private function _validate()
		{
			$data = array();
			$data['error_string'] = array();
			$data['inputerror'] = array();
			$data['status'] = TRUE;
	 
			if($this->input->post('PROGRES') == '')
			{
				$data['inputerror'][] = 'PROGRES';
				$data['error_string'][] = 'progress harus diisi';
				$data['status'] = FALSE;
			}
	 
			if($this->input->post('KETERANGAN_SILANG') == '')
			{
				$data['inputerror'][] = 'KETERANGAN_SILANG';
				$data['error_string'][] = 'Keterangan silang ahrus diisi';
				$data['status'] = FALSE;
			}
	 
			
			if($data['status'] === FALSE)
			{
				echo json_encode($data);
				exit();
			}
		}
		
		}
	

