<?php
class AdmintaskModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function insertadmintask($ad){
		return $this->db->insert('admin_task',$ad);
	}
	
	function selectuserlist(){
		$this->db->where('group','LOIS');
		$res = $this->db->select('*')->from('common_user')->get()->result_array();
		return $res;
	}
	
	function selectAllAtask(){
		$res = $this->db->select('*')->from('admin_task')->get()->result_array();
		return $res;
	}
	
	function selectonebyid($tid){
		return $this->db->where('Ticket_id',$tid)->get('admin_task')->row_array();
	}
	
	function updateadmintask($tid,$ad){
		$this->db->where('Ticket_id',$tid);
		return $this->db->update('admin_task',$ad);
	}
	//����admin ����޸Ĵ�prob_state Ϊclosed ��dist��Ϊ0 ������user ������Ϊopen ��dist��Ϊ0
	function readallrask($at){
		if($at!=''){
			$this->db->where('AssignTo',$at);
		    $this->db->where('prob_state','Closed');
		}else{
			$this->db->where('prob_state','Closed');
		}
	    $ar['dist'] = 0;
		return $this->db->update('admin_task',$ar);
	}
   function readonerask($Ticket_id){
	   	$this->db->where('Ticket_id',$Ticket_id);
	   	$ar['dist'] = 0;
	   	return $this->db->update('admin_task',$ar);
   }
   
   function user_admintask($username){
   	   return $this->db->where('AssignTo',$username)->get('admin_task')->result_array();
   }
   function update_prostate($Ticket_id,$prob_state){
   	  if($prob_state == "Closed"){
   	  	$arr['prob_state'] = $prob_state;
   	  	$arr['dist'] = 1;
   	  }else{
   	  	$arr['prob_state'] = $prob_state;
   	  }
   	  
   	  $this->db->where('Ticket_id',$Ticket_id);
   	  return  $this->db->update('admin_task',$arr);
   }
}