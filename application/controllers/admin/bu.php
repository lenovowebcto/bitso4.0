<?php
class bu extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('BuModel');
		Auth::execute_auth();
	}
	
	function index(){
		$data['bu'] = $this->BuModel->selectAllBu();
		$this->load->view('admin/bu/bulist',$data);
	}
	function addbu(){
		$data['bu_id'] = $bu_id = isset($_GET['bu_id'])?$_GET['bu_id']:0;
		$data['bu'] = $this->BuModel->selectbubyid($bu_id);
        $this->load->view('admin/bu/addbu',$data);
	}
	function toaddbu(){
		$bu_name = $_POST['bu_name'];
		$bu_id = isset($_POST['bu_id'])?$_POST['bu_id']:0;
		$arr['bu_name'] = $bu_name;
		if($bu_id>0){
			$res = $this->BuModel->updatetbu($arr,$bu_id);
		}else{
			$res = $this->BuModel->insertbu($arr);
		}
		
		if($res){
			redirect('admin/bu/index');
		}else{
			if($bu_id){
				$this->load->view('admin/bu/addbu?bu_id='.$bu_id);
			}else{
				$this->load->view('admin/bu/addbu');
			}
			
		}
	}
	function deletebu(){
		$bu_id = isset($_GET['bu_id'])?$_GET['bu_id']:0;
		if($bu_id>0){
			$this->BuModel->deletebu($bu_id);
		}
		redirect('admin/bu');
	}
}