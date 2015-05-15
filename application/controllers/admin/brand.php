<?php

class brand extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('BrandModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['brand'] = $this->BrandModel->selectAllBrand();
		$this->load->view('admin/brand/brandlist',$data);
	}
	function addbrand(){
	    $data['bid'] = $bid = isset($_GET['bid'])?$_GET['bid']:0;
	    $data['brand'] = $this->BrandModel->selectoneByid($bid);
        $this->load->view('admin/brand/addbrand',$data);
	}
	function toaddbrand(){
		$bid = isset($_POST['bid'])?$_POST['bid']:0;
		$bname = $_POST['bname'];
		$arr['bname'] = $bname;
		if($bid>0){
			$res = $this->BrandModel->updatebrand($bid,$arr);
		}else{
			$res = $this->BrandModel->insertbrand($arr);
		}
		if($res){
			redirect('admin/brand');
		}else{
			if($bid>0){
				$this->load->view('admin/brand/addbrand?bid='.$bid);
			}else{
				$this->load->view('admin/brand/addbrand');
			}
		}
	}
	
	function deletebrand(){
		$data['bid'] = $bid = isset($_GET['bid'])?$_GET['bid']:0;
		$this->BrandModel->deletebrand($bid);
		redirect('admin/brand');
	}
}
