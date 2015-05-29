<?php
class New_relation  extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/admin/RelationModel','RelationModel');
	}
	
    function index(){
		$data['brand'] = $this->RelationModel->selectAllBrand();
		$this->load->view('ial/admin/relation/brandlist',$data);
	}
	function addbrand(){
	    $data['bid'] = $bid = isset($_GET['bid'])?$_GET['bid']:0;
	    $data['brand'] = $this->RelationModel->selectoneByid($bid);
        $this->load->view('ial/admin/relation/addbrand',$data);
	}
	function toaddbrand(){
		$bid = isset($_POST['bid'])?$_POST['bid']:0;
		$bname = $_POST['bname'];
		$arr['bname'] = $bname;
		if($bid>0){
			$res = $this->RelationModel->updatebrand($bid,$arr);
		}else{
			$res = $this->RelationModel->insertbrand($arr);
		}
		if($res){
			redirect('Ial_admin/New_relation/index');
		}else{
			if($bid>0){
				$this->load->view('ial/admin/relation/addbrand?bid='.$bid);
			}else{
				$this->load->view('ial/admin/relation/addbrand');
			}
		}
	}
	
	function delbrand(){
		$data['bid'] = $bid = isset($_GET['bid'])?$_GET['bid']:0;
		$this->RelationModel->deletebrand($bid);
		redirect('Ial_admin/New_relation/index');
	}
	//family
	function familylist(){
		$data['bid'] = $bid = isset($_GET['bid'])?$_GET['bid']:0;
		$data['list'] = $this->RelationModel->selectrelationfamily($bid);
		$this->load->view('ial/admin/relation/relation_family',$data);
	}
	function editrelationfam(){
		$data['bid'] = $bid = $_GET['bid'];
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0)$data['family'] = $this->RelationModel->selectrelationoneByid($id);
		$this->load->view('ial/admin/relation/edit_family',$data);
	}
	function doeditrelationfam(){
		$bid = isset($_POST['bid'])?$_POST['bid']:0;
		$id = isset($_POST['id'])?$_POST['id']:0;
		$Family_Name = $this->input->post('Family_Name');
		$arr['Family_Name'] = $Family_Name;
		
		if($id>0){
			$res = $this->RelationModel->update_ial_family($arr,$id);
		}
		if($id<=0){
			$arr['bid'] = $bid;
			$res = $this->RelationModel->insert_ial_family($arr);
		}
		if($res){
			redirect('Ial_admin/New_relation/familylist?bid='.$bid);
		}else{
			if($id>0){
				$this->load->view('ial/admin/relation/edit_family?id='.$id.'&bid='.$bid);
			}else{
				$this->load->view('ial/admin/relation/edit_family?bid='.$bid);
			}
		}
	}
	function deleterelationfam(){
		$id = $_GET['id'];
		$bid = $_GET['bid'];
		$res = $this->RelationModel->deletepro($id);
		if($res)redirect('Ial_admin/New_relation/familylist?bid='.$bid);
	}
	//
	function subserlist(){
		$data['f_id'] = $f_id = $_GET['f_id'];
		$data['sub_series'] = $this->RelationModel->selectAll($f_id);
		$this->load->view('ial/admin/relation/subserieslist',$data);
	}
	function addsubseries(){
		$data['id'] = $id = isset($_GET['id']) ? $_GET['id'] : 0;
		$data['f_id'] = $f_id = isset($_GET['f_id']) ? $_GET['f_id'] : 0;
		
		$data['sub_series'] = $this->RelationModel->selectbyid($id);
		$this->load->view('ial/admin/relation/addsubseries',$data);
	}
	
	function toaddsubseries(){
		$f_id = isset($_POST['f_id'])?$_POST['f_id']:0;
		$id = isset($_POST['id'])?$_POST['id']:0;
		$sub_series = $_POST['sub_series'];
		$arr['sub_series'] = $sub_series;
		if($id>0){
			$res = $this->RelationModel->update($id,$arr);
		}else{
			$arr['f_id'] = $f_id;
			$res = $this->RelationModel->insert($arr);
		}
		if($res){
			redirect('Ial_admin/New_relation/subserlist?f_id='.$f_id);
		}else{
			if($id>0){
				$this->load->view('ial/admin/relation/addsubseries?id='.$id.'&f_id='.$f_id);
			}else{
				$this->load->view('ial/admin/relation/addsubseries');
			}
		}
	}
	
	function deletesubseries(){
		$id = $_GET['id'];
		$f_id = $_GET['f_id'];
		$res = $this->RelationModel->delete($id);
		if($res)redirect('Ial_admin/New_relation/subserlist?f_id='.$f_id);
	}
}