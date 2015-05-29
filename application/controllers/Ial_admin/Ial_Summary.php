<?php
class Ial_Summary extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('ial/admin/Ial_Summary_model');
        Auth::execute_auth();
    }

    function index(){
        $data['summary'] = $this->Ial_Summary_model->selectAllSummary();
        $this->load->view('ial/admin/summary/summarylist',$data);
    }
    function addSummary(){
        $data['id'] = $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $data['summary'] = $this->Ial_Summary_model->selectoneByid($id);
        $this->load->view('ial/admin/summary/addsummary',$data);
    }

    function toaddSummary(){
        $id = isset($_POST['id'])?$_POST['id']:0;
        $summary = $_POST['summary'];
        $arr['summary'] = $summary;
        if($id>0){
            $res = $this->Ial_Summary_model->updateSummary($id,$arr);
        }else{
            $res = $this->Ial_Summary_model->insertSummary($arr);
        }
        if($res){
            redirect('ial_admin/ial_Summary');
        }else{
            if($id>0){
                $this->load->view('ial/admin/summary/addsummary?id='.$id);
            }else{
                $this->load->view('ial/admin/summary/addsummary');
            }
        }
    }

    function deletestatus(){
        $id = $_GET['id'];
        $res = $this->Ial_Summary_model->insertSummary($id);
        redirect('ial/admin/summary');
    }
}