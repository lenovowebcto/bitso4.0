<?php
class  BrandModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function insertbrand($brand){
		$fal = $this->db->insert('common_brand',$brand);
		return $fal;
	}
	
	function selectAllBrand(){
		$res = $this->db->get('common_brand')->result_array();
		return $res;
	}
	function selectoneByid($bid){
		$res = $this->db->from('common_brand')->where('bid',$bid)->get()->row_array();
		return $res;
	}
	
	function updatebrand($bid,$arr){
		$this->db->where('bid',$bid);
		return  $this->db->update('common_brand',$arr);
	}
	function deletebrand($bid){
		$this->db->where('bid',$bid);
		return $this->db->delete('common_brand');
	}
}