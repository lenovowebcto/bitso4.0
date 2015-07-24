<?php
class Lois_svcModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

    // select all tasks
    function selectAllTask() {
        $query = $this->db->query("select * from lois_svc where archive !='1'")->result_array();
        return $query;

    }
    function selectAllAchieveTask(){
        $query = $this->db->query("select * from lois_svc where archive ='1'")->result_array();
        return $query;
    }
    function updatearchive($id,$arr){
        $this->db->where('SVCID',$id);
        return $this->db->update('lois_svc',$arr);
    }
	//insert
	function inserttask($array,$user,$pending,$sta,$pr_id,$c1,$c2){
		
		$this->db->trans_start();
		$this->db->insert('lois_svc',$array);
		
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
	function selectTaskById($id=1){
		$arr = $this->db->from('lois_svc')->where('svcid',$id)->get()->row_array();
		return $arr;
	}
	
	function updatetask($id,$pr_id,$task,$user,$pending,$sta,$num,$c1,$c2,$str){

		$this->db->trans_start ();
		$this->db->where ( 'SVCID', $id );
		$this->db->update ( 'lois_svc', $task );
		
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
		
		$ch ['t_id'] = $id;
		$ch ['pro_id'] = $pr_id; // projectid is not confirm ,as to current project
		$user =Auth::getUser();
		$ch ['change_user'] = $user['username'];
		$ch ['change_time'] = date ( 'y-m-d h:i:s', time () );
		$ch ['oper'] = "update";
		$ch['content'] = $str;
		$this->db->insert ( 'change_history', $ch );
		return $this->db->trans_complete ();
	}
	//common
	function commonbrand(){
		$query = $this->db->get('common_brand');
		return  $query->result_array();
	}
	function commonstatus(){
		$query = $this->db->get('common_status');
		return  $query->result_array();
	}
	function commonaction(){
		$query = $this->db->get('common_action');
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
    function search_pn($pn){
        $arr = $this->db->query("select * from lois_svc where pn like '%$pn%'")->result_array();
        return $arr;
    }
}