<?php
class BuModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllBu(){
		return $this->db->from('common_bu')->get()->result_array();
	}
	
    function selectbubyid($bu_id){
    	return $this->db->from('common_bu')->where('bu_id',$bu_id)->get()->row_array();
    }
	function insertbu($bu){
		$res = $this->db->insert('common_bu',$bu);
		return $res;
	}
	
	function updatetbu($bu,$bu_id){
		$this->db->where('bu_id',$bu_id);
		return $this->db->update('common_bu',$bu);
	}
	
	function deletebu($bu_id){
		$this->db->where('bu_id');
		return $this->db->delete('common_bu');
	}
}