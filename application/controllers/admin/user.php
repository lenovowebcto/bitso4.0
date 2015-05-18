<?php
class user extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'UserModel' );
		Auth::execute_auth ();
	
	}
	
	// user list
	function index() {
		$user = Auth::getUser();
		$group = $user['group'];
		$data ['list'] = $this->UserModel->selectUserByGroup($group);
		$this->load->view ( 'admin/user/userlist',$data);
	}
	// add/update user
	function adduser() {
		$user = Auth::getUser();
		$data['group'] = $group = $user['group'];
		$data ['uid'] = $uid = isset ($_GET ['uid']) ? $_GET ['uid'] : '';
		$data ['gro'] = $this->UserModel->commongroup ();
		if ($uid > 0) {
			$data ['user'] = $this->UserModel->selectuserbyid ( $uid );
			$this->load->view ( 'admin/user/edituser', $data);
		}else{
			$this->load->view ( 'admin/user/adduser', $data);
		}
	}
	function toadduser() {
		$uid = $_POST ['uid'];
		$user = $_POST ['user'];
		$psw = $user ['UPWD'];
		$group = $_POST['group'];
		$user['group'] = $group;
		$user ['UPWD'] = md5 ( $user ['UPWD'] );
		
		if ($uid > 0) {
			$repsw = $_POST ['repsw'];
			if ($repsw == $psw) {
				$result = $this->UserModel->updateUser($uid, $user);
			} else {
				redirect ( 'admin/user/adduser?uid=' . $uid );
			}
		} else {
			$result = $this->UserModel->insetuser ( $user );
		}
		if ($result) {
			redirect ( 'admin/user/index' );
		} else {
			if ($uid > 0) {
				redirect ( 'admin/user/adduser?uid=' . $uid );
			} else {
				$this->load->view ( 'admin/user/adduser' );
			}
		}
	}
}