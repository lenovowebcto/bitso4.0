<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Controller {
	
	 function __construct(){
	 	parent::__construct();
	 	echo '要登录';
	}
	//验证是否自动登录
	function auth(){
		$a = $this->session->userdata('user');
		var_dump($a);
	}

	function login(){
		$username = $_POST['username'];
		$psw = $_POST['password'];
		$num =  $this->model ->login($username,$psw);
		
		if($num>0){
			$arr = array($username,$psw);
			$this->session->sess_create('user',$arr);
			$this->load->view('success');
		}else{
			$this->load->view('fail');
		}
	}
}
