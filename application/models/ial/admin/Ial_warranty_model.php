<?php
class Ial_warranty_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllwarranty(){
		return $this->db->get('ial_warranty')->result_array();
	}
	
	function selectoneByid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_warranty')->row_array();
	}
	
	function insert_ial_warranty($arr){
		return $this->db->insert('ial_warranty',$arr);
	}
	
	function update_ial_warranty($arr,$id){
		$this->db->where('id',$id);
		return $this->db->update('ial_warranty',$arr);
	}
}