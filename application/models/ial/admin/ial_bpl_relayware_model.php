<?php
class StatusModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function selectAllStatus(){
		$res = $this->db->get('ial_common_bpl_relayware')->result_array();
		return  $res;
	}
	function selectstatusbyid($sid){
		$res = $this->db->from('ial_common_bpl_relayware')->where('id',$sid)->get()->row_array();
		return $res;
	}
	
	function insertstatus($arr){
		$res = $this->db->insert('ial_common_bpl_relayware',$arr);
		return $res;
	}
	
	function updatestatus($sid,$arr){
		$this->db->where('id',$sid);
		return $this->db->update('ial_common_bpl_relayware',$arr);
	}
	
	function deletestatus($sid){
		$this->db->where('id',$sid);
		return $this->db->delete('ial_common_bpl_relayware');
	}
}