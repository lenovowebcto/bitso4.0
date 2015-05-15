<?php
class category extends CI_Controller{
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('CategoryModel');
		Auth::execute_auth();
	}
	
	//category1
	function index(){
		$data['list'] = $this->CategoryModel->selectAllcategory();
		$this->load->view('admin/category/allcategory',$data);
	}
	
	function addcategory(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0)$data['cate'] = $this->CategoryModel->selectcategorybyid($id);
		$this->load->view('admin/category/addcategory',$data);
	}
	
	function toaddcategory(){
		$id = isset($_POST['id'])?$_POST['id']:0;
		$cate_name = isset($_POST['cate_name'])?$_POST['cate_name']:'';
		$arr['cate_name'] = $cate_name;
		if($id>0){
			$res = $this->CategoryModel->updatecategory($id,$arr);
		}else{
			$res = $this->CategoryModel->insertcategory($arr);
		}
		
		if($res){
			redirect('admin/category');
		}else{
			if($id>0){
				$this->load->view('admin/category/addcategory?id='.$id);
			}else{
				$this->load->view('admin/category/addcategory');
			}
			
		}
	}
	//category2
	function next_category(){
		$data['cc_id'] = $id = $_GET['id'];
		$data['list'] = $this->CategoryModel->allnextcategorybyid($id);
		$this->load->view('admin/category/nextcategorylist',$data);
	}
	
	function add_nextcategory(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0)$data['next'] = $this->CategoryModel->selectnextbyid($id);
		$data['cc_id'] = $cc_id = $_GET['cc_id'];
		$this->load->view('admin/category/addnextcategory',$data);
	}
	
	function toadd_nextcategory(){
		$data['cc_id'] = $cc_id = $_POST['cc_id'];
		$data['id'] = $id = $_POST['id'];
		$nc_name = $_POST['nc_name'];
		$arr['nc_name'] = $nc_name;
		
		if($id>0){
			$res = $this->CategoryModel->updatenextcategory($arr,$id);
		}else{
			$arr['cc_id'] = $cc_id;
			$res = $this->CategoryModel->insertnextcategory($arr);
		}
		
		if($res){
		   redirect('admin/category/next_category?id='.$cc_id);
		}else{
			$this->load->view('admin/category/addnextcategory',$data);
		}
	}
	
	function findcategory2(){
		$cc_id = $_POST['id'];
		$c2 = $this->CategoryModel->selectcate2byid($cc_id);
		$json = json_encode($c2);
		echo $json;
	}
}