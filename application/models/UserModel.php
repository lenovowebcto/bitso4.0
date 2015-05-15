<?php
class UserModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function commongroup(){
		$group = $this->db->get('common_group')->result_array();
        return $group;
	}
	
	function insetuser($user){
		$res = $this->db->insert('common_user',$user);
		return $res;
	}
	
	function selectUserByGroup($group){
		$this->db->where('group',$group);
		$res = $this->db->get('common_user')->result_array();
		return $res;
	}
	function selectUser(){
		$res = $this->db->get('common_user')->result_array();
		return $res;
	}
	function selectuserbyid($uid){
		$res = $this->db->from('common_user')->where('uid',$uid)->get()->row_array();
		return $res;
	}
	function updateUser($uid,$user){
		$this->db->where('uid',$uid);
		return $this->db->update('common_user',$user);
	}

    function selectAllUser(){
        $user_name = $this->db->get('common_user')->result_array();
        return $user_name;
    }
}