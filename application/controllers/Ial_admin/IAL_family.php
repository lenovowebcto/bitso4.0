<?php
class IAL_family extends CI_Controller{
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/admin/Ial_Family_model','ial_family');
	}
	function index(){
		$data['list'] = $this->ial_family->selectAllFamilys();
		$this->load->view('ial/admin/project/family_list',$data);
	}
	
	function edit(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
	    if($id>0)$data['family'] = $this->ial_family->selectoneByid($id);
        $this->load->view('ial/admin/project/edit_family',$data);
	}
	
	function doedit(){
		$id = isset($_POST['id'])?$_POST['id']:0;
		$Family_Name = $this->input->post('Family_Name');
		$arr['Family_Name'] = $Family_Name;
		if($id>0) $res = $this->ial_family->update_ial_family($arr,$id);
		if($id<=0)$res = $this->ial_family->insert_ial_family($arr);
		if($res){
			redirect('Ial_admin/IAL_family/index');
		}else{
			if($id>0){
				$this->load->view('ial/admin/project/edit_family?id='.$id);
			}else{
				$this->load->view('ial/admin/project/edit_family');
			}
		}
	}
	
	function delete(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		$this->ial_family->delete($id);
		redirect('IAL_admin/IAL_family');
	}
}