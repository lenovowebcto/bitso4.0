<?php
class EleModel extends CI_Model{
	
	function __construct(){
	  parent::__construct();
	}
	
	function get_reqtype(){
		return $this->db->get('request_type')->result_array();
	}
	function get_status(){
		return $this->db->get('common_status')->result_array();
	}
	function insereletask($ele,$pending,$sta,$pr_id,$user,$pr,$c1,$c2){
		$this->db->trans_start();
		$res =  $this->db->insert('lois_element',$ele);
		$t_id =  $this->db->insert_id();
		//pending issue
		$ps['pro_id'] = $pr_id;
		$ps['t_id'] = $t_id;
		if(is_array($pending) && $pending!= array()){
			
			for($i=0;$i<count($pending) ;$i++){
				$ps['pending'] = $pending[$i];
				$ps['status'] = $sta[$i];
				$ps['ca1_id'] = $c1[$i];
				$ps['ca2_id'] = $c2[$i];
				$this->db->insert('peissue',$ps);
			}
		}
		$ch['t_id'] = $t_id;
		$ch['pro_id'] = $pr_id;
		$ch['change_user'] = $user['username'];
		$ch['change_time'] = date('y-m-d h:i:s',time());
		$ch['oper'] = "add";
		$this->db->insert('change_history',$ch);
		
		if($pr!=array())$this->db->insert('project_attach',$pr);
		return   $this->db->trans_complete();
	}
	
	function selectAllTask($pro_name,$archive){
		$this->db->where('archive',$archive);
		$this->db->where('project_name',$pro_name);
		$res = $this->db->get('lois_element')->result_array();
		return $res; 
		
	}
	
	function selecteletask($pid){
		$res = $this->db->from('lois_element')->where('pid',$pid)->get()->row_array();
		return $res;
	}
	
	function update_eletask($ele,$pid,$pr_id,$pending,$sta,$user,$num,$pr,$c1,$c2,$str){
		$this->db->trans_start();
		$this->db->where('pid',$pid);
	    $this->db->update('lois_element',$ele);
		// if pending issues have values->delete  
	    if($num>0){
	    	$this->db->where('t_id',$pid);
	    	$this->db->where('pro_id',$pr_id);
	    	$this->db->delete('peissue');
	    }
	    //add  pending issue
	    $ps['pro_id'] = $pr_id;
	    $ps['t_id'] = $pid;
	    if(is_array($pending) && $pending!= array()){
	    	for($i=0;$i<count($pending) ;$i++){
	    		$ps['pending'] = $pending[$i];
	    		$ps['status'] = $sta[$i];
	    		$ps['ca1_id'] = $c1[$i];
	    		$ps['ca2_id'] = $c2[$i];
	    		$this->db->insert('peissue',$ps);
	    	}
	    }
	    
		$ch['t_id'] = $pid;
		$ch['pro_id'] = $pr_id; //projectid is not confirm ,as to current project
		$ch['change_user'] = $user['username']; //current user
		$ch['change_time'] = date('y-m-d h:i:s',time());
		$ch['oper'] = "update";
		$ch['content'] = $str;
		
		$this->db->insert('change_history',$ch);
		
		if($pr!=array())$this->db->insert('project_attach',$pr);
		return $this->db->trans_complete();
	}
	
	function allproname(){
		$this->db->select('e.*,SUM(CASE WHEN STATUS !="final" THEN 1 ELSE 0 END) "num"')->from('lois_element e')->group_by('e.project_name');
        return $this->db->get()->result_array();
	}
	
	function selectidbyname($pname){
		$this->db->where('t.id',$id);
		$this->db->select('pr.attachment');
		$this->db->from('tickets t');
		$this->db->join('project_attach pr','t.family=pr.pr_name');
		return $this->db->get()->result_array();
	}
	
	function selectattabyname($name){
		$this->db->where('pr_name',$name);
		$this->db->select('attachment,upload_time');
		return $this->db->get('project_attach')->result_array();
	}
}