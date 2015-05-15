<?php
class Lois_ep_reqModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	// select all tasks
    function selectAllTask() {
        $query = $this->db->query("select * from lois_ep_req where archive !='1'")->result_array();
        return $query;
    }
    function selectAllAchieveTask(){
        $query = $this->db->query("select * from lois_ep_req where archive ='1'")->result_array();
        return $query;
    }
    function updatearchive($id,$arr){
        $this->db->where('id',$id);
        return $this->db->update('lois_ep_req',$arr);
    }

	//insert
	function inserttask($array,$user,$pending,$sta,$pr_id,$c1,$c2){
		$this->db->trans_start();
		$this->db->insert('lois_ep_req',$array);
		$t_id = $this->db->insert_id();
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
		//changehistory
		$ch['t_id'] = $t_id;
		$ch['pro_id'] = $pr_id;
		$ch['change_user'] = $user['username'];
		$ch['change_time'] = date('y-m-d h:i:s',time());
		$ch['oper'] = "add";
		$this->db->insert('change_history',$ch);
		
		return   $this->db->trans_complete();
	}
	//select Task By Id
	function selectTaskById($id){
		$arr = $this->db->from('lois_ep_req')->where('ID',$id)->get()->row_array();
		return $arr;
	}
	
	function updatetask($id,$task,$pr_id,$user,$pending,$sta,$num,$c1,$c2){
		
		  $this->db->trans_start();
		  $this->db->where('ID',$id);
	      $this->db->update('lois_ep_req',$task);

	      if($num>0){
	      	$this->db->where('t_id',$id);
	      	$this->db->where('pro_id',$pr_id);
	      	$this->db->delete('peissue');
	      }
	      $ps['pro_id'] = $pr_id;
	      $ps['t_id'] = $id;
	      if(is_array($pending) && $pending!= array()){
	    	for($i=0;$i<count($pending) ;$i++){
	    		$ps['pending'] = $pending[$i];
	    		$ps['status'] = $sta[$i];
	    		$ps['ca1_id'] = $c1[$i];
	    		$ps['ca2_id'] = $c2[$i];
	    		$this->db->insert('peissue',$ps);
	    	}
	     }
	   
		  $ch['t_id'] = $id;
		  $ch['pro_id'] = $pr_id; //projectid is not confirm ,as to current project
		  $ch['change_user'] = $user['username']; //current user
		  $ch['change_time'] = date('y-m-d h:i:s',time());
		  $ch['oper'] = "update";
	      
	      $this->db->insert('change_history',$ch);
	      return $this->db->trans_complete();
	}
	
	function commonstatus(){
		$query = $this->db->get('common_status');
		return  $query->result_array();
	}
	
	function selectAllpeis($id,$pr_id){
		$query = $this->db->select("*")->from('peissue')->where('t_id',$id)->where('pro_id',$pr_id)->get()->result_array();
		return  $query;
	}
	
	function selectAllhistory($id,$pr_id){
	
		$query = $this->db->select("*")->from('change_history')->where('t_id',$id)->where('pro_id',$pr_id)->get()->result_array();
		return  $query;
	}
	
	//select all bu 
	function selectAllBu(){
		return $this->db->get('common_bu')->result_array();
	}
    function search_pn($pn){
        $arr = $this->db->query("select * from lois_ep_req where pn like '%$pn%'")->result_array();
        return $arr;
    }

}