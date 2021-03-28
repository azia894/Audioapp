<?php
class Narrator extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		$this->is_not_logged_in();
		 $this->load->model('narrator_model');
		  $this->load->library('datatbl');
	 }
	 
	 function index(){
		 //$data['get_data'] = $this->narrator_model->selectAll();
		 $data['main_content2'] = 'narrator_list';		 
		 $this->load->view('template2/body',$data);
		 	 
	 }
	 
	 function is_not_logged_in(){
		$is_logged_in = $this->session->userdata('rcc_admin_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login');			
		}				
	}
	
	
	 function add(){
		 $data['main_content2'] = 'add_narrator';
		 $this->load->view('template2/body',$data);
	 }
	 

	 function create(){
		
		extract($_POST);
		/*echo "<pre>";
		print_r($_FILES);
		print_r($_POST);*/
		$status=0;
		$msg='';
		$res = $this->narrator_model->getDetailsByName($this->input->post('nar_name'));
		if($res['num']>0){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>"'.$this->input->post('nar_name').'" Narrator already exists</strong>
			</div>' ;
			}else if($this->input->post('nar_name')=='' ){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter Narrator Name</strong>
			</div>' ;
			}else if($this->input->post('nar_desc')=='' ){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter description</strong>
			</div>' ;
			}else{	
			$insert_data = array(	
				'nar_name'=>$this->input->post('nar_name'),
				'gender'=>$this->input->post('gender'),
				'country'=>$this->input->post('country'),
				'city'=>$this->input->post('city'),
				'nar_desc'=>$this->input->post('nar_desc'),
				'nar_status'=>1,	
                'created_on'=>date('Y-m-d H:i:s'),							
			);
			if(isset($_FILES['up']) && !empty($_FILES) && $_FILES['up']['name']!=""){		
						$fileTypes = array('jpeg','jpg','png','gif');
						$trgt='assets/narratorimages/';
						$size = $_FILES['up']['size'];
						$file_name = $_FILES['up']['name'];
						$path_parts=pathinfo($_FILES['up']['name']);
						if(!in_array($path_parts['extension'],$fileTypes)){
							$msg='<div class="alert alert-warning">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <strong>Only jpg,png are allowed</strong>
									</div>' ;
						 }else{
							$file = time().'.'.$path_parts['extension'];
							$insert_data['nar_img']=$file;
							move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
							
						 }
					 }
			$q = $this->narrator_model->create($insert_data);
			if($q){		
	            $status=1;			
				 $msg='<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>narrator Created Successfully!!</strong>
						</div>' ;
			}else{
				 $msg='<div class="alert alert-warning">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Unable To Create, Try Again !!</strong>
						</div>' ;		
			}
		 }
		 $res = array('status'=>$status,'msg'=>$msg);
		echo json_encode($res); exit;
	}
	
	 function getNarratorAll(){
		$column = array('id','nar_name','created_on','nar_status','nar_img');
		$order = array('id' => 'desc');
		$join = array();
		$where="id!=''";
		$tb_name = 'aud_narrator';
		$list = $this->datatbl->get_datatables($column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $req) {
			$edit='&nbsp;&nbsp;<a href="'.base_url('narrator/edit/'.$req->id).'" class="label label-info" md-ink-ripple="">Edit</a>';
			$img='<img src="'.base_url('assets/narratorimages/'.$req->nar_img).'" alt="image" class="img-responsive thumb-md">';
			$status = ($req->nar_status==1)?'<a href="'.base_url('narrator/deactive/'.$req->id).'"<span class="label label-success">Active</span>':'<a href="'.base_url('narrator/active/'.$req->id).'"<span class="label label-pink">In-Active</span>';
			$no++;
			$row = array();
			$row[] = $req->id;
			$row[] = $req->nar_name;
			//$row[] = $img;
			$row[] = $req->created_on;
			$row[] = $edit;
			//$row[] = $edit.'&nbsp;'.'<a href="'.base_url('narrator/del/'.$req->id).'" class="label label-danger" md-ink-ripple="">Delete</a>';
			$row[] = $status;
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->datatbl->count_all($tb_name,$join,$where),
						"recordsFiltered" => $this->datatbl->count_filtered($column,$order,$tb_name,$join,$where),
						"data" => $data,
				);
		
		echo json_encode($output);
	}


	function edit(){
		$id = $this->uri->segment('3');
		$bd = $this->narrator_model->getDetails($id);
		if($bd['num']==1){			 			
			$data['record'] = $bd['data'][0];
			$data['main_content2'] = 'edit_narrator';		 
			$this->load->view('template2/body',$data);
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('narrator');
		}
	}

	function modify(){
		extract($_POST);
		 $status=0;
		 $msg='';
		 $id = $this->uri->segment('3');
		 $bd = $this->narrator_model->getDetails($id);
		 if($bd['num']==1){			
		 $res = $this->narrator_model->getDetailsByName($this->input->post('nar_name'));
		 if($this->input->post('nar_name')=='' ){
			   $msg='<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			   <strong>Please enter Author Name</strong>
			 </div>' ;
			 }else if($this->input->post('nar_desc')=='' ){
			   $msg='<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			   <strong>Please enter description</strong>
			 </div>' ;
			 }else{
				  $update_data = array();
				  $update_data = array(
					'gender'=>addslashes($this->input->post('gender')),
					'country'=>addslashes($this->input->post('country')),
					'city'=>addslashes($this->input->post('city')),
					 'nar_desc'=>addslashes($this->input->post('nar_desc')),
									
					 );
				   if($res['num']==0){
					 $update_data['nar_name'] = addslashes($this->input->post('nar_name')); 
				  }
				 if(!empty($_FILES) && $_FILES['up']['name']!=""){		
						 $fileTypes = array('jpeg','jpg','png','gif');
						 $trgt='assets/narratorimages/';
						 $size = $_FILES['up']['size'];
						 $file_name = $_FILES['up']['name'];
						 $path_parts=pathinfo($_FILES['up']['name']);
						 if(!in_array($path_parts['extension'],$fileTypes)){
							 $msg='<div class="alert alert-warning">
									   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Only jpg,png Images Are Allowed!!</strong>
									 </div>' ;
						  }else{
							 $file = time().'.'.$path_parts['extension'];
							 $update_data['nar_img']=$file;
							 move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
							 
						  }
					  }
				  $q = $this->narrator_model->modify($update_data,$id);
				  if($q){
				 $status=1;
				// $this->session->set_flashdata('success','Page Updated successfully!!!!');
				$msg='<div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Narrator Updated Successfully</strong></div>';	 
				 
					 }else{
							 $msg='<div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Please Try Again Later</strong></div>';	 		 	
					 }	
			  }
		 }else{
			 $msg='<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			   <strong>Warning!</strong>Invalid action</div>';
		 }
		 
		  $res = array('status'=>$status,'msg'=>$msg);
		 echo json_encode($res); exit;	
	 }
	 

	
	 function del(){
		$id = $this->uri->segment('3');
		$bd = $this->narrator_model->getDetails($id);
		if($bd['num']==1){	
			if($bd['data'][0]['nar_img']!=""){
				unlink('assets/narratorimages/'.$bd['data'][0]['nar_img']);
			}
			$this->narrator_model->del($id);
			$this->session->set_flashdata('success','"'.$bd['data']['0']['nar_name'].'" narrator Deleted Successfully');
			redirect('narrator');			
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('narrator');
		}
	}
	
	
	
	function active(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['nar_status'] = '1';        
			 $this->narrator_model->actived($update_data,$id);
			  $this->session->set_flashdata('success', 'Activated Successfully');
			 redirect('narrator');
	 }
	 function deactive(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['nar_status'] = '0';        
			 $this->narrator_model->inactived($update_data,$id);
			  $this->session->set_flashdata('success', 'Deactivated Successfully');
			 redirect('narrator');
	 }
	
	}
