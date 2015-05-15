<?php
class DashModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getAllByAdmin(){
		
		$n1 = $this->db->count_all_results('lois_compatibility');
		$n2 = $this->db->count_all_results('lois_element');
		$n3 = $this->db->count_all_results('lois_ep_req');
		$n4 = $this->db->count_all_results('lois_opt');
		$n5 = $this->db->count_all_results('lois_opt_spb');
		
		$n6 = $this->db->count_all_results('lois_svc');
		$n7 = $this->db->count_all_results('tickets');
		
		return $n1+$n2+$n3+$n4+$n5+$n6+$n7;
	}
	
	function getAllnewtask(){
		  $today = date("Y-m-d"); 
		  $n1 =  $this->db->query("select * from tickets where status!='Final'")->num_rows();
		  $n2 =  $this->db->query("select * from lois_svc where status!='Final'")->num_rows();
		  $n3 =  $this->db->query("select * from lois_opt_spb where status!='Final'")->num_rows();
		  $n4 =  $this->db->query("select * from lois_opt where status!='Final'")->num_rows();
		  $n5 =  $this->db->query("select * from lois_ep_req where status!='Final'")->num_rows();

		  $n6 =  $this->db->query("select * from lois_element where status!='Final'")->num_rows();
		  $n7 =  $this->db->query("select * from lois_compatibility where status!='Final'")->num_rows();
		return $n1+$n2+$n3+$n4+$n5+$n6+$n7;
	}
	
	function getAllwilloverduetask(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$n1 =  $this->db->query("select * from tickets where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		$n2 =  $this->db->query("select * from lois_svc where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		$n3 =  $this->db->query("select * from lois_opt_spb where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		
		$n4 =  $this->db->query("select * from lois_opt where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		$n5 =  $this->db->query("select * from lois_ep_req where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		
		$n6 =  $this->db->query("select * from lois_element where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		$n7 =  $this->db->query("select * from lois_compatibility where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		return $n1+$n2+$n3+$n4+$n5+$n6+$n7;
	}
    
	function getAlloverduetask(){
		$today = date("Y-m-d");
		$n1 =  $this->db->query("select * from tickets where deadline>'$today'")->num_rows();
		$n2 =  $this->db->query("select * from lois_svc where deadline>'$today'")->num_rows();
		$n3 =  $this->db->query("select * from lois_opt_spb where deadline>'$today'")->num_rows();
		
		$n4 =  $this->db->query("select * from lois_opt where deadline>'$today'")->num_rows();
		$n5 =  $this->db->query("select * from lois_ep_req where deadline>'$today'")->num_rows();
		
		$n6 =  $this->db->query("select * from lois_element where deadline>'$today'")->num_rows();
		$n7 =  $this->db->query("select * from lois_compatibility where deadline>'$today'")->num_rows();
		return $n1+$n2+$n3+$n4+$n5+$n6+$n7;
	}
	
	function getComByAdmin($archive){
		 $this->db->where('archive',$archive);
		 return   $this->db->get('lois_compatibility')->result_array();
	}
	function getEleByAdmin($archive){
		$this->db->where('archive',$archive);
		return   $this->db->get('lois_element')->result_array();
	}
	function getEp_reqByAdmin($archive){
		$this->db->where('archive',$archive);
		return   $this->db->get('lois_ep_req')->result_array();
	}
	function getOptByAdmin($archive){
		$this->db->where('archive',$archive);
		return   $this->db->get('lois_opt')->result_array();
	}
	
	function getSpbByAdmin($archive){
		$this->db->where('archive',$archive);
		return   $this->db->get('lois_opt_spb')->result_array();
	}
	function getSvcByAdmin($archive){
		$this->db->where('archive',$archive);
		return   $this->db->get('lois_svc')->result_array();
	}
	function getTicketByAdmin($archive){
		$this->db->where('archive',$archive);
		return   $this->db->get('tickets')->result_array();
	}
	
	function getwilltpg(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$res =  $this->db->query("select * from tickets where deadline>='$ty_bak' and deadline<='$today'")->result_array();
		return $res;
	}
	
	function getwillopt(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$res =  $this->db->query("select * from lois_opt where deadline>='$ty_bak' and deadline<='$today'")->result_array();
		return $res;
	}
	
	function getwillsvc(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$res =  $this->db->query("select * from lois_svc where deadline>='$ty_bak' and deadline<='$today'")->result_array();
		return $res;
	}
	
	function getwillcom(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$res =  $this->db->query("select * from lois_compatibility where deadline>='$ty_bak' and deadline<='$today'")->result_array();
		return $res;
	}
	
	function getwillep(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$res =  $this->db->query("select * from lois_ep_req where deadline>='$ty_bak' and deadline<='$today'")->result_array();
		return $res;
	}
	
	function getwillele(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$res =  $this->db->query("select * from lois_element where deadline>='$ty_bak' and deadline<='$today'")->result_array();
		return $res;
	}
	
	function getwillspb(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$res =  $this->db->query("select * from lois_opt_spb where deadline>='$ty_bak' and deadline<='$today'")->result_array();
		return $res;
	}
	//�´�����task
	function getNewComByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_compatibility where status!='final'")->result_array();
		return  $res;
	}
	
	function getNewEleByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_element where status!='final'")->result_array();
		return  $res;
		
	}
	function getNewEp_reqByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_ep_req where status!='final'")->result_array();
		return  $res;
	}
	
	function getNewOptByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_opt where status!='final'")->result_array();
		return  $res;
	}
	
	function getNewSpbByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_opt_spb where status!='final'")->result_array();
		return  $res;
	}
	
	function getNewSvcByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_svc where status!='final'")->result_array();
		return  $res;
	}
	function getNewTicketByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from tickets where status!='final'")->result_array();
		return  $res;
	}

	//�Ѿ����ڵ�task
	function getOverdueComByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_compatibility where deadline>'$today'")->result_array();
		return  $res;
	}
	
	function getOverdueEleByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_element where deadline>'$today'")->result_array();
		return  $res;
	
	}
	function getOverdueEp_reqByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_ep_req where deadline>'$today'")->result_array();
		return  $res;
	}
	
	function getOverdueOptByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_opt where deadline>'$today'")->result_array();
		return  $res;
	}
	
	function getOverdueSpbByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_opt_spb where deadline>'$today'")->result_array();
		return  $res;
	}
	
	function getOverdueSvcByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from lois_svc where deadline>'$today'")->result_array();
		return  $res;
	}
	function getOverdueTicketByAdmin(){
		$today = date("Y-m-d");
		$res =  $this->db->query("select * from tickets where deadline>'$today'")->result_array();
		return  $res;
	}
	//tpg/ipg
	function getcountAllTpg(){
		$n7 = $this->db->count_all_results('tickets');
		return $n7;
	}
	function getcountnewTpg(){
		$today = date("Y-m-d");
		$n1 =  $this->db->query("select * from tickets where status!='final'")->num_rows();
		return $n1;
	}
	function getcountwillTpg(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$n1 =  $this->db->query("select * from tickets where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		return $n1;
	}
	function getcountoverlTpg(){
		$today = date("Y-m-d");
		$n1 =  $this->db->query("select * from tickets where deadline>'$today'")->num_rows();
		return $n1;
	}
	//element
	function getcountAllEle(){
		$n6 = $this->db->count_all_results('lois_element');
		return $n6;
	}
	function getcountnewEle(){
		$today = date("Y-m-d");
		$n1 =  $this->db->query("select * from lois_element where status!='final'")->num_rows();
		
		return $n1;
	}
	function getcountwillEle(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$n1 =  $this->db->query("select * from lois_element where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		return $n1;
	}
	function getcountoverlEle(){
		$today = date("Y-m-d");
		$n1 =  $this->db->query("select * from lois_element where deadline>'$today'")->num_rows();
		return $n1;
	}
	// opt/svc
	function getcountAllos(){
	    $n1 = $this->db->count_all_results('lois_compatibility');
		$n3 = $this->db->count_all_results('lois_ep_req');
		$n4 = $this->db->count_all_results('lois_opt');
		$n5 = $this->db->count_all_results('lois_opt_spb');
		
		$n6 = $this->db->count_all_results('lois_svc');
		
		return $n1+$n3+$n4+$n5+$n6;
	}
	function getcountnewos(){
		  $today = date("Y-m-d");
		  $n2 =  $this->db->query("select * from lois_svc where status!='final'")->num_rows();
		  $n3 =  $this->db->query("select * from lois_opt_spb where status!='final'")->num_rows();
		  $n4 =  $this->db->query("select * from lois_opt where status!='final'")->num_rows();
		  $n5 =  $this->db->query("select * from lois_ep_req where status!='final'")->num_rows();
		  
		  $n7 =  $this->db->query("select * from lois_compatibility where status!='final'")->num_rows();
		return $n2+$n3+$n4+$n5+$n7;
	}
	function getcountwillos(){
		$today = date("Y-m-d");
		$ty_bak = date("Y/m/d",time()-4*24*60*60);
		$n2 =  $this->db->query("select * from lois_svc where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		$n3 =  $this->db->query("select * from lois_opt_spb where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		
		$n4 =  $this->db->query("select * from lois_opt where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		$n5 =  $this->db->query("select * from lois_ep_req where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		
		$n7 =  $this->db->query("select * from lois_compatibility where deadline>='$ty_bak' and deadline<='$today'")->num_rows();
		return $n2+$n3+$n4+$n5+$n7;
	}
	function getcountoverlos(){
		$today = date("Y-m-d");
		$n2 =  $this->db->query("select * from lois_svc where deadline>'$today'")->num_rows();
		$n3 =  $this->db->query("select * from lois_opt_spb where deadline>'$today'")->num_rows();
		
		$n4 =  $this->db->query("select * from lois_opt where deadline>'$today'")->num_rows();
		$n5 =  $this->db->query("select * from lois_ep_req where deadline>'$today'")->num_rows();
		
		$n7 =  $this->db->query("select * from lois_compatibility where deadline>'$today'")->num_rows();
		return $n2+$n3+$n4+$n5+$n7;
	}
}