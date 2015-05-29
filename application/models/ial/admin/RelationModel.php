<?php
class  RelationModel extends CI_Model{
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
	function selectrelationfamily($bid){
		$this->db->where('bid',$bid);
		return $this->db->get('ial_family')->result_array();
	}
	 function selectrelationoneByid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_family')->row_array();
	} 
	
	function insert_ial_family($arr){
		return $this->db->insert('ial_family',$arr);
	}
	
	function update_ial_family($arr,$id){
		$this->db->where('id',$id);
		return $this->db->update('ial_family',$arr);
	}
	function deletepro($id){
		$this->db->where('id',$id);
		return $this->db->delete('ial_family');
	}
	
	//
	function selectAll($f_id){
		$this->db->where('f_id',$f_id);
		$res = $this->db->get('ial_common_subseries')->result_array();
		return  $res;
	}
	function selectbyid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_common_subseries')->row_array();
	}
	function insert($arr){
		$res = $this->db->insert('ial_common_subseries',$arr);
		return $res;
	}
	
	function update($sid,$arr){
		$this->db->where('id',$sid);
		return $this->db->update('ial_common_subseries',$arr);
	}
	function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('ial_common_subseries');
	}
}