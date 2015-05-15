<?php
class ele_task  extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('EleModel');
		$this->load->model('TaskModel');
        $this->load->model ('ProjectModel' );
        $this->load->helper(array('form', 'url'));
		Auth::execute_auth();
	}
	//project name list
	function index(){
		//ֻ��ʾproject_name  
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		$data['list'] = $list= $this->EleModel->allproname();
		foreach($list as $val){
			$name = $val['project_name'];
			$data['attachment'][$name] = $this->EleModel->selectattabyname($name);
		}
		
		$this->load->view('ele/pronamelist',$data);
	}
	//ÿ��projectname��Ӧ��list
	function project_list(){
		 $data['archive'] = $archive = $_GET['archive'];
		 $data['pro_name'] = $pro_name = isset($_GET['pro_name'])?$_GET['pro_name']:0;
		 $data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		 $data['list'] = $this->EleModel->selectAllTask($pro_name,$archive);
		 $this->load->view('ele/eletasklist',$data); 
	}
	//add ele_task
	function addeletask(){
		$data['pr_id'] = $pr_id = isset($_GET['pr_id'])?$_GET['pr_id']:0;
		$data['pid'] = $pid = isset($_GET['pid'])?$_GET['pid']:0;
		$data['id'] = $pid;
		$user= Auth::getUser();
		$data['t'] = $user['type'];
        $data['project_name'] = $this->ProjectModel->selectAllProject();
        $data['brand'] = $this->TaskModel->commonbrand ();
       
        $data['category1'] = $this->TaskModel->commoncategory();
        $data['category2'] = $this->TaskModel->commoncategory2($data['category1'][0]['id']);
       
		if($pr_id>0 && $pid>0){              
			$data['pen'] = $this->TaskModel->selectAllpeis($pid,$pr_id);
			$data['hist'] = $this->TaskModel->selectAllhistory($pid,$pr_id);
			$data['atta'] = $this->TaskModel->selectattatchmentofele($pid);
			$c1id = $this->TaskModel->selectbyid($pid,$pr_id);
			
			if($c1id!=array()){
				foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->TaskModel->selectc2byc1id($ca1_id);
					$data['c'][] = $this->TaskModel->selectc2byc1id($ca1_id);
				}
			}
		}
		
		$data['eletask'] = $this->EleModel->selecteletask($pid);
		$data['type'] = $this->EleModel->get_reqtype();
		$data['status'] = $this->EleModel->get_status();
		$this->load->view('ele/addeletask',$data);
	}
	//toadd 
	function toaddeletask(){
		$pending = isset($_POST['pending'])?$_POST['pending']:'';
		$sta  = isset($_POST['sta'])?$_POST['sta']:'';
		$c1  = isset($_POST['c1'])?$_POST['c1']:'';
		$c2  = isset($_POST['c2'])?$_POST['c2']:'';
		
		$data ['pr_id'] = $pr_id = isset($_POST ['pr_id'])?$_POST ['pr_id']:'';
		$user= Auth::getUser();
		$pid = isset($_POST['pid'])?$_POST['pid']:0;
		$ele = $_POST['ele'];
		$drrd = $ele['DeadLine'];
		$pname = $ele['project_name'];
		$pr_at = $this->TaskModel->selectidbyname($pname);
		$file  =$_FILES['file_path']['name'];
		$pr = array();
		if($file!=''){
			$fal = $this->_toupload();
			if($fal){
				$pr['attachment'] = $file ;
				$pr['pr_name'] = $pname;
				$pr['pro_id'] = $pr_at['projectid'] ;
			}
		}
	
		$AD = $ele['AD'];
		if(($ele['brand'] == 'ThinkCentre' || $ele['brand'] == 'ThinkPad' ||$ele['brand'] == 'ThinkStation') && $ele['Type']=='New MT'){
			$ele['DeadLine'] = date('Y-m-d', strtotime($AD. '-13 Week'));
		}elseif($ele['brand'] == 'ThinkServer' && $ele['Type']=='New MT'){
			$ele['DeadLine'] = date('Y-m-d', strtotime($AD. '-12 Week'));
		}elseif($ele['brand'] == 'Lenovo DT' && $ele['Type']=='New MT'){
			$ele['DeadLine'] = date('Y-m-d', strtotime($AD. '-13 Week'));
		}elseif($ele['brand'] == 'Lenovo NB' && $ele['NEW MT']=='New MT'){
			$ele['DeadLine'] =  date('Y-m-d', strtotime($AD. '-14 Week'));
		}elseif(($ele['brand'] == 'Lenovo NB' || $ele['brand'] == 'Lenovo DT') && $ele['Type']=='Refresh With New SBB'){
			$ele['DeadLine'] = $AD;
		}
		$DeadLine = $_POST['DeadLine'];
		if($pid>0){
			//update 1.admin  2. 若DRR Deadline 改变则按照改变的值，若不改变则用计算的值===>若为user则其值deadline值不会被改变
			if($user['type']==1 && $drrd!=$DeadLine){
				$ele['DeadLine'] = $drrd;
			}
			/* elseif($user['type']==2){
				$ele['DeadLine'] = $DeadLine;
			} */
			$num = $this->TaskModel->selectAllpeis($pid,$pr_id);
			$res = $this->EleModel->update_eletask($ele,$pid,$pr_id,$pending,$sta,$user,count($num),$pr,$c1,$c2);
		}else{
			$res = $this->EleModel->insereletask($ele,$pending,$sta,$pr_id,$user,$pr,$c1,$c2);
		}
		
		if($res){
			redirect('element/ele_task?pr_id='.$pr_id);
		}else{
			 if($pid>0){
			 	$this->load->view('ele/addeletask?pid='.$pid);
			}else{
				$this->load->view('ele/addeletask');
			} 
			
		}
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
		$res = $this->TaskModel->updatearchiveofele($id,$arr);
		if($res)echo 'success';
		if(!$res)echo 'error';
	}
}