<?php
class  Ial_Summary_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function insertSummary($brand){
        $fal = $this->db->insert('ial_common_summary',$brand);
        return $fal;
    }

    function selectAllSummary(){
        $res = $this->db->get('ial_common_summary')->result_array();
        return $res;
    }
    function selectoneByid($bid){
        $res = $this->db->from('ial_common_summary')->where('id',$bid)->get()->row_array();
        return $res;
    }

        function updateSummary($bid,$arr){
        $this->db->where('id',$bid);
        return  $this->db->update('ial_common_summary',$arr);
    }
    function deleteSummary($bid){
        $this->db->where('id',$bid);
        return $this->db->delete('ial_common_summary');
    }
}