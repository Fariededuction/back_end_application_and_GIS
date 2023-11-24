<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cetak_bkp extends CI_Controller {
	
	
    public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
			
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('Model_cetak_sts');    
				
    }



    public function index()
	{		
		$this->load->view('View_sts');	
	}

	public function cetak_bkp()
	{
		
		$list = $this->Model_cetak_sts->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();         
			$row[] = $item->JUMLAH_OBYEK;
			$row[] = $item->TGL_PERMOHONAN;
			$row[] = $item->PAJAK_POKOK;
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" 
                      title="Lihat detail" onclick="edit_person1('."'".$item->PAJAK_POKOK."'".')"><i class="glyphicon glyphicon-pencil"></i> Cetak Sts BKP</a>';
			// Construct the link using proper onclick attribute format
			 $link = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Cetak" onclick="location.href=\''.site_url("Cetak_bkp/generate_excel/".$item->PAJAK_POKOK).'\';"><i class="glyphicon glyphicon-pencil"></i>Cetak laporan BKP</a>';
			 $row[] = $link;
	
			$data[] = $row;
		}
	
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Model_cetak_sts->count_all(),
			"recordsFiltered" => $this->Model_cetak_sts->count_filtered(),
			"data" => $data,
		);
		// Output to JSON format
		echo json_encode($output);
	}

	public function edit($id) {
        $data = $this->Model_cetak_sts->get_by_id($id);
        echo json_encode($data);
    }   
	
	// public function sts_show($PAJAK_POKOK) {
	// 	require_once APPPATH . "/third_party/PHPExcel.php";
	// 	$objPHPExcel = PHPExcel_IOFactory::load('file_excel/template.xlsx'); // Load your template Excel file
	// 	$data = $this->Model_cetak_sts->get_by_id($PAJAK_POKOK);
	
	// 	// Set headers
	// 	$objPHPExcel->setActiveSheetIndex();
	// 	// Add more headers if needed
		
	// 	// Add data
	// 	$row = 65;
	// 	foreach ($data as $item) {
	// 		$objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $item->PAJAK_POKOK);
	// 		// ... Add more data if needed
	// 		$row++;
	// 	}
	
	// 	// Save the Excel file
	// 	$file_path = 'file/ops_test.xlsx'; // Update with your desired path
	// 	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	// 	$objWriter->save($file_path);
		
	// 	// Download the file using CodeIgniter's force_download
	// 	$this->load->helper('download');
	// 	force_download($file_path, null);
	// 	// The force_download function will automatically clean up the temporary file
		
	// 	// Note: You may choose to delete the file after download if needed
	// }

	public function generate_excel($id) {
		require_once APPPATH . "/third_party/PHPExcel.php";
		$this->load->library('numbertowordconvertsconver');
		$converter = $this->numbertowordconvertsconver;
		
		$data = $this->Model_cetak_sts->get_by_id($id);
		if (!$data) {
            echo "Report not found!";
            return;
        }

		
		$objPHPExcel = PHPExcel_IOFactory::load('file_excel/template.xlsx'); // Load your template Excel file

		$objPHPExcel->getActiveSheet()->setCellValue('M65', $data->PAJAK_POKOK);
		$objPHPExcel->getActiveSheet()->setCellValue('C8', $data->TGL_PERMOHONAN);
		$objPHPExcel->getActiveSheet()->mergeCells('G11:M12');
		$objPHPExcel->getActiveSheet()->setCellValue('G11', $converter->convert_number($data->PAJAK_POKOK.'Rupiah').' Rupiah');
		
	
		// Save the Excel file
		$file_path = 'file/ops_reklame.xlsx'; // Update with your desired path
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save($file_path);		
		// Download the file using CodeIgniter's force_download
		$this->load->helper('download');
		force_download($file_path,null);
		// The force_download function will automatically clean up the temporary file
		
		// Note: You may choose to delete the file after download if needed

	}

}

