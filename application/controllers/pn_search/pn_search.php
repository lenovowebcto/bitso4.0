<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class pn_search extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
        $this->load->model ( 'Lois_optModel' );
        $this->load->model ( 'Lois_svcModel' );
        $this->load->model ( 'Lois_compatibilityModel' );
        $this->load->model ( 'Lois_ep_reqModel' );
        $this->load->model ( 'TaskModel' );
        Auth::execute_auth ();
    }

    function index(){
        $data= '';
        $this->load->view('pn_search/pn_search',$data);
    }

    function search(){
        $pn = $_POST['pn'];
        if($pn !=''){
//            $pn = ';'.$pn.';';
            $data['tic'] = $this->TaskModel->search_pn($pn);
            $data['com'] = $this->Lois_compatibilityModel->search_pn($pn);
            $data['req'] = $this->Lois_ep_reqModel->search_pn($pn);
            $data['opt'] = $this->Lois_optModel->search_pn($pn);
            $data['svc'] = $this->Lois_svcModel->search_pn($pn);
            $data['count'] = count($data['tic'])+count($data['com'])+count($data['req'])+count($data['opt'])+count($data['svc']);
            $data['pn'] = $pn;
            $this->load->view('pn_search/pn_search',$data);
        }
        else{
            $data['count']=0;
            $this->load->view('pn_search/pn_search',$data);
        }
    }
}