<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {
	public function __construct(){
		parent::__construct();
			
			$this->load->model('subject_model');
            $this->load->library('Ajax_pagination');
           // $this->perPage = 1;
	}

    public function index(){
        /*$data = array();
        
        //total rows count
        $totalRec = count($this->Subject_model->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'subject/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->authors_model->getRows(array('limit'=>$this->perPage));
        
        //load the view*/
        $data['getdata'] = $this->subject_model->sublist();
        $data['main_content']='subject';
	$data['title']= 'Dil ki Awaz';
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
        $config['base_url']    = base_url().'subject/subPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->authors_model->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        $data['title']= 'Dil ki Awaz';
        //load the view
        //$data['main_content']='ajax-pagination-data';
        //$this->load->view('template/body', $data, false);
        $this->load->view('posts/ajax-pagination-data', $data, false);
    }

    public function category(){
		$id = $this->uri->segment('3');
        $data['getbk'] = $this->subject_model->catbklist($id);
		$data['main_content']='categorybooks';
		$data['title']= 'Dil ki Awaz';
        $this->load->view('template/body', $data);
	}
}

	
