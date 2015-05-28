<?php
class IAL_warranty extends CI_Controller{
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/admin/Ial_warranty_model','ial_warranty');
	}
	
	function index(){
		$data['list'] = $this->ial_warranty->selectAllwarranty();
		$this->load->view('ial/admin/warranty/warranty_list',$data);
	}
	
	function edit(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
	    if($id>0)$data['warranty'] = $this->ial_warranty->selectoneByid($id);
        $this->load->view('ial/admin/warranty/edit_warranty',$data);
	}
	function doedit(){
		$id = isset($_POST['id'])?$_POST['id']:0;
		$warranty_type = $this->input->post('warranty_type');
		$arr['warranty_type'] = $warranty_type;
		if($id>0) $res = $this->ial_warranty->update_ial_warranty($arr,$id);
		if($id<=0)$res = $this->ial_warranty->insert_ial_warranty($arr);
		if($res){
			redirect('Ial_admin/IAL_warranty/index');
		}else{
			if($id>0){
				$this->load->view('ial/admin/warranty/edit_warranty?id='.$id);
			}else{
				$this->load->view('ial/admin/warranty/edit_warranty');
			}
		}
	}
	
	function delete(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		$this->ial_warranty->delete($id);
		redirect('IAL_admin/IAL_warranty');
	}
}