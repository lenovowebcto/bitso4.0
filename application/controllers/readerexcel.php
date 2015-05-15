<?php
class readerexcel extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index1(){
		
	}
	
	function  index(){
		$this->load->add_package_path(APPPATH.'libraries/PHPExcel');
		$this->load->library('PHPExcel');
		
//        $reader = new PHPExcel_Reader_Excel2007();
//        $pFilename = 'D:/www/project/bitso2/ipg.xlsx';
//        $reader->load($pFilename);
		
		$callStartTime = microtime(true);
		$objPHPExcel = PHPExcel_IOFactory::createReaderForFile($pFilename);
		
		$callEndTime = microtime(true);
		$callTime = $callEndTime - $callStartTime;
		echo 'Call time to read Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
		// Echo memory usage
		echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;
		
		
		echo date('H:i:s') , " Write to Excel2007 format" , EOL;
		$callStartTime = microtime(true);
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
		
		$callEndTime = microtime(true);
		$callTime = $callEndTime - $callStartTime;
		
		echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
		echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
		// Echo memory usage
		echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;
		
		
		// Echo memory peak usage
		echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;
		
		// Echo done
		echo date('H:i:s') , " Done writing file" , EOL;
		echo 'File has been created in ' , getcwd() , EOL;
		 EOL;
	}
	
}