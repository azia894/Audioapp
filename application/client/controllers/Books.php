<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
	public function __construct(){
		parent::__construct();
			
			$this->load->model('books_model');
            $this->load->model('home_model');
            $this->load->library('Ajax_pagination');
            $this->perPage = 10;
	}

    public function index(){
        $data = array();
        
        //total rows count
        $totalRec = count($this->books_model->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'books/bookspagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->books_model->getRows(array('limit'=>$this->perPage));
        
        //load the view
        $data['main_content']='books';
        $this->load->view('template/body', $data);
    }
    
    function bookspagination(){
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = count($this->books_model->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'books/bookspagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->books_model->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        //$data['main_content']='ajax-pagination-data';
        //$this->load->view('template/body', $data, false);
        $this->load->view('posts/bookspagination', $data, false);
    }

    public function view(){
		$id=$this->uri->segment('3');
		$sd=$this->home_model->getDetails($id);
		if($sd['num']==1){
			$data['getdata'] = $this->home_model->chapter($id);
			$data['record'] = $sd['data'][0];
			$data['main_content']='view';	
		$this->load->view('template/body',$data);
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('books');
		}	
	}
	
	
}

	