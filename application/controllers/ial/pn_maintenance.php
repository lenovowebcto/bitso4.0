<?php
class pn_maintenance extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/Pn_model','pn');
		$this->load->model('ial/IAL_common_model','icm');
	}
	
	function index(){
		
		$data['list'] = $this->pn->selectAllpns();
		$this->load->view('ial/pn/pn_list',$data);
	}
	
	function edit(){
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		$data['w'] = 'www';
		if($id>0)$data['pn'] = $this->pn->selectbyid($id);
		if($id>0){
			$pen = $data['pen'] = $this->icm->selectAllIalPen($id,'pn');
			$data['hist'] = $this->icm->selectAllIALhistory($id,'pn');
			$c1id = $this->icm->selectbyid($id,'pn');
			
			if($c1id!=array()){
				foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->icm->selectc2byc1id($ca1_id);
					$data['c'][] = $this->icm->selectc2byc1id($ca1_id);
				}
			}
		}
		
	    $data['category1'] = $this->icm->ialcommoncategory();
		$data['category2'] = $this->icm->ialcommoncategory2($data['category1'][0]['id']); 
		$data['status'] = $this->icm->get_ial_status(); 
		$data['team'] = $this->icm->select_ial_team();
		$this->load->view('ial/pn/pn_edit',$data);
	}
	
	function toedit(){
		$id = $_POST['id'];
		$pn = $_POST['pn'];
		$user = Auth::getUser();
		$pending = isset($_POST['pending'])?$_POST['pending']:'';
		$sta  = isset($_POST['sta'])?$_POST['sta']:'';
		$c1  = isset($_POST['c1'])?$_POST['c1']:'';
		$c2  = isset($_POST['c2'])?$_POST['c2']:''; 
		$ial_decide = 'pn';
		if($id>0){
			$num = $this->icm->selectAllIalPen($id,$ial_decide);
			$res = $this->pn->editpnmaintenance($id,$pn,$pending,$sta,$c1,$c2,$user,$ial_decide,count($num));
		}else{
			$res = $this->pn->insertpnmaintenance($pn,$pending,$sta,$c1,$c2,$user,$ial_decide);
		}
		
		if($res){
			redirect('ial/pn_maintenance');
		}else{
			if($id>0){
				$this->load->view('ial/pn/pn_edit?id='.$id);
			}else{
				$this->load->view('ial/pn/pn_edit');
			}
			
		}
	}
}