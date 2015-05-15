<?php
class Lois_epModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	// select all tasks
	function selectAllTask(){
		$this->db->select('*');
		$arr = $this->db->get('lois_ep');
		return $arr->result_array();
	}
	//insert
	function inserttask($array){
		
		$this->db->insert('lois_ep',$array);
		return  $this->db->insert_id();
	}
	//select Task By Id
	function selectTaskById($id=1){
		$arr = $this->db->from('lois_ep')->where('ID',$id)->get()->row_array();
		return $arr;
	}
	
	function updatetask($id,$task){
		  $this->db->where('id',$id);
	      return $this->db->update('lois_ep',$task);
	}
	//common
	function commonbrand(){
		$query = $this->db->get('common_brand');
		return  $query->result_array();
	}
	function commonstatus(){
		$query = $this->db->get('common_status');
		return  $query->result_array();
	}
	function commonaction(){
		$query = $this->db->get('common_action');
		return  $query->result_array();
	}
	function selectAllpeis($id,$pr_id){
		$query = $this->db->select("*")->from('peissue')->where('t_id',$id)->where('pro_id',$pr_id)->get()->result_array();
		return  $query;
	}
	
	function selectAllhistory($id,$pr_id){
	
		$query = $this->db->select("*")->from('change_history')->where('t_id',$id)->where('pro_id',$pr_id)->get()->result_array();
		return  $query;
	}
}