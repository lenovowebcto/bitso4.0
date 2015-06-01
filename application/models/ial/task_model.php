<?php
class task_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
// select all tasks

	function selectAllTask($username,$dis,$task){
        if($task != null){
            if($task['Brand'] != null){
                $this->db->where('Brand',$task['Brand']);
            }
            if($task['Family_name'] != null){
                $this->db->where('Family_name',$task['Family_name']);
            }
            if($task['Sub_Series'] != null){
                $this->db->where('Sub_Series',$task['Sub_Series']);
            }
            if($task['start_AD'] != null and $task['start_AD'] != '0000-00-00') {
                $this->db->where('AD >', $task['start_AD']);
            }
            if($task['end_AD'] != null and $task['end_AD'] != '0000-00-00'){
                $this->db->where('AD < ',$task['end_AD']);
            }
        }

		if($username != ""){
			$this->db->where('User',$username);
		}
		$this->db->like('brand',$dis);
		$this->db->	from('ial_task it');
		$this->db->	join('ial_common_brand icb','it.brand=icb.bname');
		return $this->db->get()->result_array();
	}
	
    //insert
    function inserttask($array,$user,$pending,$sta,$pr_id,$c1,$c2){
    	$this->db->trans_start();
    	$this->db->insert('ial_task',$array);
    	$t_id = $this->db->insert_id();
    	//pending issue
    	$ps['ial_decide'] = $pr_id;
    	$ps['ial_id'] = $t_id;
    	if(is_array($pending) && $pending!= array()){
    		for($i=0;$i<count($pending) ;$i++){
    			$ps['pending'] = $pending[$i];
    			$ps['status'] = $sta[$i];
    			$ps['ca1_id'] = $c1[$i];
    			$ps['ca2_id'] = $c2[$i];
    			$this->db->insert('ial_issue',$ps);
    		}
    	}
    	//changehistory
    	$ch['ial_id'] = $t_id;
    	
    	$ch['change_user'] = $user['username'];
    	$ch['change_time'] = date('y-m-d h:i:s',time());
    	$ch['oper'] = "add";
    	$ch['ial_decide'] = $pr_id;
    	$this->db->insert('ial_history',$ch);
    
    	return   $this->db->trans_complete();
    }
   	
	function selectbyid($id){
		$this->db->where('id',$id);
		return $this->db->get('ial_task')->row_array();
	}
	
	function updatetask($id,$task,$ial_decide,$user,$pending,$sta,$num,$c1,$c2){
	
		$this->db->trans_start();
		$this->db->where('ID',$id);
		$this->db->update('ial_task',$task);
	
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
		$ch['ial_decide'] = $ial_decide; //projectid is not confirm ,as to current project
		$ch['change_user'] = $user['username']; //current user
		$ch['change_time'] = date('y-m-d h:i:s',time());
		$ch['oper'] = "update";
		 
		$this->db->insert('ial_history',$ch);
		return $this->db->trans_complete();
	}
	function selectAllpeis($id,$pr_id){
		$query = $this->db->select("*")->from('ial_issue')->where('ial_id',$id)->where('ial_decide',$pr_id)->get()->result_array();
		return  $query;
	}
	function searchIalNum($ial){
		$arr = $this->db->query("select * from ial_task where IAL_number='$ial'")->result_array();
		return $arr;
	}
	function searchBplNum($bpl){
		$arr = $this->db->query("select * from ial_task where BPL_Number='$bpl'")->result_array();
		return $arr;
	}
}