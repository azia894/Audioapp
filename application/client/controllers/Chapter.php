<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter extends CI_Controller {
	public function __construct(){
		parent::__construct();
			
			$this->load->model('home_model');
			
	}

    public function view(){
		$id=$this->uri->segment('3');
		$sd=$this->home_model->getDetails($id);
		if($sd['num']==1){
			$data['getdata'] = $this->home_model->chapter($id);
			$data['record'] = $sd['data'][0];
			$data['main_content']='view';	
			$data['title']= 'Dil ki Awaz';
			$this->load->view('template/body',$data);
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('home');
		}	
	}

}    
