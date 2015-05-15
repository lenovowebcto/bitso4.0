<?php
class  Ial_brand_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function insertbrand($brand){
		$fal = $this->db->insert('ial_common_brand',$brand);
		return $fal;
	}
	
	function selectAllBrand(){
		$res = $this->db->get('ial_common_brand')->result_array();
		return $res;
	}
	function selectoneByid($bid){
		$res = $this->db->from('ial_common_brand')->where('bid',$bid)->get()->row_array();
		return $res;
	}
	
	function updatebrand($bid,$arr){
		$this->db->where('bid',$bid);
		return  $this->db->update('ial_common_brand',$arr);
	}
	function deletebrand($bid){
		$this->db->where('bid',$bid);
		return $this->db->delete('ial_common_brand');
	}
}