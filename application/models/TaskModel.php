<?php
class TaskModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	// select all tasks
	function selectAllTaskByf($family,$archive){
		$this->db->select('*');
		$this->db->where('archive',$archive);
		$this->db->where('family',$family);
		$arr = $this->db->get('tickets');
		return $arr->result_array();
	}
	//insert
	function inserttask($array,$user,$pending,$sta,$pr_id,$pr,$c1,$c2){
		$this->db->trans_start();
		$this->db->insert('tickets',$array);
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
		if($pr!=array()){
			$this->db->insert('project_attach',$pr);
		}
		return   $this->db->trans_complete();
	}
	//select Task By Id
	function selectTaskById($id=1){
		$arr = $this->db->from('tickets')->where('id',$id)->get()->row_array();
		return $arr;
	}
	
	function updatetask($id,$pr_id,$task,$user,$pending,$sta,$num,$pr,$c1,$c2,$str){
		$this->db->trans_start();
		$this->db->where('id',$id);
	    $this->db->update('tickets',$task);
		
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
		$ch['content'] = $str;
		
		$this->db->insert('change_history',$ch);
		if($pr!=array())$this->db->insert('project_attach',$pr);
		return $this->db->trans_complete();
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
	function request_type(){
		$query = $this->db->get('request_type');
		return  $query->result_array();
	}
	function pro_name(){
		$query = $this->db->get('common_project');
		return  $query->result_array();
	}
	function commoncategory(){
		$query = $this->db->get('common_category1');
		return  $query->result_array();
	}
	function commoncategory2($cc_id){
		$this->db->where('cc_id',$cc_id);
		$query = $this->db->get('common_category2');
		return  $query->result_array();
	}
	function selectAllpeis($id,$pr_id){
		$sql ="SELECT p.*,c1.cate_name,c2.nc_name FROM peissue p LEFT JOIN  common_category1 c1 ON p.ca1_id = c1.id LEFT JOIN common_category2 c2 ON c1.id=c2.cc_id  AND p.ca2_id = c2.id where p.t_id='$id' and p.pro_id='$pr_id'";
	    return $this->db->query($sql)->result_array();
	}
	
	function selectAllhistory($id,$pr_id){
		$query = $this->db->select("*")->from('change_history')->where('t_id',$id)->where('pro_id',$pr_id)->get()->result_array();
		return  $query;
	}
	//��ѯtable��fields
	function selectAllFields($tn){
		$sql = "select * from $tn";
		$result = mysql_query($sql);
	    for ($i=0;$i<mysql_num_fields($result);$i++){
		    $key[] = mysql_field_name($result,$i).'';
	    }
		return $key;
	}
  //��ѯ task��Ӧ��value
  function relationtasklist($tn){
	  	$this->db->select('*');
	  	$arr = $this->db->get($tn);
	  	return $arr->result_array();
  }
  
  function selecttaskgroupname(){
	  	$this->db->select('t.*,t.family,SUM(CASE WHEN STATUS !="final" THEN 1 ELSE 0 END) "num"')->from('tickets t')->group_by('t.family');
	  	return $this->db->get()->result_array();
  }
  
  function selectidbyname($family){
	  	$arr = $this->db->from('common_project')->where('pname',$family)->get()->row_array();
	  	return $arr;
  }
  //when update .select pname
  function selectattatchment($id){
  	    $this->db->where('t.id',$id);
	 	$this->db->select('pr.attachment');
		$this->db->from('tickets t');
		$this->db->join('project_attach pr','t.family=pr.pr_name');
		return $this->db->get()->result_array();
  }
  
  function selectattatchmentofele($pid){
	  	$this->db->where('e.pid',$pid);
	  	$this->db->select('pr.attachment');
	  	$this->db->from('lois_element e');
	  	$this->db->join('project_attach pr','e.project_name=pr.pr_name');
	  	return $this->db->get()->result_array();
  }
    function search_pn($pn){
        $arr = $this->db->query("select * from tickets where pn like '%$pn%'")->result_array();
        return $arr;
    }
    
    function selectbyid($id,$pr_id){
        return $this->db->from('peissue')->where('t_id',$id)->where('pro_id',$pr_id)->get()->result_array();
    }
    
    function selectc2byc1id($ca1_id){
    	return 	$this->db->from('common_category2')->where('cc_id',$ca1_id)->get()->result_array();
    }
    
    function selectattabyname($name){
    	$this->db->where('pr_name',$name);
    	$this->db->select('attachment,upload_time');
    	return $this->db->get('project_attach')->result_array();
    }
    
    function updatearchive($id,$arr){
    	$this->db->where('id',$id);
    	return $this->db->update('tickets',$arr);
    }
    function updatearchiveofele($id,$arr){
    	$this->db->where('pid',$id);
    	return $this->db->update('lois_element',$arr);
    }
}