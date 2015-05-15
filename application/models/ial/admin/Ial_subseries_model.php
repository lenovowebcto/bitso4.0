<?php
class Ial_subseries_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function selectAll(){
		$res = $this->db->get('ial_common_subseries')->result_array();
		return  $res;
	}
	function selectbyid($sid){
		$res = $this->db->from('ial_common_subseries')->where('id',$sid)->get()->row_array();
		return $res;
	}
	
	function insert($arr){
		$res = $this->db->insert('ial_common_subseries',$arr);
		return $res;
	}
	
	function update($sid,$arr){
		$this->db->where('id',$sid);
		return $this->db->update('ial_common_subseries',$arr);
	}
	
	function delete($sid){
		$this->db->where('id',$sid);
		return $this->db->delete('ial_common_subseries');
	}
}