<?php
class IAL_DashModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getwillpn_maintenance(){
		
	}
	
	function getwilliala_task(){
		
	}
	
	function getwillial_relay(){
		
	}
	
	function getwillial_bpl(){
		
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
	function getrelays(){
		return $this->db->get('ial_relayware')->result_array();
	}
	
	function getAlltaskNO(){
		$n1 = $this->db->get('ial_pn_main')->count_all_results();
		$n2 = $this->db->get('ial_bpl_list')->count_all_results();
		$n3 = $this->db->get('ial_task')->count_all_results();
		$n4 = $this->db->get('ial_relayware')->count_all_results();
		return $n1 + $n2 +$n3+$n4;
	}
	
	function getAllnewtaskNO(){
		
	}
	
	function getAllwilloverduetaskNO(){
		
	}
	function getAlloverduetaskNO(){
		
	}
	
}