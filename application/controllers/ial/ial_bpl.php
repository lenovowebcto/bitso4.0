<?php
class ial_bpl extends CI_Controller{
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/Ial_bpl_model','ial_bpl');
		$this->load->model('ial/IAL_common_model','icm');
	}
	
	function index(){
		$user = Auth::getUser();
		if($user['type']==2){
			$data['list'] = $this->ial_bpl->selectAlllist($user['username']);
		}elseif($user['type']==1){
			$data['list'] = $this->ial_bpl->selectAlllist('');
		}
		
		$this->load->view('ial/ial_bpl/ial_bpl_list',$data);
	}
	
	function edit(){
		$user = Auth::getUser();
		$group = $user['group'];
		$data['username'] = $user['username'];
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		if($id>0){
			$data['ial'] = $this->ial_bpl->selectbyid($id);
			$data['username'] = $data['ial']['User'];
		}
		$data['user'] = $this->icm->selectuserbynow($group);
		
		//common
		$data['w'] = 'www';
		if($id>0){
			$pen = $data['pen'] = $this->icm->selectAllIalPen($id,'ial');
			$data['hist'] = $this->icm->selectAllIALhistory($id,'ial');
			$c1id = $this->icm->selectbyid($id,'ial');
			
			if($c1id!=array()){
				foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->icm->selectc2byc1id($ca1_id);
					$data['c'][] = $this->icm->selectc2byc1id($ca1_id);
				}
			}
		}
		
	    $data['category1'] = $this->icm->ialcommoncategory();
	    if($data['category1']!=array())
		$data['category2'] = $this->icm->ialcommoncategory2($data['category1'][0]['id']); 
		$data['status'] = $this->icm->get_ial_status(); 
		$data['type'] = $this->icm->select_ial_type();
		$data['brand'] = $this->icm->select_ial_brand('');
		$data['warranty'] = $this->icm->select_ial_warranty();
		
		$this->load->view('ial/ial_bpl/add_ial_bpl',$data);
	}
	
	function doedit(){
		$id = isset($_POST['id'])?$_POST['id']:0;
		$ial = $_POST['ial'];
		$user = Auth::getUser();
		$pending = isset($_POST['pending'])?$_POST['pending']:'';
		$sta  = isset($_POST['sta'])?$_POST['sta']:'';
		$c1  = isset($_POST['c1'])?$_POST['c1']:'';
		$c2  = isset($_POST['c2'])?$_POST['c2']:'';
		$ial_decide = 'ial';
		if($id>0){
			$num = $this->icm->selectAllIalPen($id,$ial_decide);
			$res = $this->ial_bpl->updateial_bpl($ial,$id,$user,$pending,$sta,$c1,$c2,$ial_decide,count($num));
		}else{
			$res = $this->ial_bpl->insertial_bpl($ial,$user,$pending,$sta,$c1,$c2,$ial_decide);
		}
		
		if($res){
			redirect('ial/ial_bpl/index');
		}else{
			if($id>0){
				$this->load->view('ial/ial_bpl/add_ial_bpl?id='.$id);
			}else{
				$this->load->view('ial/ial_bpl/add_ial_bpl');
			}
		}
	}
	function time(){
		$eow = $_POST['eow'];
		$ad = $_POST['ad'];
		
		if(strlen($eow)>0){
		   $rtm = date('Y-m-d', strtotime($eow. '-7 day'));
		}else if(strlen($eow)==0 && strlen($ad)>0){
		   $rtm = date('Y-m-d', strtotime($ad. '-7 day'));
		}
		echo $rtm;
	}
}