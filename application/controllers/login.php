<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Login extends CI_Controller{
 	function __construct(){
 		parent::__construct();
 		$this->load->Model('model');
 	}
 	
 	function index(){
 		$this->load->view('login');
 	}
 	function dologin(){
 		$username = $_POST['username'];
		$psw = $_POST['password'];
	
		$num =  $this->model ->login($username,md5($psw));
		if($num<=0){
			redirect('login/index');
		}else{
			$user = $this->model->getuser($username,md5($psw));
			/* $session = new CI_Session();
			$session->unset_userdata('user');
			$session->unset_userdata('user_admintask'); */
			if($user['type']==2){ 
				$admintask = $this->model->getadmintask($username);
				$admin = array(
						'user'=>array(
								'username'=>$username,
								'UPWD'=>md5($psw),
								'type'=>$user['type'],
								'group'=>$user['group']),
						'project'=>$user['project'],
						'user_admintask'=>$admintask);
				//echo "====>";echo '<pre>';var_dump($admin);exit;
				//$session->set_userdata($admin);
				if (!session_id()) session_start();
				$_SESSION['user'] = array(
								'username'=>$username,
								'UPWD'=>md5($psw),
								'type'=>$user['type'],
								'group'=>$user['group']);
				$_SESSION['project'] = $user['project'];
				$_SESSION['user_admintask'] = $admintask;
				
			}else{ 
				$admintask = $this->model->getClosedtask();
				$admin = array(
						'user'=>array(
								'username'=>$username,
								'UPWD'=>md5($psw),
								'type'=>$user['type'],
								'group'=>$user['group']),
						'user_admintask'=>$admintask);
				//echo "------------->";echo '<pre>';var_dump($admin);exit;
				//$session->set_userdata($admin);
				if (!session_id()) session_start();
				
				$_SESSION['user'] = array(
								'username'=>$username,
								'UPWD'=>md5($psw),
								'type'=>$user['type'],
								'group'=>$user['group']);
				$_SESSION['user_admintask'] = $admintask;
			}

            if($user['group']=='LOIS'){
				redirect('dashboard/dashboard/admin_dashboard');
			}else{
				redirect('dashboard/ial_dashboard/admin_dashboard');
			} 
		}
 	}
 	
 	function logout(){
        session_destroy();
 		redirect('login');
 	}
 }