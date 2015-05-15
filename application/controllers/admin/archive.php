<?php
class archive extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ArchiveModel');
		Auth::execute_auth();
	}
	
	function  alltickets(){
		$data['tickets'] = $this->ArchiveModel->selectAllTis();
		$this->load->view('ar/ticlist',$data);
	}
	
	function viewtickect(){
		$Ticket_id = isset($_GET['Ticket_id'])?$_GET['Ticket_id']:0;
		$fileid = isset($_GET['FileID'])?$_GET['FileID']:0;
		$data['tic'] = $this->ArchiveModel->selectOneByTicketid($Ticket_id,$fileid);
		$this->load->view('ar/viewticket',$data);
	}
}