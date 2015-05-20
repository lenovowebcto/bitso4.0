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
			if($user['type']==2){
				$admintask = $this->model->getadmintask($username);
				$admin = array('user'=>array('username'=>$username,'UPWD'=>md5($psw),'type'=>$user['type']),'project'=>$user['project'],'user_admintask'=>$admintask);
			}else{
				$admintask = $this->model->getClosedtask();
				$admin = array('user'=>array('username'=>$username,'UPWD'=>md5($psw),'type'=>$user['type']),'user_admintask'=>$admintask);
			}
<<<<<<< HEAD
            $session = new CI_Session();
			$session->set_userdata($admin);
           // var_dump($session->userdata('user'));exit;
			redirect('dashboard/dashboard/admin_dashboard');
=======
			
			$this->session->set_userdata($admin);
			if($user['group']=='LOIS'){
				redirect('dashboard/dashboard/admin_dashboard');
			}else{
				redirect('dashboard/ial_dashboard/admin_dashboard');
			}
			
>>>>>>> 95871983ca45228e15229f2ee4f851005d95c773
		}
 	}
 	
 	function logout(){
        $session = new CI_Session();
        $session->unset_userdata('user');
 		redirect('login');
 	}
 }