<?php
class reqtype extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ReqtypeModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['reqtype'] = $this->ReqtypeModel->selectAllreqtype();
		$this->load->view('admin/reqtype/req_list',$data);
	}
	
	function  addtype(){
		$data['rqid'] = $rqid = isset($_GET['rqid'])?$_GET['rqid']:0;
		if($rqid>0)$data['type'] = $this->ReqtypeModel->selecttypebyid($rqid);
		$this->load->view('admin/reqtype/addtype',$data);
	}
	function toaddtype(){
		$rqid = isset($_POST['rqid'])?$_POST['rqid']:0;
		$request_type = $_POST['request_type'];
		$ar['rqtype'] = $request_type;
		if($rqid<=0){
			$res = $this->ReqtypeModel->inserttype($ar);
		}else{
			$res = $this->ReqtypeModel->updatetype($ar,$rqid);
		}
		
		if($res){
			redirect('admin/reqtype');
		}else{
		 if($rqid>0){
				$this->load->view('admin/reqtype/addtype?rqid='.$rqid);
			}else{
				$this->load->view('admin/reqtype/addtype');
			}
		 }
	}
	
}