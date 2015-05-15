<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class create_relayware extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'ial/IAL_common_model', 'icm' );
		$this->load->model ( 'ial/ial_relayware_model', 'ial_relayware_model' );
		Auth::execute_auth ();
	}
	public function index() {
		$data ['pr_id'] = $pr_id = isset ( $_GET ['pr_id'] ) ? $_GET ['pr_id'] : 0;
		$data ['task'] = $this->ial_relayware_model->selectAllTask ();
		$this->load->view ( 'ial/relayware/task_list', $data );
	}
	public function task() {
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : 0;
		$data ['pr_id'] = $pr_id = isset ( $_GET ['pr_id'] ) ? $_GET ['pr_id'] : 0;
		$data ['w'] = 'www';
		$data ['status'] = $this->icm->get_ial_status ();
		$data ['category1'] = $this->icm->ialcommoncategory ();
		$data ['category2'] = $this->icm->ialcommoncategory2 ( $data ['category1'] [0] ['id'] );
		$data ['Brand'] = $this->icm->select_ial_brand ();
		$data ['Status'] = $this->icm->get_ial_status ();
		$pen = $data ['pen'] = $this->icm->selectAllIalPen ( $id, 'relayware' );
		$data ['hist'] = $this->icm->selectAllIALhistory ( $id, 'relayware' );
		$c1id = $this->icm->selectbyid ( $id, 'ial' );
		
		$data ['pr_id'] = $pr_id = isset ( $_GET ['pr_id'] ) ? $_GET ['pr_id'] : 0;
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : 0;
		$data ['task'] ['Upload_Date'] = date("Y/m/d");
		if (isset ( $id ) && $id > 0) {
			// ////////////
			$c1id = $this->icm->selectbyid ( $id, 'relayware' );
			if ($c1id != array ()) {
				foreach ( $c1id as $key ) {
					$ca1_id = $key ['ca1_id'];
					$d = $this->icm->selectc2byc1id ( $ca1_id );
					$data ['c'] [] = $this->icm->selectc2byc1id ( $ca1_id );
				}
			}
			$data ['id'] = $id;
			$data ['task'] = $this->ial_relayware_model->selectbyid ( $id );
			$val = $data ['task'] ['Comment'];
			if ($val != "") {
				$Comment = explode ( ";", $val );
				$data ['task'] ['Comment'] = implode ( PHP_EOL, $Comment );
			}
		}

		$this->load->view ( 'ial/relayware/task_create', $data );
	}
	public function toaddtask() {

		$pending = isset ( $_POST ['pending'] ) ? $_POST ['pending'] : '';
		$sta = isset ( $_POST ['sta'] ) ? $_POST ['sta'] : '';
		$c1 = isset ( $_POST ['c1'] ) ? $_POST ['c1'] : '';
		$c2 = isset ( $_POST ['c2'] ) ? $_POST ['c2'] : '';
		
		$data ['id'] = $id = isset ( $_POST ['id'] ) ? $_POST ['id'] : '';
		$data ['pr_id'] = $pr_id = isset ( $_POST ['pr_id'] ) ? $_POST ['pr_id'] : '';
		$task = $_POST ['task'];
		$user = Auth::getUser ();
		if (isset ( $task ['Comment'] ) && $task ['Comment'] != '') {
			$arr = explode ( PHP_EOL, $task ['Comment'] );
			$pn = implode ( ';', $arr );
			$task ['Comment'] = $pn;
		}
		if ($id > 0) {
			// update
			$num = $this->ial_relayware_model->selectAllpeis ( $id, $pr_id );
			$db_states = $this->ial_relayware_model->updatetask ( $id, $task, $pr_id, $user, $pending, $sta, count ( $num ), $c1, $c2 );
			
			if ($db_states === FALSE) {
				redirect ( 'ial/create_relayware/task' );
			} else {
				redirect ( 'ial/create_relayware/index?pr_id=' . $pr_id );
			}
		} else {
			// add
			
			$db_states = $this->ial_relayware_model->inserttask ( $task, $user, $pending, $sta, $pr_id, $c1, $c2 );
			if ($db_states === FALSE) {
				redirect ( 'ial/create_relayware/task' );
			} else {
				redirect ( 'ial/create_relayware/index?pr_id=' . $pr_id );
			}
		}
	}
}