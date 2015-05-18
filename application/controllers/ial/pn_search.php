<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class pn_search extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
        $this->load->model('ial/Pn_model','pn');
		$this->load->model('ial/Ial_bpl_model','ial_bpl');
		$this->load->model('ial/ial_relayware_model','ial_relayware_model');
		$this->load->model('ial/task_model','task_model');
		$this->load->model('ial/IAL_common_model','icm');
        Auth::execute_auth ();
    }

    function index(){
        $data= '';
        $this->load->view('ial/pn_search/pn_search',$data);
    }

    function search(){
        $pn = $_POST['pn'];
        
        if($pn !=''){
        	$flag = str_split($pn, 3)[0];
        	if($flag == 'IAL'){
        		$data['ialtask'] = $this->task_model->searchIalNum($pn);
        		$data['ial_bpl'] = $this->ial_bpl->searchIalNum($pn);
        		$data['count'] = count($data['ialtask'])+count($data['ial_bpl']);
        	}elseif($flag == 'BPL'){
        		$data['ialtask'] = $this->task_model->searchBplNum($pn);
        		$data['ial_relayware'] = $this->ial_relayware_model->searchBplNum($pn);
        		$data['ial_bpl'] = $this->ial_bpl->searchBplNum($pn);
        		$data['count'] = count($data['ialtask'])+count($data['ial_relayware'])+count($data['ial_bpl']);
        	}else{
        		$data['ial_pn'] = $this->pn->search_pn($pn);
        		$data['count'] = count($data['ial_pn']);
        	}
//            $pn = ';'.$pn.';';
            $data['pn'] = $pn;
            
            $this->load->view('ial/pn_search/pn_search',$data);
        }else{
            $data['count']=0;
            $this->load->view('ial/pn_search/pn_search',$data);
        }
    }
}