<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class opt_create_task extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Lois_optModel' );
		$this->load->model ( 'Lois_svcModel' );
		$this->load->model ( 'Lois_compatibilityModel' );
		$this->load->model ( 'Lois_ep_reqModel' );
		$this->load->model ( 'TaskModel' );
        $this->load->model ( 'UserModel' );
        $this->load->helper(array('form', 'url'));
		Auth::execute_auth ();
	}
	public function index() {
		$data['opt_pr_id'] ='2';
		$data['svc_pr_id'] ='7';
		$data['comp_pr_id'] ='6';
		$data ['opt'] = $this->Lois_optModel->selectAllTask ();
		$data ['svc'] = $this->Lois_svcModel->selectAllTask ();
		$data ['comp'] = $this->Lois_compatibilityModel->selectAllTask ();
		$this->load->view ( 'opt/opt_tasklist', $data );
	}
	/*
	 * add/edit task view page
	 */
	public function task() {
		$this->config->load('keyword');
		$data['img']    = $this->config->item('IMG');
		$data ['status'] = $this->Lois_ep_reqModel->commonstatus ();
		$data['bu'] = $this->Lois_ep_reqModel->selectAllBu();
		$data['session_name'] = $this->UserModel->selectUser();
		$u =  Auth::getUser();
        $data['user_name'] =$u['username'];

		$data ['brand'] = $this->TaskModel->commonbrand ();
		$data ['action'] = $this->TaskModel->commonaction ();
		$data['req_type'] = $this->TaskModel->request_type();

        $data['category1'] = $this->TaskModel->commoncategory();
        $data['category2'] = $this->TaskModel->commoncategory2($data['category1'][0]['id']);

		if (isset ( $_GET ['optid'] ) && $_GET ['optid'] > 0) {
			$data ['opt_id'] =$id= $_GET ['optid'];
			$data ['opt_pr_id'] = $pr_id = $_GET['pr_id'];
			$data ['opt'] = $this->Lois_optModel->selectTaskById ( $_GET ['optid'] );
            // 修改时找到对应的 pending issues中 ca1—id的值
            $c1id = $this->TaskModel->selectbyid($id,$pr_id);
		    if($c1id!=array()){
			foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->TaskModel->selectc2byc1id($ca1_id);
					$data['c'][] = $this->TaskModel->selectc2byc1id($ca1_id);
				}
			}
			//PN
			$val = $data['opt']['PN'];
			if($val!=""){
				$pn = explode(";", $val);
				$data['opt']['PN'] = implode(PHP_EOL, $pn);
			}
			
			$data['svc_hidden'] = $data['comp_hidden'] = 'style="display:none"';
			$data['opt_hidden'] = 'style="display:block" class="active" ';
			
			if($pr_id>0 && $id>0){
				$data['pen'] = $this->Lois_ep_reqModel->selectAllpeis($id,$pr_id);
				$data['hist'] = $this->Lois_ep_reqModel->selectAllhistory($id,$pr_id);
			}
		}
		if (isset ( $_GET ['svcid'] ) && $_GET ['svcid'] > 0) {
			$data ['svcid'] = $id = $_GET ['svcid'];
			$data ['svc_pr_id'] = $pr_id = $_GET['pr_id'];
			$data ['svc'] = $this->Lois_svcModel->selectTaskById ( $_GET ['svcid'] );
            // 修改时找到对应的 pending issues中 ca1—id的值
            $c1id = $this->TaskModel->selectbyid($id,$pr_id);
		   if($c1id!=array()){
			foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->TaskModel->selectc2byc1id($ca1_id);
					$data['c'][] = $this->TaskModel->selectc2byc1id($ca1_id);
				}
			}
			//PN
			$val = $data['svc']['PN'];
			if($val!=""){
				$pn = explode(";", $val);
				$data['svc']['PN'] = implode(PHP_EOL, $pn);
			}
			
			$data['opt_hidden'] = $data['comp_hidden'] ='style="display:none"';
			$data['svc_hidden'] = 'style="display:block" class="active" ';
			if($pr_id>0 && $id>0){
				$data['pen'] = $this->Lois_ep_reqModel->selectAllpeis($id,$pr_id);
				$data['hist'] = $this->Lois_ep_reqModel->selectAllhistory($id,$pr_id);
			}
		}
		if (isset ( $_GET ['comp_id'] ) && $_GET ['comp_id'] > 0) {
			$data ['comp_id'] =$id = $_GET ['comp_id'];
			$data ['comp_pr_id'] = $pr_id = $_GET['pr_id'];
			$data ['comp'] = $this->Lois_compatibilityModel->selectTaskById ( $_GET ['comp_id'] );

            if($data['comp']==array())$data['fp'] = array();
            if($data['comp']!=array())$data['fp'] = json_decode($data['comp']['file_path']);
            // 修改时找到对应的 pending issues中 ca1—id的值
            $c1id = $this->TaskModel->selectbyid($id,$pr_id);
		    if($c1id!=array()){
			foreach($c1id as $key){
					$ca1_id = $key['ca1_id'];
					$d = $this->TaskModel->selectc2byc1id($ca1_id);
					$data['c'][] = $this->TaskModel->selectc2byc1id($ca1_id);
				}
			}
            //PN
			$val = $data['comp']['PN'];
			if($val!=""){
				$pn = explode(";", $val);
				$data['comp']['PN'] = implode(PHP_EOL, $pn);
			}
			
			$data['opt_hidden'] =$data['svc_hidden'] = 'style="display:none"';
			$data['comp_hidden'] = 'style="display:block" class="active" ';
			if($pr_id>0 && $id>0){
				$data['pen'] = $this->Lois_ep_reqModel->selectAllpeis($id,$pr_id);
				$data['hist'] = $this->Lois_ep_reqModel->selectAllhistory($id,$pr_id);
			}
			
		}

		$this->load->view ( 'opt/opt_create_task', $data );
	}
	public function opt_addtask() {
		
		$pending = isset ( $_POST ['pending'] ) ? $_POST ['pending'] : '';
		$sta = isset ( $_POST ['sta'] ) ? $_POST ['sta'] : '';

        $c1  = isset($_POST['c1'])?$_POST['c1']:'';
        $c2  = isset($_POST['c2'])?$_POST['c2']:'';

		$data ['id'] = $id = isset ( $_POST ['opt_id'] ) ? $_POST ['opt_id'] : '';
		$data ['pr_id'] = $pr_id = isset ( $_POST ['opt_pr_id'] ) ? $_POST ['opt_pr_id'] : '';
		$task = $_POST ['opt'];
		if(isset($task['PN']) && $task['PN']!='')
		{
			$arr = explode(PHP_EOL,$task['PN']);
			$pn = implode(';', $arr);
			$task['PN'] = $pn;
		}
		$user = Auth::getUser ();
		if (isset ( $id ) && $id > 0) {
			// 查找相关的 pendissue , if isset delete or insert
			$num = $this->Lois_optModel->selectAllpeis ( $id, $pr_id );
			// update
			$result = $this->Lois_optModel->updatetask ( $id, $pr_id, $task, $user, $pending, $sta, count ( $num ),$c1,$c2);
			if ($result) {
				redirect ( 'opt/opt_create_task/index?pr_id=' . $pr_id );
			} else {
				$this->load->view ( 'opt/opt_create_task', $data );
			}
		} else {
			// add
			
			$id = $this->Lois_optModel->inserttask ( $task, $user, $pending, $sta, $pr_id ,$c1,$c2);
			if ($id > 0) {
				redirect ( 'opt/opt_create_task/index?pr_id=' . $pr_id );
			} else {
				$this->load->view ( 'opt/opt_create_task' );
			}
		}
	}
	public function svc_addtask() {

		$pending = isset ( $_POST ['pending'] ) ? $_POST ['pending'] : '';
		$sta = isset ( $_POST ['sta'] ) ? $_POST ['sta'] : '';
        $c1  = isset($_POST['c1'])?$_POST['c1']:'';
        $c2  = isset($_POST['c2'])?$_POST['c2']:'';
		$data ['id'] = $id = isset ( $_POST ['svc_id'] ) ? $_POST ['svc_id'] : '';
		$data ['pr_id'] = $pr_id = isset ( $_POST ['svc_pr_id'] ) ? $_POST ['svc_pr_id'] : '';
		$task = $_POST ['svc'];
		if(isset($task['PN']) && $task['PN']!='')
		{
			$arr = explode(PHP_EOL,$task['PN']);
			$pn = implode(';', $arr);
			$task['PN'] = $pn;
		}
		$user = Auth::getUser ();

		if (isset ( $id ) && $id > 0) {
			// 查找相关的 pendissue , if isset delete or insert
			$num = $this->Lois_svcModel->selectAllpeis ( $id, $pr_id );
			// update
			$result = $this->Lois_svcModel->updatetask ( $id, $pr_id, $task, $user, $pending, $sta, count ( $num ) ,$c1,$c2);
			if ($result) {
				redirect ( 'opt/opt_create_task/index?pr_id=' . $pr_id );
			} else {
				$this->load->view ( 'opt/opt_create_task', $data );
			}
		} else {
			// add
			
			$id = $this->Lois_svcModel->inserttask ( $task, $user, $pending, $sta, $pr_id ,$c1,$c2);
			if ($id > 0) {
				redirect ( 'opt/opt_create_task/index?pr_id=' . $pr_id );
			} else {
				$this->load->view ( 'opt/opt_create_task' );
			}
		}
	}
	
	public function comp_addtask() {

		$pending = isset ( $_POST ['pending'] ) ? $_POST ['pending'] : '';
		$sta = isset ( $_POST ['sta'] ) ? $_POST ['sta'] : '';
        $c1  = isset($_POST['c1'])?$_POST['c1']:'';
        $c2  = isset($_POST['c2'])?$_POST['c2']:'';
		$data ['id'] = $id = isset ( $_POST ['comp_id'] ) ? $_POST ['comp_id'] : '';
		$data ['pr_id'] = $pr_id = isset ( $_POST ['comp_pr_id'] ) ? $_POST ['comp_pr_id'] : '';
		$task = $_POST ['comp'];
		if(isset($task['PN']) && $task['PN']!='')
		{
			$arr = explode(PHP_EOL,$task['PN']);
			$pn = implode(';', $arr);
			$task['PN'] = $pn;
		}
        $task['file_path'] = $file  =$_FILES['file_path']['name'];
		$user = Auth::getUser ();

		if (isset ( $id ) && $id > 0) {
            $fn = isset($_POST['fn'])?$_POST['fn']:array();
            if($file!=""){
                $task['file_path'] = $file;
                $fal = $this->_toupload();

                if($fn !=array()){
                    array_push($fn,$file);
                    $task['file_path'] = json_encode($fn);
                }else{
                    $task['file_path'] = json_encode(array($file));
                }
            }else{
                $fal = true;
                if($fn !=array())$task['file_path'] = json_encode($fn);
                if($fn ==array()) $task['file_path'] = $file;
            }
			// 查找相关的 pendissue , if isset delete or insert
			$num = $this->Lois_compatibilityModel->selectAllpeis ( $id, $pr_id );
			// update
            if($fal) {
                $result = $this->Lois_compatibilityModel->updatetask($id, $pr_id, $task, $user, $pending, $sta, count($num),$c1,$c2);
            }
			if ($result) {
				redirect ( 'opt/opt_create_task/index?pr_id=' . $pr_id );
			} else {
				$this->load->view ( 'opt/opt_create_task', $data );
			}
		} else {
            if($file!=""){
                $fal = $this->_toupload();
                if($fal){
                    $arr = array($file);
                    $task['file_path'] = json_encode($arr);
                }
            }else{
                $task['file_path'] = $file;
            }
			// add
			$id = $this->Lois_compatibilityModel->inserttask ( $task, $user, $pending, $sta, $pr_id ,$c1,$c2);
			if ($id > 0) {
				redirect ( 'opt/opt_create_task/index?pr_id=' . $pr_id );
			} else {
				$this->load->view ( 'opt/opt_create_task' );
			}
		}
	}

    private function  _toupload(){

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|txt|doc|docx|xlsx|xls|ppt|pptx';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        return $this->upload->do_upload('file_path');
    }

    public function down_load(){

        $this->load->helper('download');
        $fname = $_GET['fname'];
        $data = file_get_contents("./uploads/".$fname); // ���ļ�����
        force_download($fname, $data);
    }

	public function toaddtask() {
		
		// $lois_opt = array ();
		// $lois_opt ['Deadline'] = $_POST ['Deadline'];
		// $lois_opt ['OPT_EOW'] = $_POST ['EOW'];
		// $lois_opt ['OPT_AD'] = $_POST ['AD'];
		// $lois_opt ['TASKR_DATE'] = $_POST ['Task_Received_Date'];
		// $lois_opt ['START_DATE'] = $_POST ['Start_Processing_Date'];
		// $lois_opt ['DRR_DATE'] = $_POST ['DRR_Date'];
		// $lois_opt ['CK_DRR_DATE'] = $_POST ['Checked_DRR_Received'];
		// $lois_opt ['COMPLETE_DATE'] = $_POST ['Complete_Date'];
		// $lois_opt ['BU'] = $_POST ['BU'];
		// $lois_opt ['IAL_NO'] = $_POST ['IAL'];
		// // $lois_opt['IAL_Status']=$_POST['IAL_Status'];
		// // $lois_opt['IAL_Name']=$_POST['IAL_Name'];
		// $lois_opt ['VERSION'] = $_POST ['Version'];
		// $lois_opt ['Type'] = $_POST ['Type'];
		// $lois_opt ['MODELCOUNT'] = $_POST ['Model_Count'];
		
		// // user
		// // REQUESTER
		
		// // $lois_opt['Data_Specialist']=$_POST['Data_Specialist'];
		// // $lois_opt['Reviewed_By']=$_POST['Reviewed_By'];
		// $lois_opt ['STATUS'] = $_POST ['Status'];
		// // $lois_opt['Pending_Issue']=$_POST['Pending_Issue'];
		// $lois_opt ['IMG'] = $_POST ['IMG'];
		// $lois_opt ['OWNER'] = $_POST ['Owner'];
		// $lois_opt ['PN'] = $_POST ['PN'];
		// $lois_opt ['new_element_name'] = $_POST ['new_element_name'];
		// // $lois_opt['Loadsheet']=$_POST['Loadsheet'];
		// // $lois_opt['Submitter']=$_POST['Submitter'];
		
		// $lois_svc = array ();
		// $lois_svc ['Deadline'] = $_POST ['Deadline'];
		// $lois_svc ['EOW'] = $_POST ['EOW'];
		// $lois_svc ['AD'] = $_POST ['AD'];
		// $lois_svc ['TASKR_DATE'] = $_POST ['Task_Received_Date'];
		// $lois_svc ['START_DATE'] = $_POST ['Start_Processing_Date'];
		// $lois_svc ['COMPLETE_DATE'] = $_POST ['Complete_Date'];
		// $lois_svc ['Type'] = $_POST ['Type'];
		// $lois_svc ['MODEL_COUNT'] = $_POST ['Model_Count'];
		// // user
		
		// $lois_svc ['STATUS'] = $_POST ['Status'];
		// $lois_svc ['OWNER'] = $_POST ['Owner'];
		// $lois_svc ['new_element_name'] = $_POST ['new_element_name'];
		// $lois_svc ['Loadsheet'] = $_POST ['Loadsheet'];
		// $lois_svc ['Submitter'] = $_POST ['Submitter'];
		
		// $lois_cpt=array();
		// $lois_cpt['TASKR_DATE']=$_POST['Task_Received_Date'];
		// $lois_cpt['START_DATE']=$_POST['Start_Processing_Date'];
		// $lois_cpt['COMPLETE_DATE']=$_POST['Complete_Date'];
		// $lois_cpt['Deadline']=$_POST['Deadline'];
		// //REQUESTER
		// //USER
		// $lois_cpt['BU']=$_POST['BU'];
		// // $lois_cpt['IAL']=$_POST['IAL'];
		// // $lois_cpt['IAL_Status']=$_POST['IAL_Status'];
		// // $lois_cpt['IAL_Name']=$_POST['IAL_Name'];
		// // $lois_cpt['Version']=$_POST['Version'];
		// // $lois_cpt['Type']=$_POST['Type'];
		// $lois_cpt['MODELCOUNT']=$_POST['Model_Count'];
		// // $lois_cpt['Data_Specialist']=$_POST['Data_Specialist'];
		// // $lois_cpt['Reviewed_By']=$_POST['Reviewed_By'];
		// // $lois_cpt['Status']=$_POST['Status'];
		// // $lois_cpt['Pending_Issue']=$_POST['Pending_Issue'];
		// // $lois_cpt['IMG']=$_POST['IMG'];
		// $lois_cpt['Owner']=$_POST['Owner'];
		// $lois_cpt['PN']=$_POST['PN'];
		// // $lois_cpt['new_element_name']=$_POST['new_element_name'];
		// $lois_cpt['LOADSHEET']=$_POST['Loadsheet'];
		// // $lois_cpt['Submitter']=$_POST['Submitter'];
		$data ['id'] = $id = $_POST ['optid'];
		$data_post = $_POST;
		unset ( $data_post ['Data_Specialist'] );
		unset ( $data_post ['Pending_Issue'] );
		
		if (isset ( $id ) && $id > 0) {
			// update
			$this->db->trans_start ();
			
			$this->Lois_optModel->updatetask ( $id, $data_post );
			
			$this->db->trans_complete ();
			
			if ($this->db->trans_status () === FALSE) {
				redirect ( 'task/addtask/index' );
			} else {
				$this->load->view ( 'task/addtask', $data_post );
			}
		} else {
			// add
			// $this->db->trans_start ();
			$insert_id = $this->Lois_optModel->inserttask ( $data_post );
			// $this->db->trans_complete ();
			if ($insert_id) {
				redirect ( 'opt/opt_create_task/task' );
			} else {
				$this->load->view ( 'opt/opt_create_task' );
			}
		}
	}
}
