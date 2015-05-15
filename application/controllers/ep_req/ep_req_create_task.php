<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
 class ep_req_create_task extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Lois_ep_reqModel' );
        $this->load->model ( 'UserModel' );
        $this->load->model ( 'TaskModel' );
		Auth::execute_auth();
	}
	public function index() {
        $data['archive'] = $archive = $_GET['archive'];
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
        if($_GET['archive']==0){
		$data['task'] = $this->Lois_ep_reqModel->selectAllTask();
        }else{
            $data['task'] = $this->Lois_ep_reqModel->selectAllAchieveTask();
        }
		$this->load->view('ep_req/ep_req_tasklist',$data);
	}

     public function changearchive(){
         $id = $_POST['id'];
         $val = $_POST['val'];
         if($val == 'Archive')$arr['archive'] = 1;
         if($val == 'NoArchive')$arr['archive'] = 0;
         $res = $this->Lois_ep_reqModel->updatearchive($id,$arr);
         if($res)echo 'success';
         if(!$res)echo 'error';
     }

	/*
	 * add/edit task view page
	 */
	public function task() {
        $data['archive'] = $archive = isset($_GET['archive'])?$_GET['archive']:0;
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : 0;
		$data['category1'] = $this->TaskModel->commoncategory();
		$data['category2'] = $this->TaskModel->commoncategory2($data['category1'][0]['id']);
		
		if($pr_id>0 && $id>0){
			$data['pen'] = $this->Lois_ep_reqModel->selectAllpeis($id,$pr_id);
			$data['hist'] = $this->Lois_ep_reqModel->selectAllhistory($id,$pr_id);
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
		$data ['status'] = $this->Lois_ep_reqModel->commonstatus ();
		$data['bu'] = $this->Lois_ep_reqModel->selectAllBu();
        $data['session_name'] = $this->UserModel->selectUser();
        $u = Auth::getUser();
        $data['user_name'] =$u['username'];
		$data['type'] = $u['type'];
		if (isset ( $id ) && $id > 0) {
			$data ['id'] = $id;
			$data ['task'] = $this->Lois_ep_reqModel->selectTaskById ( $id );
			$val = $data['task']['PN'];
			if($val!=""){
				$pn = explode(";", $val);
				$data['task']['PN'] = implode(PHP_EOL, $pn);
			}
		}	
		$this->load->view ( 'ep_req/ep_req_create_task', $data );
	}
	public function toaddtask() {
        $archive = $_POST['archive'];
		$pending = isset($_POST['pending'])?$_POST['pending']:'';
		$sta  = isset($_POST['sta'])?$_POST['sta']:'';
		$c1  = isset($_POST['c1'])?$_POST['c1']:'';
		$c2  = isset($_POST['c2'])?$_POST['c2']:'';
		
		$data ['id'] = $id = isset($_POST ['id'])?$_POST ['id']:'';
		$data ['pr_id'] = $pr_id = isset($_POST ['pr_id'])?$_POST ['pr_id']:'';
		$task = $_POST['task'];
		$user= Auth::getUser();
		if(isset($task['PN']) && $task['PN']!='')
		{
			$arr = explode(PHP_EOL,$task['PN']);
			$pn = implode(';', $arr);
			$task['PN'] = $pn;
		}
		$hid_deadline = $_POST['deadline'];
		$deadline = $task['Deadline'];
		$reqd = $task['RequestDate'];
		$w = date('w',strtotime($reqd));
		 
		 if($w==3 || $w==4){
			$task['Deadline'] =  date('Y-m-d', strtotime($reqd. '+5 day'));
		}else{
			$task['Deadline'] =  date('Y-m-d', strtotime($reqd. '+3 Weekday'));
		} 
		if ($id > 0) {
			if($user['type']==1 &&  $hid_deadline != $deadline){
				$task['Deadline'] = $deadline;
			}
			/* elseif($user['type']==2){
				$task['Deadline'] = $hid_deadline;
			} */
			// update
			$num = $this->Lois_ep_reqModel->selectAllpeis($id,$pr_id);
			$db_states = $this->Lois_ep_reqModel->updatetask ($id, $task,$pr_id,$user,$pending,$sta,count($num),$c1,$c2);
			
			if ($db_states === FALSE) {
				redirect ( 'ep_req/ep_req_create_task/task' );
			} else {
				redirect ( 'ep_req/ep_req_create_task/index?pr_id='.$pr_id.'&archive='.$archive );
			}
		} else {
			// add
			
			$db_states = $this->Lois_ep_reqModel->inserttask ($task,$user,$pending,$sta,$pr_id,$c1,$c2);
			if ($db_states === FALSE) {
				redirect ( 'ep_req/ep_req_create_task/task' );
			} else {
				redirect ( 'ep_req/ep_req_create_task/index?pr_id='.$pr_id.'&archive='.$archive );
			}
		}
	}
}
