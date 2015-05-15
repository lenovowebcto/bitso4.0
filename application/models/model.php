<?php
class Model extends CI_Model{

	 function __construct() {
		parent::__construct();
	} 
	
	function login($username,$psw){
	    $sql  = "select * from common_user where username='$username' and UPWD='$psw' and active=1";
	    $arr  =  $this->db->query($sql);
	    return   $arr->num_rows;
	}
	function getuser($name,$password){
		$this->db->where('username',$name);
		$this->db->where('UPWD',$password);
		return $this->db->get('common_user')->row_array();
	}
	function getadmintask($username){
		$this->db->where('prob_state','open');
		$this->db->where('dist',1);
		$this->db->where('AssignTo',$username);
		return $this->db->get('admin_task')->result_array();
	}
	//�õ�����user�Ѿ�ִ���귵�ظ�admin��task
	function getClosedtask(){
		$this->db->where('prob_state',"Closed");
		$this->db->where('dist',1);
		return $this->db->get('admin_task')->result_array();
	}
	
}

?>