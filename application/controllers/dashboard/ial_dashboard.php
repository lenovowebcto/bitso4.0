<?php
class ial_dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ial/IAL_DashModel','ial_dash');
		Auth::execute_auth();
	}
	
	function admin_dashboard(){
		
		$user = Auth::getUser();
		$type=$user['type'];
		if($type==2){
			$uname = $user['username'];
		}else{
			$uname ='';
		}
		// will overdue task
		$data['pns'] = $this->ial_dash->getwillpn_maintenance($uname);
		$data['ts'] = $this->ial_dash->getwilliala_task($uname);
		$data['bpls'] = $this->ial_dash->getwillial_bpl($uname);
		
		$data['n1'] = $this->ial_dash->getAlltaskNO($uname);//all's totle
		
		$data['n2'] = $this->ial_dash->getAllnewtaskNO($uname);//new task
		$data['n3'] = $this->ial_dash->getAllwilloverduetaskNO($uname);//will overdue task
		//count(pn,ial,task) in new
		$data['num1'] = $this->ial_dash->gettasknewtaskNO($uname);
		$data['num2'] = $this->ial_dash->getialnewtaskNO($uname);
		$data['num3'] = $this->ial_dash->getpnnewtaskNO($uname);
		//count(pn,ial,task) in will_overdue
		$data['c1'] = $this->ial_dash->gettaskovertaskNO($uname);
		$data['c2'] = $this->ial_dash->getialovertaskNO($uname);
		$data['c3'] = $this->ial_dash->getpnovertaskNO($uname);
	    if(get_filenames('uploads/dashboard/')!=array()){
			$d = get_filenames('uploads/dashboard/');
			$data['imagename'] = $d[0];
		}else{
			$data['imagename'] = '';
		}
		$this->load->view('dash/ial/ial_admin_dashboard',$data);
	
	}
		
	//all new tasks
	function ial_admin_dash_list(){
		// All task
		$data['dif'] = $_GET['di'];
		$user = Auth::getUser();
		$type=$user['type'];
		if($type==2){
			$uname = $user['username'];
		}else{
			$uname ='';
		}
		$data['pns'] = $this->ial_dash->getpns($uname);
		$data['bpls'] = $this->ial_dash->getbpls($uname);
		$data['ts'] = $this->ial_dash->gettasks($uname);
		
		$this->load->view('dash/ial/ial_admin_dash_list',$data);
		
	}
	function ial_new_task_dashboard(){
		$data['dif'] = $_GET['di'];
		$user = Auth::getUser();
		$type=$user['type'];
		if($type==2){
			$uname = $user['username'];
		}else{
			$uname ='';
		}
		$data['pns'] = $this->ial_dash->getNewpns($uname);
		$data['bpls'] = $this->ial_dash->getNewbpls($uname);
		$data['ts'] = $this->ial_dash->getNewtask($uname);
	   $this->load->view('dash/ial/ial_new_dash_list',$data);
	}
	function one_new_task_dashboard(){
		$data['dif'] = $dif = $_GET['di'];
		$user = Auth::getUser();
		$type=$user['type'];
		if($type==2){
			$uname = $user['username'];
		}else{
			$uname ='';
		}
		//echo $dif;exit;
		if($dif=='pn'){
			$data['pns'] = $this->ial_dash->getNewpns($uname);
		}elseif($dif=='ial'){
			$data['bpls'] = $this->ial_dash->getNewbpls($uname);
		}elseif($dif=='task'){
			$data['ts'] = $this->ial_dash->getNewtask($uname);
		}
		$this->load->view('dash/ial/one_dash',$data);
	}
	function one_willover_dashboard(){
		$data['dif'] = $dif = $_GET['o'];
		$user = Auth::getUser();
		$type=$user['type'];
		if($type==2){
			$uname = $user['username'];
		}else{
			$uname ='';
		}
		//echo $dif;exit;
		if($dif=='pn'){
			$data['pns'] = $this->ial_dash->getpnovertasks($uname);
		}elseif($dif=='ial'){
			$data['bpls'] = $this->ial_dash->getialovertasks($uname);
		}elseif($dif=='task'){
			$data['ts'] = $this->ial_dash->gettaskovertasks($uname);
		}
		$this->load->view('dash/ial/willover_dash',$data);
		
	}
}