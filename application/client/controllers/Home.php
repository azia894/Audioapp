<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
			
			$this->load->model('home_model');
	}
	
	public function index(){
		$data['home'] = $this->home_model->selectAll();
		$data['main_content']='home';	
		$this->load->view('template/body',$data);	
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
			redirect('home');
		}	
	}
	

	

}
?>