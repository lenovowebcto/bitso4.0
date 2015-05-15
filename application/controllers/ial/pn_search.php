<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class pn_search extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
        $this->load->model('ial/Pn_model','pn');
		$this->load->model('ial/Ial_bpl_model','ial_bpl');
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
//            $pn = ';'.$pn.';';
            $data['pn'] = $this->pn->search_pn($pn);
            $data['ial_bpl'] = $this->ial_bpl->search_pn($pn);
            $data['count'] = count($data['pn'])+count($data['ial_bpl']);
            $data['pn'] = $pn;
            $this->load->view('ial/pn_search/pn_search',$data);
        }
        else{
            $data['count']=0;
            $this->load->view('ial/pn_search/pn_search',$data);
        }
    }
}