<?php
class IAL_type extends CI_Controller{
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/admin/Ial_type_model','ial_type');
	}
	
	function index(){
		$data['list'] = $this->ial_type->selectAlltype();
		$this->load->view('ial/admin/type/type_list',$data);
	}
	
	function edit(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0)$data['type'] = $this->ial_type->selectoneByid($id);
		$this->load->view('ial/admin/type/edit_type',$data);
	}
	function doedit(){
		$id = isset($_POST['id'])?$_POST['id']:0;
		$type = $this->input->post('ial_type');
		$arr['ial_type'] = $type;
		if($id>0) $res = $this->ial_type->update_ial_type($arr,$id);
		if($id<=0)$res = $this->ial_type->insert_ial_type($arr);
		if($res){
			redirect('Ial_admin/IAL_type/index');
		}else{
			if($id>0){
				$this->load->view('ial/admin/type/edit_type?id='.$id);
			}else{
				$this->load->view('ial/admin/type/edit_type');
			}
		}
	}
	function delete(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		$res = $this->ial_type->delete($id);
		if($res)redirect('IAL_admin/IAL_type');
	}
}