<?php
class Ial_Family_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllFamilys(){
		return $this->db->get('ial_family')->result_array();
	}
	
	function selectoneByid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_family')->row_array();
	}
	
	function insert_ial_family($arr){
		return $this->db->insert('ial_family',$arr);
	}
	
	function update_ial_family($arr,$id){
		$this->db->where('id',$id);
		return $this->db->update('ial_family',$arr);
	}
}