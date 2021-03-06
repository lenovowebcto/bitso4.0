<?php
class IAL_common_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function ialcommoncategory(){
		return  $this->db->get('ial_category1')->result_array();
	}
	
	function ialcommoncategory2($ic_id){
		$this->db->where('ic_id',$ic_id);
		return $this->db->get('ial_category2')->result_array();
	}
	
	function selectAllIalPen($id,$ial_decide){
	$sql ="SELECT p.*,c1.cate_name,c2.nc_name FROM ial_issue p LEFT JOIN 
	    ial_category1 c1 ON p.ca1_id = c1.id LEFT JOIN ial_category2 c2 ON c1.id=c2.ic_id 
	    AND p.ca2_id = c2.id where p.ial_id='$id' and p.ial_decide='$ial_decide'";
	    return $this->db->query($sql)->result_array();
	}
	function selectAllIALhistory($id,$ial_decide){
		$query = $this->db->select("*")->from('ial_history')->where('ial_id',$id)->where('ial_decide',$ial_decide)->get()->result_array();
		return  $query;
	}
	function selectbyid($id,$ial_decide){
		return $this->db->from('ial_issue')->where('ial_id',$id)->where('ial_decide',$ial_decide)->get()->result_array();
	}
	function selectc2byc1id($ca1_id){
		return 	$this->db->from('ial_category2')->where('ic_id',$ca1_id)->get()->result_array();
	}
	function get_ial_status(){
		return $this->db->get('ial_common_status')->result_array();
	}
	function select_ial_team(){
		return $this->db->get('ial_team')->result_array();
	}
	function select_ial_warranty(){
		return $this->db->get('ial_warranty')->result_array();
	}
	function select_ial_brand($dis){
		if($dis!='')$this->db->where('dis',$dis);
		return $this->db->get('ial_common_brand')->result_array();
	}
	function select_ial_type(){
		return $this->db->get('ial_type')->result_array();
	}
	function select_ial_family(){
		return $this->db->get('ial_family')->result_array();
	}
	function select_ial_sub_series(){
		return $this->db->get('ial_common_subseries')->result_array();
	}
	
	function selectuserbynow($group){
		$this->db->where('group',$group);
		return $this->db->select('username')->get('common_user')->result_array();
	}
	function selectAllIAL_Fields($tn){
		$sql = "select * from $tn";
		$result = mysql_query($sql);
		for ($i=0;$i<mysql_num_fields($result);$i++){
			$key[] = mysql_field_name($result,$i).'';
		}
		return $key;
	}
	function relationIal_tasklist($tn){
		$this->db->select('*');
		$arr = $this->db->get($tn);
		return $arr->result_array();
	}
    function selectAllSummary(){
        $res = $this->db->get('ial_common_summary')->result_array();
        return $res;
    }
    function selectatta($id){
    	$this->db->where('id',$id);
    	$res = $this->db->select('file_path')->get('ial_pn_main')->row_array();
    	return $res;
    }
    function update($id,$new_att){
    	$arr['file_path'] =$new_att;
    	$this->db->where('id',$id);
    	return $this->db->update('ial_pn_main',$arr);
    }
    function selectc2bybid($bid){
    	$this->db->where('bid',$bid);
    	return $this->db->get('ial_family')->result_array();
    }
    function selectfbybr($brand){
    	$sql ="SELECT i.* FROM ial_common_brand icb  JOIN ial_family i ON icb.`bid` = i.`bid`  WHERE bname='$brand'";
    	return $this->db->query($sql)->result_array();
    }
    function selectsubserbyf($Family_name){
    	$sql ="SELECT i.* FROM ial_family f  JOIN ial_common_subseries i ON f.`id` = i.`f_id`  WHERE Family_name='$Family_name'";
    	return $this->db->query($sql)->result_array();
    }
    
    function updatestatus($id,$sta){
    	$arr['status'] =$sta;
    	$this->db->where('id',$id);
    	return $this->db->update('ial_pn_main',$arr);
    }
}