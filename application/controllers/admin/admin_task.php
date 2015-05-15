<?php
class admin_task extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('AdmintaskModel');
		$this->load->helper(array('form', 'url'));
		Auth::execute_auth();
	}

	function index(){
    $data['list'] = $this->AdmintaskModel->selectAllAtask();
    $this->load->view('admin/task/admintisklist',$data);
}
	function add_admintask(){
		$this->config->load('keyword');
		$data['t_id'] = $tid = isset($_GET['t_id'])?$_GET['t_id']:0;
		$data['task'] = $this->AdmintaskModel->selectonebyid($tid);
		if($data['task']==array())$data['fp'] = array();
		if($data['task']!=array())$data['fp'] = json_decode($data['task']['file_path']);
		$data['source']    = $this->config->item('source');
		$data['geo']       = $this->config->item('geo');
		$data['family']    = $this->config->item('family');
		$data['dataarea']  = $this->config->item('dataarea');
		$data['severity']  = $this->config->item('severity');
		$data['ProdState'] = $this->config->item('ProdState');
		$data['users'] = $this->AdmintaskModel->selectuserlist();
		/* $user = Auth::getuser();
		if($user['type'] ==1)$this->load->view('admin/task/addadmintask',$data);
		if($user['type'] ==2)$this->load->view('admin/task/user_task',$data); */
		$this->load->view('admin/task/addadmintask',$data);

	}

	function toadd_admintask(){
		$tid = isset($_POST['Ticket_id'])?$_POST['Ticket_id']:0;
		$ad = $_POST['ad'];
		$ad['file_path'] = $file  =$_FILES['file_path']['name'];
		if($tid>0){
		    $fn = isset($_POST['fn'])?$_POST['fn']:array();
			if($file!=""){
				$ad['file_path'] = $file;
				$fal = $this->_toupload();
				if($fn !=array()){
					array_push($fn,$file);
					$ad['file_path'] = json_encode($fn);
				}else{
					$ad['file_path'] = json_encode(array($file));
				}
			}else{
				$fal = true;
				if($fn !=array())$ad['file_path'] = json_encode($fn);
				if($fn ==array()) $ad['file_path'] = $file;
			}
			 if($fal){
			   $res = $this->AdmintaskModel->updateadmintask($tid,$ad);
			 }
			 
		}else{
			if($file!=""){
				$fal = $this->_toupload();
			if($fal){
				 $arr = array($file);
				 $ad['file_path'] = json_encode($arr);
				}
			}else{
				 $ad['file_path'] = $file;
			}
			$ad['prob_state'] = 'open';
			$ad['dist'] = 1;
			$res = $this->AdmintaskModel->insertadmintask($ad);
		}
		if($res){
			/* if($tid>0){
				redirect('admin/admin_task/showtask');
			}else{
				redirect('admin/admin_task/index');
			} */
			redirect('admin/admin_task/index');
		}else{
			if($tid>0){
				$this->load->view('admin/task/addadmintask?Ticket_id='.$tid);
			}else{
				$this->load->view('admin/task/addadmintask');
			}
		}
	}
	
	private function  _toupload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|txt';
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
	//user login  ---->  admin_task list
	function showtask(){
		$user = Auth::getuser();
		//current user's admin_task
		if($user['type'] ==1){
			$data['list'] = Auth::getTask();
		}elseif($user['type'] ==2){
			$data['list'] = $this->AdmintaskModel->user_admintask($user['username']);
		}
		$this->load->view('admin/user_admin_task',$data);
		
	}
	function user_opentask(){
		$Ticket_id = $_GET['Ticket_id'];
		if(is_string($Ticket_id) && $Ticket_id=="all"){
			$at = $_GET['AssignTo'];
			$fal = $this->AdmintaskModel->readallrask($at);//after read change dist to 0
			redirect('admin/admin_task/showtask');
		}elseif(is_numeric($Ticket_id)){
			$fal = $this->AdmintaskModel->readonerask($Ticket_id);
			redirect('admin/admin_task/add_admintask?t_id='.$Ticket_id);
		}
		
	}
	
	function toupdate_taskstate(){
		$prob_state = $_POST['prob_state'];
		$Ticket_id = $_POST['Ticket_id'];
		$res = $this->AdmintaskModel->update_prostate($Ticket_id,$prob_state);
		if($res){
			redirect('admin/admin_task/showtask');
		}else{
			redirect('admin/admin_task/add_admintask?t_id='.$Ticket_id);
		}
	}
}