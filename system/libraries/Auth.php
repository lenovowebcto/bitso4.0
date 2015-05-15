<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth{

   function getUser(){
 		$user = $this->session->userdata('user');
 		return $user;
 	}

 	function setLoginUser($user){
 		$this->session->set_userdata($user);
 		
 	}
   function getpro(){
    	$pro = $this->session->userdata('project');
    	return $pro;
   }
   function getTask(){
   	$pro = $this->session->userdata('user_admintask');
   	return $pro;
   }
 	function execute_auth(){
 		$usert = self :: getUser();
 		if(isset($usert['username'])){ 
 			$usert = self :: getUdmin($usert['username'],$usert['UPWD']);
 			if(count($usert)==0){
 				redirect('login');
 				return ;
 			}
 			$user = array('user'=>array('username'=> $usert['username'],'UPWD'=>$usert['UPWD'],'type'=>$usert['type'],'group'=>$usert['group']));
 			self :: setLoginUser($user);
 			return ;
 		}
 		redirect('login');
 		return ;
 	}
 	function getUdmin($name,$password){
 		$sql = "SELECT * FROM common_user WHERE username='$name' AND UPWD='${password}' AND active=1"; 
 		$obj = mysql_query($sql);
 		$row = mysql_fetch_array($obj);
 		return $row;
 	
 }
}
 
