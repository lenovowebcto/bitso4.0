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
			$uname = $user['username'];
			if(isset($pro) && ($pro=="LOIS TBG/IPG" ||$pro=="LOIS Element")){
				$n1 = $this->DashModel->getcountAllTpg($uname);
				$n2 = $this->DashModel->getcountnewTpg($uname);
				$n3 = $this->DashModel->getcountwillTpg($uname);
				$n4 = $this->DashModel->getcountoverlTpg($uname);
				
				$n5 = $this->DashModel->getcountAllEle();
				$n6 = $this->DashModel->getcountnewEle();
				$n7 = $this->DashModel->getcountwillEle();
				$n8 = $this->DashModel->getcountoverlEle();
				
				$data['n1'] = $n1+$n5;
				$data['n2'] = $n2+$n6;
				$data['n3'] = $n3+$n7;
				$data['n4'] = $n4+$n8;
				
			}elseif(isset($pro) && $pro=="LOIS OPT/SVC"){
				$data['n1'] = $this->DashModel->getcountAllos($uname);
				$data['n2'] = $this->DashModel->getcountnewos($uname);
				$data['n3'] = $this->DashModel->getcountwillos($uname);
				$data['n4'] = $this->DashModel->getcountoverlos($uname);
			}
			
			$this->load->view('dash/user_dashboard',$data);
		}
		
	}
	
	function admin_dash_list(){
		// All task
		$user = Auth::getUser();
		if($user['type']==1){$username = '';}else{$username = $user['username'];}
		
		$data['dif'] = $_GET['di'];
		$archive = $_GET['archive'];
		$data['com'] = $this->DashModel->getComByAdmin($archive,$username);
		$data['ele'] = $this->DashModel->getEleByAdmin($archive,$username);
		$data['req'] = $this->DashModel->getEp_reqByAdmin($archive,$username);
		$data['opt'] = $this->DashModel->getOptByAdmin($archive,$username);
		$data['spb'] = $this->DashModel->getSpbByAdmin($archive,$username);
		$data['svc'] = $this->DashModel->getSvcByAdmin($archive,$username);
		$data['tic'] = $this->DashModel->getTicketByAdmin($archive,$username);
		
		$pro = Auth::getpro();
		$data['project'] = $pro;
		if($user['type']==1){
			$this->load->view('dash/admin_dash_list',$data);
		}else{
			$this->load->view('dash/user_dash_list',$data);
		}
	
	}
	function new_task_dashboard(){
	    $user = Auth::getUser();
		if($user['type']==1){$username = '';}else{$username = $user['username'];}
		$data['dif'] = $_GET['di'];
		$data['com'] = $this->DashModel->getNewComByAdmin($username);
		$data['ele'] = $this->DashModel->getNewEleByAdmin($username);
		$data['req'] = $this->DashModel->getNewEp_reqByAdmin($username);
		$data['opt'] = $this->DashModel->getNewOptByAdmin($username);
		$data['spb'] = $this->DashModel->getNewSpbByAdmin($username);
		$data['svc'] = $this->DashModel->getNewSvcByAdmin($username);
		$data['tic'] = $this->DashModel->getNewTicketByAdmin($username);
		
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
		$user = Auth::getUser();
		if($user['type']==1){$username = '';}else{$username = $user['username'];}
		$data['com'] = $this->DashModel->getOverdueComByAdmin($username);
		$data['ele'] = $this->DashModel->getOverdueEleByAdmin();
		$data['req'] = $this->DashModel->getOverdueEp_reqByAdmin($username);
		$data['opt'] = $this->DashModel->getOverdueOptByAdmin($username);
		$data['spb'] = $this->DashModel->getOverdueSpbByAdmin($username);
		$data['svc'] = $this->DashModel->getOverdueSvcByAdmin($username);
		$data['tic'] = $this->DashModel->getOverdueTicketByAdmin($username);
		
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