<?php
class Author extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		$this->is_not_logged_in();
		 $this->load->model('author_model');
		  $this->load->library('datatbl');
	 }
	 
	 function index(){
		 //$data['get_data'] = $this->author_model->selectAll();
		 $data['main_content2'] = 'author_list';		 
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
		 $data['main_content2'] = 'add_author';
		 $this->load->view('template2/body',$data);
	 }
	 

	 function create(){
		
		extract($_POST);
		/*echo "<pre>";
		print_r($_FILES);
		print_r($_POST);*/
		$status=0;
		$msg='';
		$res = $this->author_model->getDetailsByName($this->input->post('aut_name'));
		if($res['num']>0){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>"'.$this->input->post('aut_name').'" Author already exists</strong>
			</div>' ;
			}else if($this->input->post('aut_name')=='' ){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter author name</strong>
			</div>' ;
			}else if($this->input->post('aut_desc')=='' ){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter  description</strong>
			</div>' ;
			}else{	
			$insert_data = array(	
				'aut_name'=>$this->input->post('aut_name'),
				'aut_desc'=>$this->input->post('aut_desc'),
				'aut_status'=>1,	
                'created_on'=>date('Y-m-d H:i:s'),							
			);
			if(isset($_FILES['up']) && !empty($_FILES) && $_FILES['up']['name']!=""){		
						$fileTypes = array('jpeg','jpg','png','gif');
						$trgt='assets/authorimages/';
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
							$insert_data['aut_img']=$file;
							move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
							
						 }
					 }
			$q = $this->author_model->create($insert_data);
			if($q){		
	            $status=1;			
				 $msg='<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>author Created Successfully!!</strong>
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
	
	 function getAuthorAll(){
		$column = array('id','aut_name','created_on','aut_status','aut_img');
		$order = array('id' => 'desc');
		$join = array();
		$where="id!=''";
		$tb_name = 'aud_author';
		$list = $this->datatbl->get_datatables($column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $req) {
			$edit='';
			$img='<img src="'.base_url('assets/authorimages/'.$req->aut_img).'" alt="image" class="img-responsive thumb-md">';
			$status = ($req->aut_status==1)?'<a href="'.base_url('author/deactive/'.$req->id).'"<span class="label label-success">Active</span>':'<a href="'.base_url('author/active/'.$req->id).'"<span class="label label-pink">In-Active</span>';
			$no++;
			$row = array();
			$row[] = $req->id;
			$row[] = $req->aut_name;
			$row[] = $img;
			$row[] = $req->created_on;
			$row[] = $edit.'&nbsp;'.'<a href="'.base_url('author/del/'.$req->id).'" class="label label-danger" md-ink-ripple="">Delete</a>';
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
	 

	
	 function del(){
		$id = $this->uri->segment('3');
		$bd = $this->author_model->getDetails($id);
		if($bd['num']==1){	
			if($bd['data'][0]['aut_img']!=""){
				unlink('assets/authorimages/'.$bd['data'][0]['aut_img']);
			}
			$this->author_model->del($id);
			$this->session->set_flashdata('success','"'.$bd['data']['0']['aut_name'].'" Author Deleted Successfully');
			redirect('author');			
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('author');
		}
	}
	
	
	
	function active(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['aut_status'] = '1';        
			 $this->author_model->actived($update_data,$id);
			  $this->session->set_flashdata('success', 'Activated Successfully');
			 redirect('author');
	 }
	 function deactive(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['aut_status'] = '0';        
			 $this->author_model->inactived($update_data,$id);
			  $this->session->set_flashdata('success', 'Deactivated Successfully');
			 redirect('author');
	 }
	
	}
