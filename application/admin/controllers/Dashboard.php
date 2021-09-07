<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
			$this->is_not_logged_in();
			$this->load->model('subject_model');
			$this->load->model('books_model');
			$this->load->model('author_model');
			$this->load->model('narrator_model');
	}
	function is_not_logged_in(){
		$is_logged_in = $this->session->userdata('rcc_admin_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login');
		}				
	}
	
	public function index(){
		$data['sub'] = $this->books_model->selectAllActive();
		$data['authors'] = $this->author_model->selectAllActive();
		$data['narrator'] = $this->narrator_model->selectAllActive();
		$data['main_content2']='dashboard';	
		$this->load->view('template2/body',$data);
			
	}
}
?>