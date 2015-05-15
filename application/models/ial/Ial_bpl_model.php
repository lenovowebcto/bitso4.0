<?php
class Ial_bpl_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAlllist(){
		return $this->db->get('ial_bpl_list')->result_array();
	}
	
	function insertial_bpl($ial,$user,$pending,$sta,$c1,$c2,$ial_decide){

		$this->db->trans_start();
		$res = $this->db->insert('ial_bpl_list',$ial);
		$ial_id = $this->db->insert_id();
		
		if(is_array($pending) && $pending!= array()){
			for($i=0;$i<count($pending) ;$i++){
				$ps['pending'] = $pending[$i];
				$ps['status'] = $sta[$i];
				$ps['ca1_id'] = $c1[$i];
				$ps['ca2_id'] = $c2[$i];
				$ps['ial_id'] = $ial_id;
				$ps['ial_decide'] = $ial_decide;
				$res = $this->db->insert('ial_issue',$ps);
			}
		}
		
		//history
		$ch['ial_id'] = $ial_id;
		$ch['change_user'] = $user['username'];
		$ch['change_time'] = date('y-m-d h:i:s',time());
		$ch['oper'] = "add";
		$ch['ial_decide'] = $ial_decide;
		$res = $this->db->insert('ial_history',$ch);
		return $this->db->trans_complete();
	}
	
	function selectbyid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_bpl_list')->row_array();
	}
	
	function updateial_bpl($ial,$id,$user,$pending,$sta,$c1,$c2,$ial_decide,$num){
		
		$this->db->trans_start();
		$this->db->where('id',$id);
	    $this->db->update('ial_bpl_list',$ial);
		
	    if($num>0){
	    	$this->db->where('ial_id',$id);
	    	$this->db->where('ial_decide',$ial_decide);
	    	$this->db->delete('ial_issue');
	    }
	    
	    $ps['ial_decide'] = $ial_decide;
	    $ps['ial_id'] = $id;
	    if(is_array($pending) && $pending!= array()){
	    	for($i=0;$i<count($pending) ;$i++){
	    		$ps['pending'] = $pending[$i];
	    		$ps['status'] = $sta[$i];
	    		$ps['ca1_id'] = $c1[$i];
	    		$ps['ca2_id'] = $c2[$i];
	    		$this->db->insert('ial_issue',$ps);
	    	}
	    }
	   
		$ch['ial_id'] = $id;
		$ch['ial_decide'] = $ial_decide; 
		$ch['change_user'] = $user['username']; //current user
		$ch['change_time'] = date('y-m-d h:i:s',time());
		$ch['oper'] = "update";
		
		$this->db->insert('ial_history',$ch);
		return $this->db->trans_complete();
	}
	function search_pn($pn){
		$arr = $this->db->query("select * from ial_bpl_list where US_part_NO like '%$pn%'")->result_array();
		return $arr;
	}
}