<?php
class IAL_sub_series extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ial/admin/Ial_subseries_model','Ial_subseriesModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['sub_series'] = $this->Ial_subseriesModel->selectAll();
		$this->load->view('ial/admin/sbu_series/subserieslist',$data);
	}
	function addsubseries(){
		$data['id'] = $id = isset($_GET['id']) ? $_GET['id'] : 0;
		$data['sub_series'] = $this->Ial_subseriesModel->selectbyid($id);
		$this->load->view('ial/admin/sbu_series/addsubseries',$data);
	}
	
	function toaddsubseries(){
		
		$id = isset($_POST['id'])?$_POST['id']:0;
		$sub_series = $_POST['sub_series'];
		$arr['sub_series'] = $sub_series;
		if($id>0){
			$res = $this->Ial_subseriesModel->update($id,$arr);
		}else{
			$res = $this->Ial_subseriesModel->insert($arr);
		}
		if($res){
			redirect('Ial_admin/IAL_sub_series');
		}else{
			if($id>0){
				$this->load->view('Ial_admin/IAL_sub_series/addsubseries?id='.$id);
			}else{
				$this->load->view('Ial_admin/IAL_sub_series/addsubseries');
			}
		}
	}
	
	function deletesubseries(){
		$id = $_GET['id'];
		$res = $this->Ial_subseriesModel->delete($id);
		redirect('Ial_admin/IAL_sub_series');
	}
}