<?php
class Review extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		 $this->is_not_logged_in();
		 $this->load->model('review_model');
		 $this->load->library('datatbl');
	 }
	 
	 function index(){
		// $data['get_data'] = $this->coffee_model->selectAll();
		 $data['main_content2'] = 'review_list';		 
		 $this->load->view('template2/body',$data);
		 	 
	 }
	 
	 function getReviewAll(){
		$column = array('id','uid','bid','review','created_on','status');
		$order = array('id' => 'desc');
		$join = array();
		$where="id!=''";
		$tb_name = 'aud_review';
		$list = $this->datatbl->get_datatables($column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $_POST['start'];
		$i=1;
		foreach ($list as $req) {
			
			$status = ($req->status==1)?'<a href="'.base_url('review/deactive/'.$req->id).'"<span class="label label-success">Active</span>':'<a href="'.base_url('review/active/'.$req->id).'"<span class="label label-pink">In-Active</span>';
			$no++;
			$row = array();
			$row[] = $i;
			$row[] = $req->bid;
            $row[] = $req->uid;
			$row[] = $req->review;
			
			$row[] = $req->created_on;
			//$row[] = $edit.'&nbsp;'.'<a href="'.base_url('subject/del/'.$req->id).'" class="label label-danger" md-ink-ripple="">Delete</a>';
			
			$row[] = $status;
			$data[] = $row;
			$i++;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->datatbl->count_all($tb_name,$join,$where),
						"recordsFiltered" => $this->datatbl->count_filtered($column,$order,$tb_name,$join,$where),
						"data" => $data,
				);
		
		echo json_encode($output);
	}
	 
	 function is_not_logged_in(){
		$is_logged_in = $this->session->userdata('rcc_admin_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login');			
		}				
	}
	

	
	 function del(){
		$id = $this->uri->segment('3');
		$cd = $this->review_model->getDetails($id);
		if($cd['num']==1){	
			
			$this->review_model->del($id);
			$this->session->set_flashdata('success','"'.$cd['data']['0']['sub_name'].'" Genre Deleted Successfully');
			redirect('review');			
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('review');
		}
	}

	function active(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['status'] = '1';        
			 $this->review_model->actived($update_data,$id);
			  $this->session->set_flashdata('success', 'Activated Successfully');
			 redirect('review');
	 }
	 function deactive(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['status'] = '0';        
			 $this->review_model->inactived($update_data,$id);
			  $this->session->set_flashdata('success', 'Deactivated Successfully');
			 redirect('review');
	 }
	
	
}