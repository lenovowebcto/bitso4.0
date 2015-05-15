<?php

class ArchiveModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function selectAllTis(){
		$this->db->select('t.Ticket_id,t.ProblemSummary,t.Author,t.PersonReported,t.AssignTo,
				t.DataArea,t.Severity,t.DateReported,t.FileID');
		$this->db->from('old_tickets t');
		return $this->db->get()->result_array();
	}
	function selectOneByTicketid($Ticket_id,$fileid){
		
		// 先判断是否有fileid  若不存在则不联查，否则连查表
		if($fileid>0){
			$this->db->where('t.Ticket_id',$Ticket_id);
			$this->db->select('t.*,f.FileName');
			$this->db->from('old_tickets t');
			$this->db->join('files f','t.FileID=f.FileID');
			return $this->db->get()->row_array();
		}else{
			$this->db->where('t.Ticket_id',$Ticket_id);
			$this->db->select('t.*');
			$this->db->from('old_tickets t');
			return $this->db->get()->row_array();
		}
	}
}