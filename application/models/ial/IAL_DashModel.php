<?php
class IAL_DashModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getwillpn_maintenance($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('-7 day'));
		if($uname ==''){
			$arr = $this->db->query("select * from ial_pn_main where request_date<'$today' and request_date>='$sev'and status!='Close'")->result_array();
		}else{
			$arr = $this->db->query("select * from ial_pn_main where request_date<'$today' and request_date>='$sev'and status!='Close' and User='$uname'")->result_array();
		}
		return $arr;
	}
	
	function getwilliala_task($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		if($uname==''){
			$arr =  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close'")->result_array();
		}else{
			$arr =  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close' and User='$uname'")->result_array();
		}
		return $arr;
	}

	function getwillial_bpl($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		if($uname==''){
			$arr = $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close'")->result_array();
		}else{
			$arr = $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close' and User='$uname'")->result_array();
		}
		return $arr;
	}
	
	function getpns($uname){
		if($uname!='')$this->db->where('User',$uname);
		return $this->db->get('ial_pn_main')->result_array();
	}
	function getbpls($uname){
		if($uname!='')$this->db->where('User',$uname);
		return $this->db->get('ial_bpl_list')->result_array();
	}
	function gettasks($uname){
		if($uname!='')$this->db->where('User',$uname);
		return $this->db->get('ial_task')->result_array();
	}
	
	function getAlltaskNO($uname){
		if($uname!= '')$this->db->where('User',$uname);
		$n1 = $this->db->count_all_results('ial_pn_main');
		if($uname!= '')$this->db->where('User',$uname);
		$n2 = $this->db->count_all_results('ial_bpl_list');
		if($uname!= '')$this->db->where('User',$uname);
		$n3 = $this->db->count_all_results('ial_task');

		return $n1 + $n2 +$n3;
	}
	
	function getAllnewtaskNO($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('-7 day'));
		if($uname==''){
			$n1 =  $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today'")->num_rows();
			$n2 =  $this->db->query("select * from ial_bpl_list where RTM > '$today' and status!='Close'")->num_rows();
			$n3 =  $this->db->query("select * from ial_task where RTM > '$today' and status!='Close' ")->num_rows();
			
		}else{
			$n1 =  $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today' and User='$uname'")->num_rows();
			$n2 =  $this->db->query("select * from ial_bpl_list where RTM > '$today' and status!='Close' and User='$uname'")->num_rows();
			$n3 =  $this->db->query("select * from ial_task where RTM > '$today' and status!='Close' and User='$uname'")->num_rows();
			
		}
		return $n1 + $n2 +$n3;
	}
	// 快过期的规则是 AD-7 days(ad > today ad-today<=7) & 状态不是final的
	function getAllwilloverduetaskNO($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		if($uname==''){
			$n1 =  $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close'")->num_rows();
			$n2 =  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close'")->num_rows();
			$n3 =  $this->db->query("select * from ial_pn_main where close_date>'$today' and close_date<='$sev' and status!='Close'")->num_rows();
			
		}else{
			$n1 =  $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close' and User='$uname'")->num_rows();
			$n2 =  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close' and User='$uname'")->num_rows();
			$n3 =  $this->db->query("select * from ial_pn_main where close_date>'$today' and close_date<='$sev' and status!='Close' and User='$uname'")->num_rows();
			
		}
		return $n1 + $n2 +$n3;
	}
	
	function getNewpns($uname){
		$today = date('Y-m-d',time());
		
		$sev = date('Y-m-d',strtotime('-7 day'));
		if($uname==''){
			return $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today'")->result_array();
		}else{
			return $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today' and User='$uname'")->result_array();
		}
	}
	function getNewbpls($uname){
		$today = date('Y-m-d',time());
		if($uname==''){
			return  $this->db->query("select * from ial_bpl_list where RTM > '$today' and status!='Close'")->result_array();
		}else{
			return  $this->db->query("select * from ial_bpl_list where RTM > '$today' and status!='Close' and user='$uname'")->result_array();
		}
	}
	function getNewtask($uname){
		$today = date('Y-m-d',time());
		if($uname==''){
			return  $this->db->query("select * from ial_task where RTM > '$today' and status!='Close'")->result_array();
		}else{
			return  $this->db->query("select * from ial_task where RTM > '$today' and status!='Close' and User='$uname'")->result_array();
		}
	 }
	function gettasknewtaskNO($uname){
		$today = date('Y-m-d',time());
		if($uname==''){
			$n3 =  $this->db->query("select * from ial_task where RTM > '$today' and status!='Close'")->num_rows();
		}else{
			$n3 =  $this->db->query("select * from ial_task where RTM > '$today' and status!='Close' and User='$uname'")->num_rows();
		}
		return $n3;
	}
	function getpnnewtaskNO($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('-7 day'));
		if($uname==''){
			$n1 =  $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today'")->num_rows();
		}else{
			$n1 =  $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today' and User='$uname' ")->num_rows();
		}
		return $n1;
	}
	function getialnewtaskNO($uname){
		$today = date('Y-m-d',time());
		if($uname==''){
			$n2 =  $this->db->query("select * from ial_bpl_list where RTM > '$today' and status!='Close'")->num_rows();
		}else{
			$n2 =  $this->db->query("select * from ial_bpl_list where RTM > '$today' and status!='Close' and User='$uname'")->num_rows();
		}
		return $n2;
	}
	
	 function gettaskovertasks($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		return  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close'")->result_array();
	}
	function getialovertasks($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		return $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close'")->result_array();
	}
	function getpnovertasks($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		return $this->db->query("select * from ial_pn_main where close_date>'$today' and close_date<='$sev' and status!='Close'")->result_array();
	} 
	function gettaskovertaskNO($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		return  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close'")->num_rows();
	}
	function getialovertaskNO($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		return $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close'")->num_rows();
	}
	function getpnovertaskNO($uname){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		return $this->db->query("select * from ial_pn_main where close_date>'$today' and close_date<='$sev' and status!='Close'")->num_rows();
	}
}