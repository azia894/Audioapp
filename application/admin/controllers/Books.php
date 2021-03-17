<?php
class Books extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		$this->is_not_logged_in();
		 $this->load->model('author_model');
         $this->load->model('books_model');
         $this->load->model('subject_model');
		  $this->load->library('datatbl');
	 }
	 
	 function index(){
		 //$data['get_data'] = $this->author_model->selectAll();
		 $data['main_content2'] = 'books_list';		 
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
        $data['get_data'] = $this->author_model->selectAll();
        $data['get_sub'] = $this->subject_model->selectAll();
		 $data['main_content2'] = 'add_books';
		 $this->load->view('template2/body',$data);
	 }
	 

	 function create(){
		
		extract($_POST);
		/*echo "<pre>";
		print_r($_FILES);
		print_r($_POST);*/
		$status=0;
		$msg='';
		$res = $this->books_model->getDetailsByName($this->input->post('bk_name'));
		if($res['num']>0){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>"'.$this->input->post('bk_name').'" Book Name already exists</strong>
			</div>' ;
			}else if($this->input->post('bk_name')=='' ){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter book name</strong>
			</div>' ;
			}else if($this->input->post('bk_desc')=='' ){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter  description</strong>
			</div>' ;
			}else{	
			$insert_data = array(
                'author_id'=>$this->input->post('author_id'),
                'sub_id'=>$this->input->post('sub_id'),	
				'bk_name'=>$this->input->post('bk_name'),
				'bk_desc'=>$this->input->post('bk_desc'),
				'bk_status'=>1,	
                'created_on'=>date('Y-m-d H:i:s'),							
			);
			if(isset($_FILES['up']) && !empty($_FILES) && $_FILES['up']['name']!=""){		
						$fileTypes = array('jpeg','jpg','png','gif');
						$trgt='assets/bookimages/';
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
							$insert_data['bk_img']=$file;
							move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 
							
						 }
					 }
			$q = $this->books_model->create($insert_data);
			if($q){		
	            $status=1;			
				 $msg='<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Book Created Successfully!!</strong>
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
	
	 function getBooksAll(){
		$column = array('id','bk_name','created_on','bk_status','bk_img');
		$order = array('id' => 'desc');
		$join = array();
		$where="id!=''";
		$tb_name = 'aud_booktbl';
		$list = $this->datatbl->get_datatables($column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $req) {
			$edit='';
            $ch='<a href="'.base_url('chapter/list/'.$req->id).'"<button type="button" class="btn btn-primary">View Chapters</button>';
			$img='<img src="'.base_url('assets/bookimages/'.$req->bk_img).'" alt="image" class="img-responsive thumb-md">';
			$status = ($req->bk_status==1)?'<a href="'.base_url('books/deactive/'.$req->id).'"<span class="label label-success">Active</span>':'<a href="'.base_url('books/active/'.$req->id).'"<span class="label label-pink">In-Active</span>';
			$no++;
			$row = array();
			$row[] = $req->id;
			$row[] = $req->bk_name;
            $row[] = $ch;
			$row[] = $img;
			$row[] = $req->created_on;
			$row[] = $edit.'&nbsp;'.'<a href="'.base_url('books/del/'.$req->id).'" class="label label-danger" md-ink-ripple="">Delete</a>';
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
		$bd = $this->books_model->getDetails($id);
		if($bd['num']==1){	
			if($bd['data'][0]['bk_img']!=""){
				unlink('assets/bookimages/'.$bd['data'][0]['bk_img']);
			}
			$this->books_model->del($id);
			$this->session->set_flashdata('success','"'.$bd['data']['0']['bk_name'].'" books Deleted Successfully');
			redirect('books');			
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('books');
		}
	}
	
	
	
	function active(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['bk_status'] = '1';        
			 $this->books_model->actived($update_data,$id);
			  $this->session->set_flashdata('success', 'Activated Successfully');
			 redirect('books');
	 }
	 function deactive(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['bk_status'] = '0';        
			 $this->books_model->inactived($update_data,$id);
			  $this->session->set_flashdata('success', 'Deactivated Successfully');
			 redirect('books');
	 }
	
	}
