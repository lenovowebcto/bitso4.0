<?php
class project extends CI_Controller{
	 function __construct(){
	 	parent::__construct();
	 	$this->load->model('ProjectModel');
	 	Auth::execute_auth();
	 }
	 function index(){
	 	$data['project'] = $this->ProjectModel->selectAllProject();
	 	$this->load->view('admin/project/projectlist',$data);
	 }
	 function addproject(){
	 	$data['projectid'] = $pid =isset($_GET['projectid'])? $_GET['projectid']:0;
	 	$data['project'] = $this->ProjectModel->selectprojectbyid($pid);
	 	$this->load->view('admin/project/addproject',$data);
	 }
	 function toaddproject(){
	 	$pid = isset($_POST['projectid'])?$_POST['projectid']:0;
	 	$pname = $_POST['pname'];
	 	$subseries = $_POST['subseries'];
	 	$arr = array('pname'=>$pname,'subseries'=>$subseries);
	 	
	 	if($pid>0){
	 		$res = $this->ProjectModel->updateproject($pid,$arr);
	 	}else{
	 		$res = $this->ProjectModel->insertproject($arr);
	 	}
	 
	 	if($res){
	 		redirect('admin/project');
	 	}else{
	 		if($pid>0){
	 			$this->load->view('admin/project/addproject?projectid='.$pid);
	 		}else{
	 			$this->load->view('admin/project/addproject');
	 		}
	 		
	 	}
	 	
	 }
	 
	 function deleteproject(){
	 	$pid = isset($_GET['projectid'])?$_GET['projectid']:0;
	 	if($pid>0){
	 		$this->ProjectModel->deleteproject($pid);
	 	}
	 	redirect('admin/project');
	 }
	 
}