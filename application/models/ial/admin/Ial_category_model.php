<?php
class Ial_category_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllcategory(){
		$query = $this->db->get('ial_category1');
		return  $query->result_array();
	}
	
	function insertcategory($arr){
		return $this->db->insert('ial_category1',$arr);
	}
	
	function selectcategorybyid($id){
		$arr = $this->db->from('ial_category1')->where('id',$id)->get()->row_array();
		return $arr;
	}
	
	function updatecategory($id,$arr){
		$this->db->where('id',$id);
		return $this->db->update('ial_category1',$arr);
	}
	
	function allnextcategorybyid($id){
		$this->db->where('ic_id',$id);
		return $this->db->get('ial_category2')->result_array();
	}
	
	function insertnextcategory($arr){
		return $this->db->insert('ial_category2',$arr);
	}
	
	function selectnextbyid($id){
		$arr = $this->db->from('ial_category2')->where('id',$id)->get()->row_array();
		return $arr;
	}
	function updatenextcategory($arr,$id){
		$this->db->where('id',$id);
		return $this->db->update('ial_category2',$arr);
	}
	
	function selectcate2byid($cc_id){
		$arr = $this->db->from('ial_category2')->where('ic_id',$cc_id)->get()->result_array();
		return $arr;
	}
	function delete1($id){
		$this->db->trans_start();
		$this->db->where('id',$id);
		$flag = $this->db->delete('ial_category1');
		
		if($flag){
			$count = $this->db->query("select * from ial_category2 where ic_id='.$id'");
			$num =  count($count);
			if($num>0){
				$this->db->where('ic_id',$id);
				$this->db->delete('ial_category2');
			}
		}
		return  $this->db->trans_complete();
	}
	function delete2($id){
		$this->db->where('id',$id);
		return $this->db->delete('ial_category2');
	}
}