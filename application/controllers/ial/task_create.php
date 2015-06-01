<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
 class task_create extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model('ial/IAL_common_model','icm');
        $this->load->model ( 'ial/task_model','TaskModel' );
		Auth::execute_auth();
	}
	public function index() {
<<<<<<< HEAD
		$user = Auth::getUser();
		
=======
//        var_dump($_POST['task']);
//        exit;
        $user = Auth::getUser();
        $task = '';

        if(isset($_POST['task']) and $_POST['task'] !=null ) {
            $task = $_POST['task'];
        }
        $data['task'] = $this->TaskModel->selectAllTask($user['username'],$task);
>>>>>>> 8ba2c686d4dac3f5e4f57b734f19b8c265767a27
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		$data['dis'] = $dis = $_GET['dis'];
		$user = Auth::getUser();
		if ($user['type'] =='1'){
<<<<<<< HEAD
			$data['task'] = $this->TaskModel->selectAllTask('',$dis);
		}elseif($user['type'] == '2'){
			$data['task'] = $this->TaskModel->selectAllTask($user['username'],$dis);
=======
			$data['task'] = $this->TaskModel->selectAllTask('',$task);
		}elseif($user['type'] == '2'){
			$data['task'] = $this->TaskModel->selectAllTask($user['username'],$task);
>>>>>>> 8ba2c686d4dac3f5e4f57b734f19b8c265767a27
		}
        $data['Brand'] = $this->icm->select_ial_brand();
        $data['Family_name'] = $this->icm->select_ial_family();
        $data['Sub_Series'] = $this->icm->select_ial_sub_series();
		$this->load->view('ial/task/task_list',$data);
	}

	public function task() {
		$data['w'] = 'www';
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : 0;
		$data['dis'] = $dis = $_GET['dis'];
		$data['category1'] = $this->icm->ialcommoncategory();
		if($data['category1']!=array())
		$data['category2'] = $this->icm->ialcommoncategory2($data['category1'][0]['id']);
		$data['status'] = $this->icm->get_ial_status();
		$data['type'] = $this->icm->select_ial_type();
		$data['Brand'] = $this->icm->select_ial_brand();
		$data['Family_name'] = $this->icm->select_ial_family();
		$data['Sub_Series'] = $this->icm->select_ial_sub_series();
		$data['Status'] = $this->icm->get_ial_status();
		$user = Auth::getUser();
		$group = $user['group'];
		$data['username'] = $user['username'];
		$data['user'] = $this->icm->selectuserbynow($group);
		
		$pen = $data['pen'] = $this->icm->selectAllIalPen($id,'5');
		$data['hist'] = $this->icm->selectAllIALhistory($id,'5');
		$c1id = $this->icm->selectbyid($id,'ial');
		
		if (isset ( $id ) && $id > 0) {
			//////////////
			$c1id = $this->icm->selectbyid($id,'5');
			if($c1id!=array()){
				foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->icm->selectc2byc1id($ca1_id);
					$data['c'][] = $this->icm->selectc2byc1id($ca1_id);
				}
			}
			//////////////
			$data ['id'] = $id;
			$data ['task'] = $this->TaskModel->selectbyid ( $id );
			$val = $data['task']['Comment'];
			if($val!=""){
				$Comment = explode(";", $val);
				$data['task']['Comment'] = implode(PHP_EOL, $Comment);
			}
		}
		$this->load->view ( 'ial/task/task_create', $data );
	}
	public function toaddtask() {
		$pending = isset($_POST['pending'])?$_POST['pending']:'';
		$sta  = isset($_POST['sta'])?$_POST['sta']:'';
		$c1  = isset($_POST['c1'])?$_POST['c1']:'';
		$c2  = isset($_POST['c2'])?$_POST['c2']:'';
		
		$data ['id'] = $id = isset($_POST ['id'])?$_POST ['id']:'';
		$dis = isset($_POST ['dis'])?$_POST ['dis']:'';
		$data ['pr_id'] = $pr_id = isset($_POST ['pr_id'])?$_POST ['pr_id']:'';
		$task = $_POST['task'];
		$user= Auth::getUser();
		if(isset($task['Comment']) && $task['Comment']!='')
		{
			$arr = explode(PHP_EOL,$task['Comment']);
			$pn = implode(';', $arr);
			$task['Comment'] = $pn;
		}
		if ($id > 0) {
			// update
			$num = $this->TaskModel->selectAllpeis($id,$pr_id);
			$db_states = $this->TaskModel->updatetask ($id, $task,$pr_id,$user,$pending,$sta,count($num),$c1,$c2);
				
			if ($db_states) {
				redirect ( 'ial/task_create/index?pr_id='.$pr_id.'&dis='.$dis);
			} else {
				$this->load->view('ial/task_create/task?id='.$id.'&pr_id='.$pr_id.'&dis='.$dis);
			}
		} else {
			// add
			$db_states = $this->TaskModel->inserttask ($task,$user,$pending,$sta,$pr_id,$c1,$c2);
			if ($db_states) {
				redirect ( 'ial/task_create/index?pr_id='.$pr_id.'&dis='.$dis);
			} else {
				$this->load->view('ial/task_create/task?pr_id='.$pr_id.'&dis='.$dis);
			}
		}
		
	}
	
}