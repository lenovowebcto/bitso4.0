<?php
class taskreport extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('TaskModel');
		Auth::execute_auth();
	}
	
	function report(){
		
		//一维数组fields 二维数组 valus
		$tn = isset($_GET['t'])?$_GET['t']:0;
		
		if(is_numeric($tn))return;
		if($tn=='tpg')$tablename='tickets';
		if($tn=='opt')$tablename = 'lois_opt';
		if($tn=='svc')$tablename = 'lois_svc';
		if($tn=='com')$tablename = 'lois_compatibility';
		if($tn=='ep')$tablename = 'lois_ep_req';
		if($tn=='spb')$tablename = 'lois_opt_spb';
		if($tn=='ele')$tablename = 'lois_element';
		$fields = $this->TaskModel->selectAllFields($tablename);
		$vals = $this->TaskModel->relationtasklist($tablename);
		$this->excelReport($fields,$vals,$tn);
	}
	
    function excelReport($headArr,$data,$tn){
		$this->load->add_package_path(APPPATH.'libraries/PHPExcel');
		$this->load->library('PHPExcel');
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->setTitle($tn);
		$key = ord("A");
		foreach($headArr as $v){
			$colum = chr($key);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
			$key += 1;
		}
		$column = 2;
		$objActSheet = $objPHPExcel->getActiveSheet();
		foreach($data as $key => $rows){ //行写入
			$span = ord("A");
			foreach($rows as $keyName=>$value){// 列写入
				$j = chr($span);
				$objActSheet->setCellValue($j.$column, $value);
				$span++;
			}
			$column++;
		}
		$filename = $tn.'.xlsx';
	    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		header("Pragma: public");
		header("Expires: 0");
		header('Content-Encoding: none');
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		
		header("Content-Type:application/vnd.ms-execl");
		header("Content-Type:application/octet-stream");
		header("Content-Type:application/force-download");
		header("Content-Disposition:inline;filename=$filename");
	
		$objWriter->save('php://output');  
		
	}
}