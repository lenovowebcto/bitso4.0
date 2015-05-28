<?php
class IAL_category extends CI_Controller{
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('ial/admin/Ial_category_model','ct_model');
		Auth::execute_auth();
	}
	
	//category1
	function index(){
		$data['list'] = $this->ct_model->selectAllcategory();
		$this->load->view('ial/admin/category/allcategory',$data);
	}
	
	function addcategory(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0)$data['cate'] = $this->ct_model->selectcategorybyid($id);
		$this->load->view('ial/admin/category/addcategory',$data);
	}
	
	function toaddcategory(){
		$id = isset($_POST['id'])?$_POST['id']:0;
		$cate_name = isset($_POST['cate_name'])?$_POST['cate_name']:'';
		$arr['cate_name'] = $cate_name;
		if($id>0){
			$res = $this->ct_model->updatecategory($id,$arr);
		}else{
			$res = $this->ct_model->insertcategory($arr);
		}
		
		if($res){
			redirect('Ial_admin/IAL_category');
		}else{
			if($id>0){
				$this->load->view('ial/admin/category/addcategory?id='.$id);
			}else{
				$this->load->view('ial/admin/category/addcategory');
			}
			
		}
	}
	
	function delete1(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		
		$res = $this->ct_model->delete1($id);
		if($res)redirect('IAL_admin/IAL_category');
	}
	function delete2(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		$ic_id = isset($_GET['ic_id'])?$_GET['ic_id']:0;
		$res = $this->ct_model->delete2($id);
		if($res)redirect('IAL_admin/IAL_category/next_category?id='.$ic_id);
	}
	//category2
	function next_category(){
		$data['ic_id'] = $id = $_GET['id'];
		$data['list'] = $this->ct_model->allnextcategorybyid($id);
		$this->load->view('ial/admin/category/nextcategorylist',$data);
	}
	
	function add_nextcategory(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0)$data['next'] = $this->ct_model->selectnextbyid($id);
		$data['ic_id'] = $ic_id = $_GET['ic_id'];
		$this->load->view('ial/admin/category/addnextcategory',$data);
	}
	
	function toadd_nextcategory(){
		$data['ic_id'] = $ic_id = $_POST['ic_id'];
		$data['id'] = $id = $_POST['id'];
		$nc_name = $_POST['nc_name'];
		$arr['nc_name'] = $nc_name;
		
		if($id>0){
			$res = $this->ct_model->updatenextcategory($arr,$id);
		}else{
			$arr['ic_id'] = $ic_id;
			$res = $this->ct_model->insertnextcategory($arr);
		}
		
		if($res){
		   redirect('Ial_admin/IAL_category/next_category?id='.$ic_id);
		}else{
			$this->load->view('ial/admin/category/addnextcategory',$data);
		}
	}
	
	function findcategory2(){
		$ic_id = $_POST['id'];
		$c2 = $this->ct_model->selectcate2byid($ic_id);
		$json = json_encode($c2);
		echo $json;
	}
}