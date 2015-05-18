<?php
class Pn_model extends CI_model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllpns($username){
		if($username!=''){
			$this->db->where('User',$username);
		}
		return $this->db->get('ial_pn_main')->result_array();
	}
	
	function insertpnmaintenance($pn,$pending,$sta,$c1,$c2,$user,$ial_decide){
		$this->db->trans_start();
		$res = $this->db->insert('ial_pn_main',$pn);
		$ial_id = $this->db->insert_id();
		// pending issue
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
		return $this->db->get('ial_pn_main')->row_array();
	}
	
	function editpnmaintenance($id,$pn,$pending,$sta,$c1,$c2,$user,$ial_decide,$num){
		$this->db->trans_start();
		$this->db->where('id',$id);
	    $this->db->update('ial_pn_main',$pn);
		
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
		$arr = $this->db->query("select * from ial_pn_main where PN like '%$pn%'")->result_array();
		return $arr;
	}
}