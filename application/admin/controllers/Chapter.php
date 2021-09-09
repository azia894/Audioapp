<?php
class Chapter extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		$this->is_not_logged_in();
		 $this->load->model('narrator_model');
         $this->load->model('books_model');
         $this->load->model('chapter_model');
		  $this->load->library('datatbl');
	 }
	 
	 function index(){
        
		 //$data['get_data'] = $this->chapter_model->selectAll();
		 $data['main_content2'] = 'chapter_list';		 
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
        $data['get_data'] = $this->narrator_model->selectAllActive();
        $data['get_sub'] = $this->books_model->selectAll();
		 $data['main_content2'] = 'add_chapter';
		 $this->load->view('template2/body',$data);
	 }
	 

	 function create(){
		
		extract($_POST);
		/*echo "<pre>";
		print_r($_FILES);
		print_r($_POST);*/
		$status=0;
		$msg='';
		$res = $this->chapter_model->getDetailsByName($this->input->post('ch_name'));
		if($res['num']>0){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>"'.$this->input->post('ch_name').'" Chapter already exists</strong>
			</div>' ;
			}else if($this->input->post('ch_name')== ""){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter Chapter name</strong>
			</div>' ;
			}else{	
			$insert_data = array(
				'bid'=>$this->input->post('bid'),
				'nar_id'=>$this->input->post('nar_id'),		
				'ch_name'=>$this->input->post('ch_name'),
				'ch_duration'=> $this->input->post('ch_audio_duration'),
				'ch_audio'=> $this->input->post('ch_audio'),
				'ch_status'=>1,	
                'created_on'=>date('Y-m-d H:i:s'),							
			);
			// if(isset($_FILES['up']) && !empty($_FILES) && $_FILES['up']['name']!=""){		
			// 			$fileTypes = array('mp3','mpeg','mp4');
			// 			$trgt='assets/chapterimages/';
			// 			$size = $_FILES['up']['size'];
			// 			$file_name = $_FILES['up']['name'];
			// 			$path_parts=pathinfo($_FILES['up']['name']);
			// 			if(!in_array($path_parts['extension'],$fileTypes)){
			// 				$msg='<div class="alert alert-warning">
			// 						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			// 						  <strong>Only jpg,png are allowed</strong>
			// 						</div>' ;
			// 			 }else{
			// 				$file = time().'.'.$path_parts['extension'];
			// 				$insert_data['ch_audio']=$file;
			// 				move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file); 							
			// 			 }
			// 		 }
			$q = $this->chapter_model->create($insert_data);
			// echo $q; exit;
			if($q){		
	            $status=1;			
				 $msg='<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Chapter Created Successfully!!</strong>
						</div>' ;
			}else{
				 $msg='<div class="alert alert-warning">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Unable To Create, Try Again !!</strong>
						</div>' ;
			}
		 }
		 $msg .= '<script>document.getElementById("spinner").innerHTML = "";</script>';
		 $res = array('status'=>$status,'msg'=>$msg);
		echo json_encode($res); exit;
	}
	
	 function getChapterAll(){
         
		$column = array('id','ch_name','created_on','ch_status','ch_audio');
		$order = array('id' => 'desc');
		$join = array();
		$where = "id!=''";
		$tb_name = 'aud_chapter';
		$list = $this->datatbl->get_datatables($column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $req) {
			$edit='&nbsp;&nbsp;<a href="'.base_url('chapter/edit/'.$req->id).'" class="label label-info" md-ink-ripple="">Edit</a>';
			$img='<audio controls>
            <source src="'.$req->ch_audio.'" type="audio/ogg">
            <source src="'.$req->ch_audio.'" type="audio/mpeg">
          Your browser does not support the audio element.
          </audio>';
			$status = ($req->ch_status==1)?'<a href="'.base_url('Chapter/deactivech/'.$req->id).'"<span class="label label-success">Active</span>':'<a href="'.base_url('Chapter/activech/'.$req->id).'"<span class="label label-pink">In-Active</span>';
			$delete = '<a href="'.base_url('Chapter/del/'.$req->id).'"<span class="label label-success">Delete</span>';
			$no++;
			$row = array();
			$row[] = $req->id;
			$row[] = $req->ch_name;
			$row[] = $img;
			$row[] = $req->created_on;
			$row[] = $edit;
			//$row[] = $edit.'&nbsp;'.'<a href="'.base_url('Chapter/del/'.$req->id).'" class="label label-danger" md-ink-ripple="">Delete</a>';
			$row[] = $status;
			$row[] = $delete;
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
	

    function list(){
        $id=$this->uri->segment('3');
        $data['ch_view'] = $this->chapter_model->selectAllch($id);
        $data['main_content2'] = 'chapter_view';		 
        $this->load->view('template2/body',$data);
             
    }

	function edit(){
		$bid = $this->uri->segment('3');
		$id = $this->uri->segment('4');
		$bd = $this->chapter_model->getDetails($id);
		if($bd['num']==1){
			$data['get_data'] = $this->narrator_model->selectAllActive();
			$data['get_sub'] = $this->books_model->selectAll();
			$data['record'] = $bd['data'][0];
			$data['main_content2'] = 'edit_chapter';		 
			$this->load->view('template2/body',$data);
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('Chapter/list/'.$bid);
		}
	}

	function modify(){
		extract($_POST);
		 $status=0;
		 $msg='';
		 $bid = $this->uri->segment('3');
		 $id = $this->uri->segment('4');
		 $bd = $this->chapter_model->getDetails($id);
		 if($bd['num']==1){
		 	$res = $this->chapter_model->getDetailsByName($this->input->post('ch_name'));
			$temp = $res['data'];
			// print_r($temp);
			// echo $temp[0]['id'];
			if($res['num']>0 && $temp[0]['id'] != $id){
				$msg='<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>"'.$this->input->post('ch_name').'" Chapter name already exists</strong>
				</div>' ;	 

			}else if($this->input->post('ch_name')==''){
			   $msg='<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			   <strong>Please enter Chapter Name</strong>
				</div>' ;
				}else{
					$update_data = array();
					$update_data = array(
						'nar_id'=>addslashes($this->input->post('nar_id')),
					);
				   	if($res['num']==0){
						$update_data['ch_name'] = addslashes($this->input->post('ch_name')); 
				  	}
					if($this->input->post('ch_name') != ''){
						$update_data['ch_audio']=addslashes($this->input->post('ch_audio'));
					}
				  $q = $this->chapter_model->modify($update_data,$id);
				  if($q){
				 $status=1;
				// $this->session->set_flashdata('success','Page Updated successfully!!!!');
				$msg='<div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Chapter Updated Successfully</strong></div>';	 
				 
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
		echo "<script type='text/javascript'>if(confirm('Want to delete')){window.location.href ='".base_url('books/delete/'.$this->uri->segment('3'))."' }else {window.location.href ='".base_url('books/')."'}</script>";
	}
	
	function delete(){
		$id = $this->uri->segment('3');
		$bd = $this->chapter_model->getDetails($id);
		if($bd['num']==1){	
			if($bd['data'][0]['ch_audio']!=""){
				unlink('assets/chapteraudios/'.$bd['data'][0]['ch_audio']);
			}
			$this->chapter_model->del($id);
			$this->session->set_flashdata('success','"'.$bd['data']['0']['ch_name'].'" Chapter Deleted Successfully');
			redirect('chapter');			
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('chapter');
		}
	}
	
	function active(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['ch_status'] = '1';        
			 $this->chapter_model->actived($update_data,$id);
			  $this->session->set_flashdata('success', 'Activated Successfully');
			 redirect('chapter');
	 }
	 function deactive(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['ch_status'] = '0';        
			 $this->chapter_model->inactived($update_data,$id);
			  $this->session->set_flashdata('success', 'Deactivated Successfully');
			 redirect('chapter');
	 }

     function chdel(){
        $bid = $this->uri->segment('3');
        $id = $this->uri->segment('4');
		$cd = $this->chapter_model->getDetails($id);
		if($cd['num']==1){			 
			
			$this->chapter_model->del($id);
			$this->session->set_flashdata('success','Chapter deleted successfully');
			redirect('Chapter/list/'.$bid);
			
		}else{
			$this->session->set_flashdata('invalid','invalid request');
			redirect('Chapter/list/'.$bid);
		}
	}
   
    function activech(){
        $bid = $this->uri->segment('3');
       $id = $this->uri->segment('4');
           $update_data = array();
             $update_data['ch_status'] = '1';        
            $this->chapter_model->actived($update_data,$id);
             $this->session->set_flashdata('success', 'Activated Successfully');
            redirect('Chapter/list/'.$bid);
    }
    function deactivech(){
        $bid = $this->uri->segment('3');
       $id = $this->uri->segment('4');
           $update_data = array();
             $update_data['ch_status'] = '0';        
            $this->chapter_model->inactived($update_data,$id);
             $this->session->set_flashdata('success', 'Deactivated Successfully');
            redirect('Chapter/list/'.$bid);
    }
	
	}
