<?php
class Ial_team_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllteam(){
		return $this->db->get('ial_team')->result_array();
	}
	
	function selectoneByid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_team')->row_array();
	}
	
	function insert_ial_team($arr){
		return $this->db->insert('ial_team',$arr);
	}
	
	function update_ial_team($arr,$id){
		$this->db->where('id',$id);
		return $this->db->update('ial_team',$arr);
	}
}