<?php
class Ial_status_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function selectAllStatus(){
		$res = $this->db->get('ial_common_status')->result_array();
		return  $res;
	}
	function selectstatusbyid($sid){
		$res = $this->db->from('ial_common_status')->where('sid',$sid)->get()->row_array();
		return $res;
	}
	
	function insertstatus($arr){
		$res = $this->db->insert('ial_common_status',$arr);
		return $res;
	}
	
	function updatestatus($sid,$arr){
		$this->db->where('sid',$sid);
		return $this->db->update('ial_common_status',$arr);
	}
	
	function deletestatus($sid){
		$this->db->where('sid',$sid);
		return $this->db->delete('ial_common_status');
	}
}