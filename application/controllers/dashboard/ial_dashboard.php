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
		$data['rls'] = $this->ial_dash->getwillial_relay();
		$data['bpls'] = $this->ial_dash->getwillial_bpl();
		
		$data['n1'] = $this->ial_dash->getAlltaskNO();//totle
		$data['n2'] = $this->ial_dash->getAllnewtaskNO();//new task
		$data['n3'] = $this->ial_dash->getAllwilloverduetaskNO();//will overdue task
		$data['n4'] = $this->ial_dash->getAlloverduetaskNO();// overdue task
		$this->load->view('dash/admin_dashboard',$data);
	
	}
		
	//all new tasks
	function ial_admin_dash_list(){
		// All task
		$data['dif'] = $_GET['di'];
		
		$data['pns'] = $this->ial_dash->getpns();
		$data['bpls'] = $this->ial_dash->getbpls();
		$data['ts'] = $this->ial_dash->gettasks();
		$data['rls'] = $this->ial_dash->getrelays();
		
		$this->load->view('dash/ial/ial_admin_dash_list',$data);
		
	}
	function new_task_dashboard(){
		$data['dif'] = $_GET['di'];
		$data['com'] = $this->ial_dash->getNewComByAdmin();
		$data['ele'] = $this->ial_dash->getNewEleByAdmin();
		$data['req'] = $this->ial_dash->getNewEp_reqByAdmin();
		$data['opt'] = $this->ial_dash->getNewOptByAdmin();
		
		$this->load->view('dash/admin_dash_list',$data);
	}
	
	function task_overdue_dashboard(){
		$data['dif'] = $_GET['di'];
		$data['com'] = $this->ial_dash->getOverdueComByAdmin();
		$data['ele'] = $this->ial_dash->getOverdueEleByAdmin();
		$data['req'] = $this->ial_dash->getOverdueEp_reqByAdmin();
		$data['opt'] = $this->ial_dash->getOverdueOptByAdmin();
		
		$this->load->view('dash/admin_dash_list',$data);
	}
}