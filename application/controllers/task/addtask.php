<?php
if (! defined ( 'BASEPATH' ))exit ( 'No direct script access allowed' );
class addtask extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'TaskModel' );
        $this->load->model ( 'UserModel' );
        $this->load->helper(array('form', 'url'));
		Auth::execute_auth ();
	}
	public function index() {
		
		$data['archive'] = $archive = isset($_GET['archive'])?$_GET['archive']:0;
		$data['f'] = $family = isset($_GET['f'])?$_GET['f']:'';
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		$data ['task'] = $this->TaskModel->selectAllTaskByf ($family,$archive);
		$this->load->view ( 'task/tasklist', $data );
	}
	/*
	 * add/edit task view page
	 */
	public function task() {
		$data['pr_id'] = $pr_id = isset ( $_GET ['pr_id'] ) ? $_GET ['pr_id'] : 0;
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : 0;
        $data['session_name'] = $this->UserModel->selectUser();
        $curr_user = Auth::getUser();
        $data['type'] = $curr_user['type'];
        $data['user_name'] = $curr_user['username'];

		if($pr_id>0 && $id>0){
			$data['pen'] = $this->TaskModel->selectAllpeis($id,$pr_id);
			$data['hist'] = $this->TaskModel->selectAllhistory($id,$pr_id);
			$data['atta'] = $this->TaskModel->selectattatchment($id);

		}
		// common information
		$data['brand'] = $this->TaskModel->commonbrand ();
		$data['status'] = $this->TaskModel->commonstatus ();
		$data['action'] = $this->TaskModel->commonaction ();
		$data['req_type'] = $this->TaskModel->request_type();
		$data['pro'] = $this->TaskModel->pro_name();
		
		$data['category1'] = $this->TaskModel->commoncategory();
		$data['category2'] = $this->TaskModel->commoncategory2($data['category1'][0]['id']);
		
		if (isset ( $id ) && $id > 0) {
			$data ['id'] = $id;
			$data ['task'] = $this->TaskModel->selectTaskById ($id);
			// 修改时找到对应的 pending issues中 ca1—id的值
			$c1id = $this->TaskModel->selectbyid($id,$pr_id);

			if($c1id!=array()){
			foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->TaskModel->selectc2byc1id($ca1_id);
					$data['c'][] = $this->TaskModel->selectc2byc1id($ca1_id);
				}
			}

			$val = $data['task']['PN'];
			 if($val!=""){
				$pn = explode(";", $val);
				$data['task']['PN'] = implode(PHP_EOL, $pn);
			}
		}
		$this->load->view ('task/addtask', $data );
	}
	public function toaddtask() {
		
		$pending = isset($_POST['pending'])?$_POST['pending']:'';
		$sta  = isset($_POST['sta'])?$_POST['sta']:'';
		$c1  = isset($_POST['c1'])?$_POST['c1']:'';
		$c2  = isset($_POST['c2'])?$_POST['c2']:'';
		
		$data ['id'] = $id = isset($_POST ['id'])?$_POST ['id']:'';
		$data ['pr_id'] = $pr_id = isset($_POST ['pr_id'])?$_POST ['pr_id']:'';
		$task = $_POST ['task'];
		
		$family = $task['family'];
		$pr_at = $this->TaskModel->selectidbyname($family);
		
		if(isset($task['PN']) && $task['PN']!='')
		{
			$arr = explode(PHP_EOL,$task['PN']);
			$pn = implode(';', $arr);
			$task['PN'] = $pn;
		}
		$file  =$_FILES['file_path']['name'];
		$pr = array();
		if($file!=''){
			$fal = $this->_toupload();
			
			if($fal){
				$pr['attachment'] = $file ;
				$pr['pr_name'] = $family;
				$pr['pro_id'] = $pr_at['projectid'] ;
				$pr['upload_time'] = date('y-m-d H:i:s',time());
			}
		}
	
		$user= Auth::getUser();
		$ann_date = $task['ann_date'];
		$final_deadline = $task['deadline'];
		$Drr_deadline = $task['Drr_deadline'];
		//according to brand and request_type  to decise time
		if(($task['brand'] == 'ThinkCentre' || $task['brand'] == 'ThinkPad' ||$task['brand'] == 'ThinkStation') && $task['request_type']=='New MT'){
			$task['deadline'] = date('Y-m-d', strtotime($ann_date. '-7 Week'));
			$task['Drr_deadline'] = date('Y-m-d', strtotime($ann_date. '-8 Week'));
			// Final Deadline =  Announce Date – 7 weeks(7x7=49)
		}elseif($task['brand'] == 'ThinkServer' && $task['request_type']=='New MT'){
			$task['deadline'] = date('Y-m-d', strtotime($ann_date. '-6 Week'));
			$task['Drr_deadline'] = date('Y-m-d', strtotime($ann_date. '-8 Week'));
			// Final Deadline =  Announce Date – 6 weeks(6x7=42)
		}elseif(($task['brand'] == 'ThinkCentre' || $task['brand'] == 'ThinkPad' ||$task['brand'] == 'ThinkStation'|| $task['brand'] == 'ThinkServer') && $task['request_type']=='Refresh With New SBB'){
			$task['deadline'] = date('Y-m-d', strtotime($ann_date. '-5 Week'));
			//Final Deadline =  Announce Date – 5 weeks(5x7=42)=========
		}elseif($task['brand'] == 'LBG Offline' && $task['request_type']=='New MT'){
			$task['Drr_deadline'] = $task['deadline'] = date('Y-m-d', strtotime($ann_date. '-4 Week'));
			//$task['Drr_deadline'] = date('Y-m-d', strtotime($task['ann_date']. '-4 Week'));
			//Final Deadline =  Announce Date – 4 weeks(4x7=28)
		}elseif($task['brand'] == 'LBG Offline' && $task['request_type']=='Offline Refresh'){
			//judge  Announce Date is Friday or not
			$w = date('w',strtotime($ann_date));
			if($w==2 || $w==3 || $w==4){
				$task['deadline'] =  date('Y-m-d', strtotime($ann_date. '-6 day'));
			}else{
				$task['deadline'] =  date('Y-m-d', strtotime($ann_date. '-4 Weekday'));
			}
			//echo $task['deadline'];exit;
		}elseif($task['brand'] == 'Lenovo DT' && $task['request_type']=='NEW MT'){
			$task['Drr_deadline'] = $task['deadline'] = date('Y-m-d', strtotime($ann_date. '-8 Week'));
			//$task['Drr_deadline'] = date('Y-m-d', strtotime($ann_date. '-8 Week'));
			//Final Deadline =  Announce Date – 8 weeks
		}elseif($task['brand'] == 'Lenovo NB' && $task['request_type']=='NEW MT'){
			$task['Drr_deadline'] = $task['deadline'] = date('Y-m-d', strtotime($ann_date. '-9 Week'));
			//$task['Drr_deadline'] = date('Y-m-d', strtotime($ann_date. '-9 Week'));
			// Final Deadline =  Anno unce Date – 9 weeks
		}elseif(($task['brand'] == 'Lenovo DT' || $task['brand'] == 'Lenovo NB') && ($task['request_type']=='Refresh With New SBB' ||$task['request_type']=='PF Refresh')){
			// 			$task['deadline'] = date('Y-m-d', strtotime($task['received_date']. '-5 Week'));
			$w1 = date('w',strtotime($task['received_date']));
			if($w1==1 || $w1==2 ||$w1==0){
				$task['deadline'] = date('Y-m-d', strtotime($task['received_date']. '+3 Weekday'));
			}elseif($w1==3 || $w1==4 ||$w1==5){
				$task['deadline'] = date('Y-m-d', strtotime($task['received_date']. '+5 day'));
			}elseif($w1==6){
				$task['deadline'] = date('Y-m-d', strtotime($task['received_date']. '+4 day'));
			}
			//Final Deadline = POR Received Date +3 工作日 (SAL Excel  line16)
		}
		$drrd  = $_POST['Drr_deadline'];
		$find  = $_POST['deadline'];
		$recd  = $_POST['received_date'];
		//只有admin 有权限修改时间，当final和drr deadline 和received_date均不改变时，就用AD计算。若其中有个值改变了则不计算
		if (isset($id) && $id > 0) {
			if($user['type']==1){
				if(($find!=$final_deadline) || ($drrd!=$Drr_deadline)){
					$task['deadline'] = $final_deadline;
					$task['Drr_deadline'] = $Drr_deadline;
				}
			}
			$old_task = $this->TaskModel->selectTaskById ($id);
			$str ='';
			unset($old_task['id']);
			unset($old_task['archive']);
		
			foreach($old_task as $k=>$v){
				if($v != $task[$k]){
					$str .= $k.':{'.$v.'=>'.$task[$k].'},';
				}
			}
			$str = rtrim($str,',');
			if($str=='')$str='NO FIELD CHANGE';
			
			//查找相关的 pendissue , if isset delete or insert
			$num = $this->TaskModel->selectAllpeis($id,$pr_id);
			// update
			$result = $this->TaskModel->updatetask ($id, $pr_id,$task,$user,$pending,$sta,count($num),$pr,$c1,$c2,$str);
			if ($result){
				redirect ('task/addtask/name_task?pr_id='.$pr_id );
			} else {
				$this->load->view ('task/addtask', $data );
			}
		} else {
			// add
			$task['archive']=0;
			$id = $this->TaskModel->inserttask ($task,$user,$pending,$sta,$pr_id,$pr,$c1,$c2);
			if ($id > 0) {
				redirect ( 'task/addtask/name_task?pr_id='.$pr_id );
			} else {
				$this->load->view ( 'task/addtask' );
			}
		}
	}
	
	function name_task(){
		
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		$data['task'] = $list = $this->TaskModel->selecttaskgroupname();
		foreach($list as $val){
			$name = $val['family'];
			$data['attachment'][$name] = $this->TaskModel->selectattabyname($name);
		}
		
		$this->load->view('task/task_name_list',$data);
	}
	private function  _toupload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$this->upload->initialize($config);
	
		return $this->upload->do_upload('file_path');
	}
	
	function changearchive(){
		$id = $_POST['id'];
		$val = $_POST['val'];
		if($val == 'Archive')$arr['archive'] = 1;
		if($val == 'NoArchive')$arr['archive'] = 0;
		$res = $this->TaskModel->updatearchive($id,$arr);
		if($res)echo 'success';
		if(!$res)echo 'error';
	}
}
