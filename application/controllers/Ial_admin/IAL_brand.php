<?php

class IAL_brand extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ial/admin/Ial_brand_model','BrandModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['brand'] = $this->BrandModel->selectAllBrand();
		$this->load->view('ial/admin/brand/brandlist',$data);
	}
	function addbrand(){
	    $data['bid'] = $bid = isset($_GET['bid'])?$_GET['bid']:0;
	    $data['brand'] = $this->BrandModel->selectoneByid($bid);
        $this->load->view('ial/admin/brand/addbrand',$data);
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
			redirect('Ial_admin/Ial_brand/index');
		}else{
			if($bid>0){
				$this->load->view('ial/admin/brand/addbrand?bid='.$bid);
			}else{
				$this->load->view('ial/admin/brand/addbrand');
			}
		}
	}
	
	function delbrand(){
		$data['bid'] = $bid = isset($_GET['bid'])?$_GET['bid']:0;
		$this->BrandModel->deletebrand($bid);
		redirect('Ial_admin/IAL_brand/index');
	}
}
