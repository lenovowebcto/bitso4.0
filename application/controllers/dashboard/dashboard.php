<?php
class dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('DashModel');
		Auth::execute_auth();
		
	}
	/*  admin 和  user是同 一个方法，只需要判断其type是admin或user
	 *admin 相关的dashboard 
	 */
	function admin_dashboard(){
		
		$user = Auth::getUser();
		$pro = Auth::getpro();
		$data['project'] = $pro;
		
		// will overdue task
		$data['tpg'] = $this->DashModel->getwilltpg();
		$data['optlist'] = $this->DashModel->getwillopt();
		$data['svclist'] = $this->DashModel->getwillsvc();
		$data['comlist'] = $this->DashModel->getwillcom();
		$data['eplist'] = $this->DashModel->getwillep();
		$data['elelist'] = $this->DashModel->getwillele();
		$data['spblist'] = $this->DashModel->getwillspb();
		if($user['type']==1){
			//get all pro`s task count and list
			$data['n1'] = $this->DashModel->getAllByAdmin();//totle
			$data['n2'] = $this->DashModel->getAllnewtask();//new task

			$data['n3'] = $this->DashModel->getAllwilloverduetask();//will overdue task
			$data['n4'] = $this->DashModel->getAlloverduetask();// overdue task
			$this->load->view('dash/admin_dashboard',$data);
		}else{
			
			if(isset($pro) && ($pro=="LOIS TBG/IPG" ||$pro=="LOIS Element")){
				$n1 = $this->DashModel->getcountAllTpg();
				$n2 = $this->DashModel->getcountnewTpg();
				$n3 = $this->DashModel->getcountwillTpg();
				$n4 = $this->DashModel->getcountoverlTpg();
				
				$n5 = $this->DashModel->getcountAllEle();
				$n6 = $this->DashModel->getcountnewEle();
				$n7 = $this->DashModel->getcountwillEle();
				$n8 = $this->DashModel->getcountoverlEle();
				
				$data['n1'] = $n1+$n5;
				$data['n2'] = $n2+$n6;
				$data['n3'] = $n3+$n7;
				$data['n4'] = $n4+$n8;
				
			}elseif(isset($pro) && $pro=="LOIS OPT/SVC"){
				$data['n1'] = $this->DashModel->getcountAllos();
				$data['n2'] = $this->DashModel->getcountnewos();
				$data['n3'] = $this->DashModel->getcountwillos();
				$data['n4'] = $this->DashModel->getcountoverlos();
			}
			
			$this->load->view('dash/user_dashboard',$data);
		}
		
	}
	// task list 和 new task list 和 已经过期的task list 可以是同一个页面
	/* function admin_dash_list(){
		// All task
		$data['dif'] = $_GET['di'];
		$data['com'] = $this->DashModel->getComByAdmin();
		$data['ele'] = $this->DashModel->getEleByAdmin();
		$data['req'] = $this->DashModel->getEp_reqByAdmin();
		$data['opt'] = $this->DashModel->getOptByAdmin();
		$data['spb'] = $this->DashModel->getSpbByAdmin();
		$data['svc'] = $this->DashModel->getSvcByAdmin();
		$data['tic'] = $this->DashModel->getTicketByAdmin();
		$user = Auth::getUser();
		$pro = Auth::getpro();
		$data['project'] = $pro;
		if($user['type']==1){
			$this->load->view('dash/admin_dash_list',$data);
		}else{
			$this->load->view('dash/user_dash_list',$data);
		}
		
	} */
	function admin_dash_list(){
		// All task
		$data['dif'] = $_GET['di'];
		$archive = $_GET['archive'];
		$data['com'] = $this->DashModel->getComByAdmin($archive);
		$data['ele'] = $this->DashModel->getEleByAdmin($archive);
		$data['req'] = $this->DashModel->getEp_reqByAdmin($archive);
		$data['opt'] = $this->DashModel->getOptByAdmin($archive);
		$data['spb'] = $this->DashModel->getSpbByAdmin($archive);
		$data['svc'] = $this->DashModel->getSvcByAdmin($archive);
		$data['tic'] = $this->DashModel->getTicketByAdmin($archive);
		$user = Auth::getUser();
		$pro = Auth::getpro();
		$data['project'] = $pro;
		if($user['type']==1){
			$this->load->view('dash/admin_dash_list',$data);
		}else{
			$this->load->view('dash/user_dash_list',$data);
		}
	
	}
	function new_task_dashboard(){
		$data['dif'] = $_GET['di'];
		$data['com'] = $this->DashModel->getNewComByAdmin();
		$data['ele'] = $this->DashModel->getNewEleByAdmin();
		$data['req'] = $this->DashModel->getNewEp_reqByAdmin();
		$data['opt'] = $this->DashModel->getNewOptByAdmin();
		$data['spb'] = $this->DashModel->getNewSpbByAdmin();
		$data['svc'] = $this->DashModel->getNewSvcByAdmin();
		$data['tic'] = $this->DashModel->getNewTicketByAdmin();
		$user = Auth::getUser();
		$pro = Auth::getpro();
		$data['project'] = $pro;
		if($user['type']==1){
			$this->load->view('dash/admin_dash_list',$data);
		}else{
			$this->load->view('dash/user_dash_list',$data);
		}
		
	}
	
	function task_overdue_dashboard(){
		$data['dif'] = $_GET['di'];
		$data['com'] = $this->DashModel->getOverdueComByAdmin();
		$data['ele'] = $this->DashModel->getOverdueEleByAdmin();
		$data['req'] = $this->DashModel->getOverdueEp_reqByAdmin();
		$data['opt'] = $this->DashModel->getOverdueOptByAdmin();
		$data['spb'] = $this->DashModel->getOverdueSpbByAdmin();
		$data['svc'] = $this->DashModel->getOverdueSvcByAdmin();
		$data['tic'] = $this->DashModel->getOverdueTicketByAdmin();
		
	    $user = Auth::getUser();
	    $pro = Auth::getpro();
	    $data['project'] = $pro;
		if($user['type']==1){
			$this->load->view('dash/admin_dash_list',$data);
		}else{
			$this->load->view('dash/user_dash_list',$data);
		}
	}
}