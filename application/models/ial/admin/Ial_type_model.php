<?php
class Ial_type_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAlltype(){
		return $this->db->get('ial_type')->result_array();
	}
	
	function selectoneByid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_type')->row_array();
	}
	
	function insert_ial_type($arr){
		return $this->db->insert('ial_type',$arr);
	}
	
	function update_ial_type($arr,$id){
		$this->db->where('id',$id);
		return $this->db->update('ial_type',$arr);
	}
}