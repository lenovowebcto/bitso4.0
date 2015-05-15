<?php
class ReqtypeModel extends CI_Model{
	function __construct(){
		
	}
	
   function selectAllreqtype(){
		return $this->db->from('request_type')->get()->result_array();
	}
	
    function selecttypebyid($rqid){
    	return $this->db->from('request_type')->where('rqid',$rqid)->get()->row_array();
    }
	function inserttype($type){
		$res = $this->db->insert('request_type',$type);
		return $res;
	}
	
	function updatetype($ar,$rqid){
		$this->db->where('rqid',$rqid);
		return $this->db->update('request_type',$ar);
	}
	
}