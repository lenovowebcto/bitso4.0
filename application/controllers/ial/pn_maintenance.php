<?php
class pn_maintenance extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		Auth::execute_auth();
		$this->load->model('ial/Pn_model','pn');
		$this->load->model('ial/IAL_common_model','icm');
	}
	
	function index(){
		$user = Auth::getUser();
		if($user['type']==2){
			$data['list'] = $this->pn->selectAllpns($user['username']);
		}elseif($user['type']==1){
			$data['list'] = $this->pn->selectAllpns('');
		}
		
		$this->load->view('ial/pn/pn_list',$data);
	}
	
	function edit(){
		$user = Auth::getUser();
		$group = $user['group'];
		$data['username'] = $user['username'];
		$data['id'] = $id = isset($_GET['id'])?$_GET['id']:0;
		$data['w'] = 'www';
		if($id>0){
			$data['pn'] = $this->pn->selectbyid($id);
			$data['username'] = $data['pn']['User'];
		}
		$data['user'] = $this->icm->selectuserbynow($group);
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
			$data['tt'] = $this->icm->selectatta($id);
			if($data['tt']!=array() && $data['tt']['file_path']!=''){
				$data['atta'] = $data['tt']['file_path'];
				$arr =  $data['atta'];
				$data['atta'] = explode(',',$arr);
			}
		}
		
	    $data['category1'] = $this->icm->ialcommoncategory();
	    if($data['category1']!=array())
		$data['category2'] = $this->icm->ialcommoncategory2($data['category1'][0]['id']);
        $data['status'] = $this->icm->get_ial_status();
        $data['summary'] = $this->icm->selectAllSummary();
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
		$file_path = $_FILES['file_path']['name'];
	    
		if($id>0){
			$atta = $this->icm->selectatta($id);
			if($file_path!=''){
				$fal = $this->_toupload();
				if($fal && $atta['file_path']!=''){
					$pn['file_path'] = $atta['file_path'].','.$file_path;
				}elseif($fal  && $atta['file_path'] ==''){
					$pn['file_path'] = $file_path ;
				}elseif(!$fal  && $atta['file_path'] !=''){
					$pn['file_path'] = $atta['file_path'];
				}elseif(!$fal  && $atta['file_path'] ==''){
					$pn['file_path'] = '';
				}
			}else{
				$mgt['attachment'] = isset($atta['attachment'])?$atta['attachment']:'';
			}
			$num = $this->icm->selectAllIalPen($id,$ial_decide);
			$res = $this->pn->editpnmaintenance($id,$pn,$pending,$sta,$c1,$c2,$user,$ial_decide,count($num));
		}else{
			if($file_path!=''){
				$fal = $this->_toupload();
				if($fal)$pn['file_path'] = $file_path ;
			}else{
				$pn['file_path'] = '' ;
			}
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
	private function  _toupload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$this->upload->initialize($config);
	
		return $this->upload->do_upload('file_path');
	}
	public function down_load(){
		$this->load->helper('download');
		$fname = $_GET['fname'];
		$url = preg_replace("/\s+/", "_","./uploads/".$fname);
		$data = file_get_contents($url);
		force_download($fname, $data);
	}
	
	public function update(){
		$key = $_POST['name'];
		$id = $_POST['id'];
		$atta = $this->icm->selectatta($id);
		$arr = $atta['file_path'];
		$atta = explode(',',$arr);
		$new_att =array();
		foreach($atta as $value){
			if($key != $value){
				array_push($new_att,$value);
			}
		}
		$new_att = implode(',', $new_att);
		$res = $this->icm->update($id,$new_att);
		if($res){
			echo 'success';
		}else{
			echo 'false';
		}
	}
}