<?php
class ial_dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ial/IAL_DashModel','ial_dash');
		Auth::execute_auth();
		
	}
	
	function admin_dashboard(){
		
		$user = Auth::getUser();
		// will overdue task
		$data['pns'] = $this->ial_dash->getwillpn_maintenance();
		$data['ts'] = $this->ial_dash->getwilliala_task();
		$data['bpls'] = $this->ial_dash->getwillial_bpl();
		
		$data['n1'] = $this->ial_dash->getAlltaskNO();//all's totle
		$data['n2'] = $this->ial_dash->getAllnewtaskNO();//new task
		$data['n3'] = $this->ial_dash->getAllwilloverduetaskNO();//will overdue task
		//$data['n4'] = $this->ial_dash->getAlloverduetaskNO();// overdue task
		$this->load->view('dash/ial/ial_admin_dashboard',$data);
	
	}
		
	//all new tasks
	function ial_admin_dash_list(){
		// All task
		$data['dif'] = $_GET['di'];
		
		$data['pns'] = $this->ial_dash->getpns();
		$data['bpls'] = $this->ial_dash->getbpls();
		$data['ts'] = $this->ial_dash->gettasks();
		
		$this->load->view('dash/ial/ial_admin_dash_list',$data);
		
	}
	function ial_new_task_dashboard(){
		$data['dif'] = $_GET['di'];
		if($data['dif']=='new'){
			$dif = '';
			$data['pns'] = $this->ial_dash->getNewpns($dif);
			$data['bpls'] = $this->ial_dash->getNewbpls($dif);
			$data['ts'] = $this->ial_dash->getNewtask($dif);
		}elseif($data['dif']=='open'){
			$dif = 'close';
			$data['pns'] = $this->ial_dash->getNewpns($dif);
			$data['bpls'] = $this->ial_dash->getNewbpls($dif);
			$data['ts'] = $this->ial_dash->getNewtask($dif);
		}
	   $this->load->view('dash/ial/ial_new_dash_list',$data);
	}
	
}