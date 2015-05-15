<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// just test
class Welcome extends CI_Controller{
	
	 function __construct(){
	 	parent::__construct();
	 	$this->load->Model('model'); 
	}
	public function index()
	{
		$t = $this->model->test();
	}
	
	function test(){
       $this->load->view('login');
	}
	
	function login(){
		$username = $_POST['username'];
		$psw = $_POST['password'];
		$num =  $this->model ->login($username,$psw);
		if($num>0){
			$this->load->view('success');
		}else{
			$this->load->view('fail');
		}
	}
}
