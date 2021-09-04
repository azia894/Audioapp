<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authors extends CI_Controller {
	public function __construct(){
		parent::__construct();
			
			$this->load->model('authors_model');
            $this->load->library('Ajax_pagination');
            $this->perPage = 10;
	}

    public function index(){
        $data = array();
        
        //total rows count
        $q = $this->authors_model->getRows();
        if($q){
            $totalRec = count($this->authors_model->getRows());
        } else{
            $totalRec = 0;
        }
            
            //pagination configuration
            $config['target']      = '#postList';
            $config['base_url']    = base_url().'authors/ajaxPaginationData';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->authors_model->getRows(array('limit'=>$this->perPage));
        
        //load the view
        $data['main_content']='authors';
        $this->load->view('template/body', $data);
    }
    
    function ajaxPaginationData(){
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->authors_model->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'authors/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->authors_model->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        //$data['main_content']='ajax-pagination-data';
        //$this->load->view('template/body', $data, false);
        $this->load->view('posts/ajax-pagination-data', $data, false);
    }

    public function view(){
		$id = $this->uri->segment('3');
		$sd =  $this->authors_model->getDetails($id);
		if($sd['num']==1){
			$data['getdata'] = $this->authors_model->bookslist($id);
			$data['record'] = $sd['data'][0];
			$data['main_content']='authorsview';	
		$this->load->view('template/body',$data);
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('authors');
		}	
	}
}

	