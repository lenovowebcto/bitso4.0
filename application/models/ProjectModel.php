<?php
class ProjectModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllProject(){
		$this->db->select('*');
		$arr = $this->db->get('common_project');
		return $arr->result_array();
	}
	
	function selectprojectbyid($pid){
		$arr = $this->db->from('common_project')->where('projectid',$pid)->get()->row_array();
		return $arr;
	}
	function insertproject($array){
		return $this->db->insert('common_project',$array);
	}
	
	function updateproject($pid,$arr){
		$this->db->where('projectid',$pid);
		return $this->db->update('common_project',$arr);
	}
	
	function deleteproject($pid){
		$this->db->where('projectid',$pid);
		return $this->db->delete('common_project');
	}
}