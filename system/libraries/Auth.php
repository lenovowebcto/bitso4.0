<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth{

    function __construct(){

    }
   public static  function getUser(){
        $session = new CI_Session();

        $user = $session->userdata('user');
        return $user;
    }

 	public static function setLoginUser($user){
        $session = new CI_Session();
 		$session->set_userdata($user);
 		
 	}
  public static  function getpro(){
       $session = new CI_Session();
    	$pro = $session->userdata('project');
    	return $pro;
   }
   public static function getTask(){
       $session = new CI_Session();
   	$pro = $session->userdata('user_admintask');
   	return $pro;
   }
 	public static function execute_auth(){
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
 	public static function getUdmin($name,$password){
 		$sql = "SELECT * FROM common_user WHERE username='$name' AND UPWD='${password}' AND active=1"; 
 		$obj = mysql_query($sql);
 		$row = mysql_fetch_array($obj);
 		return $row;
 	
 }
}
 
