<?php
class IAL_team extends CI_Controller{
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/admin/Ial_team_model','ial_team');
	}
	
	function index(){
		$data['list'] = $this->ial_team->selectAllteam();
		$this->load->view('ial/admin/team/team_list',$data);
	}
	
	function edit(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0)$data['team'] = $this->ial_team->selectoneByid($id);
		$this->load->view('ial/admin/team/edit_team',$data);
	}
	function doedit(){
		$id = isset($_POST['id'])?$_POST['id']:0;
		$ial_team = $this->input->post('team');
		$arr['team'] = $ial_team;
		if($id>0) $res = $this->ial_team->update_ial_team($arr,$id);
		if($id<=0)$res = $this->ial_team->insert_ial_team($arr);
		if($res){
			redirect('Ial_admin/IAL_team/index');
		}else{
			if($id>0){
				$this->load->view('ial/admin/team/edit_team?id='.$id);
			}else{
				$this->load->view('ial/admin/team/edit_team');
			}
		}
	}
	function delete(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		$res = $this->ial_team->delete($id);
		if($res)redirect('IAL_admin/IAL_team/index');
	}
}