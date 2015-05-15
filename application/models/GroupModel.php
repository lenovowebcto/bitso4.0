<?php
class GroupModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function addgroup($gname){
		$array['gname'] = $gname;
		$res = $this->db->insert('common_group',$array);
		return $res;
	}
	
	function  selectAllGroup(){
		$res = $this->db->get('common_group')->result_array();
		return $res;
	}
	
	function selectgroup($gid){
		$res = $this->db->from('common_group')->where('gid',$gid)->get()->row_array();
		return $res;
	}
	
	function updategroup($gid,$gname){
		$arr['gname'] = $gname;
		$this->db->where('gid',$gid);
		return $this->db->update('common_group',$arr);
	}
	
	function deletegroup($gid){
		$this->db->where('gid',$gid);
		return $this->db->delete('common_group');
	}
}