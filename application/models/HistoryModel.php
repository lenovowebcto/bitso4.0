<?php
class  HistoryModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selecthistory(){
		$this->db->select('c.*,t.POR_Version,p.pname');
		$this->db->from('change_history c');
		$this->db->join('tickets t ','c.t_id=t.id');
		$this->db->join('common_project p','p.projectid = c.pro_id');
		$list = $this->db->get()->result_array();
		return $list;
	}
	/* function inserthistory($array){
		$res = $this->db->insert('change_history',$array);
		return $res;
	}
	
	function task_titles(){
		$list = $this->db->select('id,POR_Version')->from('tickets')->get()->result_array();
		return $list;
	}
	function pro_list(){
		$list = $this->db->select('projectid,pname')->from('common_project')->get()->result_array();
		return $list;
	}
	function user_list(){
		$list = $this->db->select('uid,username')->from('common_user')->get()->result_array();
		return $list;
	}
	
	function getonehistory($id){
		$this->db->select('c.*,t.POR_Version,p.pname');
		$this->db->where('c.id',$id);
		$this->db->from('change_history c');
		$this->db->join('tickets t ','c.t_id=t.id');
		$this->db->join('common_project p','p.projectid = c.pro_id');
		return $this->db->get()->row_array();
	}
	
	function updatehistory($id,$hist){
		$this->db->where('id',$id);
		return $this->db->update('change_history',$hist);
	} */
}