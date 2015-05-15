<?php
class IAL_status extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ial/admin/Ial_status_model','StatusModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['status'] = $this->StatusModel->selectAllStatus();
		$this->load->view('ial/admin/status/statuslist',$data);
	}
	function addstatus(){
		$data['sid'] = $sid = isset($_GET['sid']) ? $_GET['sid'] : 0;
		$data['status'] = $this->StatusModel->selectstatusbyid($sid);
		$this->load->view('ial/admin/status/addstatus',$data);
	}
	
	function toaddstatus(){
		$sid = isset($_POST['sid'])?$_POST['sid']:0;
		$stype = $_POST['stype'];
		$arr['stype'] = $stype;
		if($sid>0){
			$res = $this->StatusModel->updatestatus($sid,$arr);
		}else{
			$res = $this->StatusModel->insertstatus($arr);
		}
		if($res){
			redirect('Ial_admin/IAL_status');
		}else{
			if($sid>0){
				$this->load->view('Ial_admin/ial_status/addstatus?sid='.$sid);
			}else{
				$this->load->view('Ial_admin/ial_status/addstatus');
			}
		}
	}
	
	function deletestatus(){
		$sid = $_GET['sid'];
		$res = $this->StatusModel->deletestatus($sid);
		redirect('admin/status');
	}
}