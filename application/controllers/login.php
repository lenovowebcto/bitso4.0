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
				$admin = array('user'=>array('username'=>$username,'UPWD'=>md5($psw),'type'=>$user['type'],'group'=>$user['group']),'project'=>$user['project'],'user_admintask'=>$admintask);
			}else{
				$admintask = $this->model->getClosedtask();
				$admin = array('user'=>array('username'=>$username,'UPWD'=>md5($psw),'type'=>$user['type'],'group'=>$user['group']),'user_admintask'=>$admintask);
			}
            $session = new CI_Session();
			$session->set_userdata($admin);
           // var_dump($session->userdata('user'));exit;
			redirect('dashboard/dashboard/admin_dashboard');

		}
 	}
 	
 	function logout(){
        $session = new CI_Session();
        $session->unset_userdata('user');
 		redirect('login');
 	}
 }