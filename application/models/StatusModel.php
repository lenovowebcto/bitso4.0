<?php
class StatusModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function selectAllStatus(){
		$res = $this->db->get('common_status')->result_array();
		return  $res;
	}
	function selectstatusbyid($sid){
		$res = $this->db->from('common_status')->where('sid',$sid)->get()->row_array();
		return $res;
	}
	
	function insertstatus($arr){
		$res = $this->db->insert('common_status',$arr);
		return $res;
	}
	
	function updatestatus($sid,$arr){
		$this->db->where('sid',$sid);
		return $this->db->update('common_status',$arr);
	}
	
	function deletestatus($sid){
		$this->db->where('sid',$sid);
		return $this->db->delete('common_status');
	}
}