<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
			
			$this->load->model('home_model');
			$this->load->library('pagination'); 
	}
	
	public function index(){
		$config['base_url'] = base_url().'home/index';        

        $config['total_rows'] = $this->home_model->count_all_users();        

        $config['per_page'] = 50;        

        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';        

        $config['full_tag_close'] = '</ul>';        

        $config['first_link'] = 'First';        

        $config['last_link'] = 'Last';        

        $config['first_tag_open'] = '<li>';        

        $config['first_tag_close'] = '</li>';        

        $config['prev_link'] = '&laquo';        

        $config['prev_tag_open'] = '<li class="prev">';        

        $config['prev_tag_close'] = '</li>';        

        $config['next_link'] = '&raquo';        

        $config['next_tag_open'] = '<li>';        

        $config['next_tag_close'] = '</li>';        

        $config['last_tag_open'] = '<li>';        

        $config['last_tag_close'] = '</li>';        

        $config['cur_tag_open'] = '<li class="active"><a href="#">';        

        $config['cur_tag_close'] = '</a></li>';        

        $config['num_tag_open'] = '<li>';        

        $config['num_tag_close'] = '</li>';

        

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->pagination->initialize($config);        

        $data['links'] = $this->pagination->create_links();        
        
        $text = $this->input->get('search');
        
        $data['home'] = $this->home_model->get_users($config["per_page"], $page, $text);
		//$data['home'] = $this->home_model->selectAll();

		if($this->input->post('ajax')) {
			
            $this->load->view('Data', $data);
        } else {
			$data['main_content']='home';
            $this->load->view('template/body', $data);
        }
		//$data['main_content']='home';	
		//$this->load->view('template/body',$data);	
	}

	/*public function view(){
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
	}*/
	

	

}
?>