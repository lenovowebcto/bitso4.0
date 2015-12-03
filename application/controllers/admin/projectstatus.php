<?php
class projectstatus extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('StatusModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['status'] = $this->StatusModel->selectprojectAllStatus();
		$this->load->view('admin/projcetstatus/statuslist',$data);
	}
	function addstatus(){
		$data['sid'] = $sid = isset($_GET['sid']) ? $_GET['sid'] : 0;
		$data['status'] = $this->StatusModel->selectprojectstatusbyid($sid);
		$this->load->view('admin/projcetstatus/addstatus',$data);
	}
	
	function toaddstatus(){
		$sid = isset($_POST['sid'])?$_POST['sid']:0;
		$stype = $_POST['stype'];
		$arr['stype'] = $stype;
		if($sid>0){
			$res = $this->StatusModel->updateprojectstatus($sid,$arr);
		}else{
			$res = $this->StatusModel->insertprojectstatus($arr);
		}
		if($res){
			redirect('admin/projectstatus');
		}else{
			if($sid>0){
				$this->load->view('admin/projcetstatus/addstatus?sid='.$sid);
			}else{
				$this->load->view('admin/projcetstatus/addstatus');
			}
		}
	}
	/*
	function deletestatus(){
		$sid = $_GET['sid'];
		$res = $this->StatusModel->deleteprojectstatus($sid);
		redirect('admin/status');
	}*/
}