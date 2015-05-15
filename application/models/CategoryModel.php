<?php
class CategoryModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllcategory(){
		$query = $this->db->get('common_category1');
		return  $query->result_array();
	}
	
	function insertcategory($arr){
		return $this->db->insert('common_category1',$arr);
	}
	
	function selectcategorybyid($id){
		$arr = $this->db->from('common_category1')->where('id',$id)->get()->row_array();
		return $arr;
	}
	
	function updatecategory($id,$arr){
		$this->db->where('id',$id);
		return $this->db->update('common_category1',$arr);
	}
	
	function allnextcategorybyid($id){
		$this->db->where('cc_id',$id);
		return $this->db->get('common_category2')->result_array();
	}
	
	function insertnextcategory($arr){
		return $this->db->insert('common_category2',$arr);
	}
	
	function selectnextbyid($id){
		$arr = $this->db->from('common_category2')->where('id',$id)->get()->row_array();
		return $arr;
	}
	function updatenextcategory($arr,$id){
		$this->db->where('id',$id);
		return $this->db->update('common_category2',$arr);
	}
	
	function selectcate2byid($cc_id){
		$arr = $this->db->from('common_category2')->where('cc_id',$cc_id)->get()->result_array();
		return $arr;
	}
	
}