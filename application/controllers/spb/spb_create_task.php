<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class spb_create_task extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Lois_opt_spbModel' );
		$this->load->model ( 'Lois_ep_reqModel' );
        $this->load->model ( 'UserModel' );
        $this->load->model ( 'TaskModel' );
		Auth::execute_auth ();
	}
	public function index() {
		$data['archive'] = $archive = $_GET['archive'];
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
        if($archive==0) {
            $data ['task'] = $this->Lois_opt_spbModel->selectAllTask();
        }else{
            $data ['task'] = $this->Lois_opt_spbModel->selectAllAchieveTask ();
        }
		$this->load->view ('spb/spb_tasklist', $data );
	}

    public function changearchive(){
        $id = $_POST['id'];
        $val = $_POST['val'];
        if($val == 'Archive')$arr['archive'] = 1;
        if($val == 'NoArchive')$arr['archive'] = 0;
        $res = $this->Lois_opt_spbModel->updatearchive($id,$arr);
        if($res)echo 'success';
        if(!$res)echo 'error';
    }
	/*
	 * add/edit task view page
	 */
	public function task() {
		$data['archive'] = $archive = isset($_GET['archive'])?$_GET['archive']:0;
		$data ['pr_id'] = $pr_id = isset ( $_GET ['pr_id'] ) ? $_GET ['pr_id'] : 0;
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : 0;
		$data['category1'] = $this->TaskModel->commoncategory();
		$data['category2'] = $this->TaskModel->commoncategory2($data['category1'][0]['id']);
		
		if ($pr_id > 0 && $id > 0) {
			$data ['pen'] = $this->Lois_ep_reqModel->selectAllpeis ( $id, $pr_id );
			$data ['hist'] = $this->Lois_ep_reqModel->selectAllhistory ( $id, $pr_id );
			$c1id = $this->TaskModel->selectbyid($id,$pr_id);
		    if($c1id!=array()){
				foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->TaskModel->selectc2byc1id($ca1_id);
					$data['c'][] = $this->TaskModel->selectc2byc1id($ca1_id);
				}
			}
		}
		// common information
		$data ['task'] = $this->Lois_opt_spbModel->commonbrand ();
		$data ['status'] = $this->Lois_ep_reqModel->commonstatus ();
		$data['bu'] = $this->Lois_ep_reqModel->selectAllBu();
        $data['session_name'] = $this->UserModel->selectUser();
        $u = Auth::getUser();
        $data['type'] = $u['type'];
        $data['user_name'] = $u['username'];
		
		if (isset ( $id ) && $id > 0) {
			$data ['id'] = $id;
			$data ['task'] = $this->Lois_opt_spbModel->selectTaskById ( $id );
		}
		$this->load->view ( 'spb/spb_create_task', $data );
	}
	public function toaddtask() {
		$archive = $_POST['archive'];
		$pending = isset ( $_POST ['pending'] ) ? $_POST ['pending'] : '';
		$sta = isset ( $_POST ['sta'] ) ? $_POST ['sta'] : '';
		$c1  = isset($_POST['c1'])?$_POST['c1']:'';
		$c2  = isset($_POST['c2'])?$_POST['c2']:'';
		
		$data ['id'] = $id = isset ( $_POST ['id'] ) ? $_POST ['id'] : '';
		$data ['pr_id'] = $pr_id = isset ( $_POST ['pr_id'] ) ? $_POST ['pr_id'] : '';
		$task = $_POST['task'];
		
		$user = Auth::getUser ();
		$trd = $task['TASKR_DATE'];
		$hidden_Deadline = $_POST['Deadline'];
		$Deadline = $task['Deadline'];
		$w = date('w',strtotime($trd));
		if($w==5){
			$task['Deadline'] =  date('Y-m-d', strtotime($trd. '+3 day'));
		}elseif($w==6){
			$task['Deadline'] =  date('Y-m-d', strtotime($trd. '+2 day'));
		}else{
			$task['Deadline'] =  date('Y-m-d', strtotime($trd. '+1 Weekday'));
		}
		
		if (isset ( $id ) && $id > 0) {
			if($user['type']==1 &&  $hidden_Deadline != $Deadline){
				$task['Deadline'] = $Deadline;
			}
			/* elseif($user['type']==2){
				$task['Deadline'] = $hidden_Deadline;
			} */
			$num = $this->Lois_opt_spbModel->selectAllpeis ( $id, $pr_id );
			// update
			$result = $this->Lois_opt_spbModel->updatetask ($id,$pr_id,$task,$user,$pending,$sta,count($num),$c1,$c2);
			if ($result) {
				redirect ( 'spb/spb_create_task/index?pr_id='.$pr_id.'&archive='.$archive);
			} else {
				$this->load->view ( 'spb/spb_create_task', $data );
			}
		} else {
		
			$id = $this->Lois_opt_spbModel->inserttask ($task,$user,$pending,$sta,$pr_id,$c1,$c2);
			if ($id > 0) {
				redirect ( 'spb/spb_create_task/index?pr_id='.$pr_id.'&archive='.$archive);
			} else {
				$this->load->view ( 'spb/spb_create_task' );
			}
		}
	}
}
