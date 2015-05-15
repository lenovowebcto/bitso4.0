<?php
class BugModel extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function allbugs($status){
		if($status=='New')$this->db->where('status',$status);
		$this->db->select('*');
		$this->db->order_by('id',"desc");
		$arr = $this->db->get('bugs');
		return $arr->result_array();
	}
	
	function addbug($bug){
		return $this->db->insert('bugs',$bug);
	}
	
	function updatebug($id,$bug){
		$this->db->where('id',$id);
		return $this->db->update('bugs',$bug);
	}
	
	function selectbugbyid($id){
		$arr = $this->db->from('bugs')->where('id',$id)->get()->row_array();
		return $arr;
	}
	function updatestatus($id,$sta){
		$arr['status'] =$sta;
		$this->db->where('id',$id);
		return $this->db->update('bugs',$arr);
	}
}