<?php
class bug extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('BugModel');
	}
	
	function index(){
		$data['bug'] = $this->BugModel->allbugs('New');
		$this->load->view('bug/buglist',$data);
	}
	
	function all(){
		$data['bug'] = $this->BugModel->allbugs('');
		$this->load->view('bug/buglist',$data);
	}
	function addbug(){
		 $data['id'] = $id  = isset($_GET['id'])?$_GET['id']:0;
		 if($id>0){
		 	$data['bug'] = $this->BugModel->selectbugbyid($id);
		    if(is_array($data['bug'])){
			   	$val = $data['bug']['value'];
			   if($val!=""){
			   	$value= json_decode($val);
			   	$data['value'] = implode(PHP_EOL, $value);
			   }
		    }
		 }
		 $this->load->view('bug/addbug',$data);
	}
	
	function toaddbug(){
		$id = isset($_GET['id'])?$_GET['id']:0;
		$bug = $_GET['bug'];
	
		$arr = explode(PHP_EOL,$bug['value']);
		$bug['value'] = json_encode($arr);
		
		if($id>0){
			$bug['last_change'] = date('y-m-d h:i:s',time());
			$res = $this->BugModel->updatebug($id,$bug);
		}else{
			$bug['create_time'] = date('y-m-d h:i:s',time());
			$res = $this->BugModel->addbug($bug);
		}
	
		if($res){
			redirect('bug/index');
		}else{
			if($id>0){
				redirect('bug/addbug?id='.$id);
			}else{
				$this->load->view('bug/addbug');
			}
		}
	}
	function editstatus(){
		$id = $_POST['id'];
		$sta = $_POST['sta'];
		$res = $this->BugModel->updatestatus($id,$sta);
		if($res) echo 'success';
		if(!$res) echo 'error';
	} 
}