<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth{

    function __construct(){
    	if (!session_id()) session_start();
    }
   public static  function getUser(){
   	
       $user = $_SESSION['user'];
       return $user;
    }

 	/* public static function setLoginUser($user){
 		
 		 $_SESSION['user'] = $user;	
 	} */
  public static  function getpro(){
     	
    	$pro = isset($_SESSION['project'])?$_SESSION['project']:'';
    	return $pro;
   }
   public static function getTask(){
   	    
   	    $pro = $_SESSION['user_admintask'];
   	    return $pro;
   }
 	public static function execute_auth(){
 		$usert = self :: getUser();
 	
 		if(isset($usert['username'])){ 
 			$usert = self :: getUdmin($usert['username'],$usert['UPWD']);
 			if(count($usert)==0){
 				//redirect('login');
 				return  FALSE;
 			}else{
 				return true;
 			}
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