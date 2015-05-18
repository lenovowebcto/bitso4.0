<?php
class IAL_DashModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getwillpn_maintenance(){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('-7 day'));
		$arr = $this->db->query("select * from ial_pn_main where request_date<'$today' and request_date>='$sev'and status!='Close'")->result_array();
		return $arr;
	}
	
	function getwilliala_task(){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		$arr =  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close'")->result_array();
		return $arr;
	}

	function getwillial_bpl(){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		$arr = $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close'")->result_array();
		return $arr;
	}
	
	function getpns(){
		return $this->db->get('ial_pn_main')->result_array();
	}
	function getbpls(){
		return $this->db->get('ial_bpl_list')->result_array();
	}
	function gettasks(){
		return $this->db->get('ial_task')->result_array();
	}
	
	function getAlltaskNO(){
		$n1 = $this->db->count_all_results('ial_pn_main');
		$n2 = $this->db->count_all_results('ial_bpl_list');
		$n3 = $this->db->count_all_results('ial_task');

		return $n1 + $n2 +$n3;
	}
	
	function getAllnewtaskNO(){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('-7 day'));
		$n1 =  $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today'")->num_rows();
		$n2 =  $this->db->query("select * from ial_bpl_list where RTM > '$today' and status!='Close'")->num_rows();
		$n3 =  $this->db->query("select * from ial_task where RTM > '$today' and status!='Close' ")->num_rows();
		return $n1 + $n2 +$n3;
	}
	// 快过期的规则是 AD-7 days(ad > today ad-today<=7) & 状态不是final的
	function getAllwilloverduetaskNO(){
		$today = date('Y-m-d',time());
		$sev = date('Y-m-d',strtotime('+7 day'));
		$n1 =  $this->db->query("select * from ial_bpl_list where AD>'$today' and AD<='$sev' and status!='Close'")->num_rows();
		$n2 =  $this->db->query("select * from ial_task where AD>'$today' and AD<='$sev' and status!='Close'")->num_rows();
		$n3 =  $this->db->query("select * from ial_pn_main where close_date>'$today' and close_date<='$sev' and status!='Close'")->num_rows();
		return $n1 + $n2 +$n3;
	}
	
	function getNewpns($dif){
		$today = date('Y-m-d',time());
		//if($dif!='')$this->db->where('');
		$sev = date('Y-m-d',strtotime('-7 day'));
		return $this->db->query("select * from ial_pn_main where status!='Close' and request_date>'$sev' and request_date<'$today'")->result_array();
	}
	function getNewbpls($dif){
		$today = date('Y-m-d',time());
		return  $this->db->query("select * from ial_bpl_list where RTM > '$today'")->result_array();
	}
	function getNewtask($dif){
		$today = date('Y-m-d',time());
		return  $this->db->query("select * from ial_task where RTM > '$today'")->result_array();
	}
	
}