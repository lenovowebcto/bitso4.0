<?php
class group extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('GroupModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['groups'] = $this->GroupModel->selectAllGroup();
		$this->load->view('admin/group/grouplist',$data);
	}
	
	function addgroup(){
		$data['gid'] = $gid = isset($_GET['gid'])?$_GET['gid']:0 ;
		if($gid>0){
			$data['group'] = $this->GroupModel->selectgroup($gid);
		}
		
		$this->load->view('admin/group/addgroup',$data);
	}
	
	function toaddgroup(){
		$gname = $_POST['gname'];
		$gid = isset($_POST['gid'])?$_POST['gid']:0;
		if($gid>0){
			$res = $this->GroupModel->updategroup($gid,$gname);
		}else{
			$res = $this->GroupModel->addgroup($gname);
		}
		if($res){
			 redirect('admin/group/index');
		}else{
			if($gid>0){
				$this->load->view('admin/group/adduser?gid='.$gid);
			}else{
				$this->load->view('admin/group/adduser');
			}
		}
	}
	
	function deletegroup(){
		$gid = isset($_GET['gid'])?$_GET['gid']:0;
		if($gid>0){
			$this->GroupModel->deletegroup($gid);
		}
		redirect('admin/group');
	}
}