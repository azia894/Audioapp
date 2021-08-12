<?php
class Subject extends CI_Controller{
	
	 public function __construct(){
		 parent::__construct();
		 $this->is_not_logged_in();
		 $this->load->model('subject_model');
		 $this->load->library('datatbl');
	 }
	 
	 function index(){
		// $data['get_data'] = $this->coffee_model->selectAll();
		 $data['main_content2'] = 'subject_list';		 
		 $this->load->view('template2/body',$data);
		 	 
	 }
	 
	 function getSubjectAll(){
		$column = array('id','sub_name','created_on','status');
		$order = array('id' => 'desc');
		$join = array();
		$where="id!=''";
		$tb_name = 'aud_subject';
		$list = $this->datatbl->get_datatables($column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $req) {
			$edit='&nbsp;&nbsp;<a href="'.base_url('subject/edit/'.$req->id).'" class="label label-info" md-ink-ripple="">Edit</a>';
			$status = ($req->status==1)?'<a href="'.base_url('subject/deactive/'.$req->id).'"<span class="label label-success">Active</span>':'<a href="'.base_url('subject/active/'.$req->id).'"<span class="label label-pink">In-Active</span>';
			$delete ='<button class="delete label label-danger btn" onClick="confirmDelete('.$req->id.')">Delete</button>';
			$no++;
			$row = array();
			$row[] = $req->id;
			$row[] = $req->sub_name;
			
			$row[] = $req->created_on;
			//$row[] = $edit.'&nbsp;'.'<a href="'.base_url('subject/del/'.$req->id).'" class="label label-danger" md-ink-ripple="">Delete</a>';
			$row[] = $edit;
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
	 
	 function is_not_logged_in(){
		$is_logged_in = $this->session->userdata('rcc_admin_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login');			
		}				
	}
	
	 function add(){
		 $data['main_content2'] = 'add_subject';
		 $this->load->view('template2/body',$data);
	 }
	 
	 function create(){
		
		extract($_POST);
		$status=0;
		$msg='';
		$name_unique = $this->subject_model->getDetailsByName($this->input->post('sub_name'));
		    if($name_unique['num']>0){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>"'.$this->input->post('sub_name').'" Genre/Subject name already exists</strong>
			</div>' ;
			}else if($this->input->post('sub_name')=='' ){
			  $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter Genre/subject name</strong>
			</div>' ;
			}else{	
			$insert_data = array(	
				'sub_name'=>$this->input->post('sub_name'),
				
				'created_on'=>date('Y-m-d H:i:s'),
				'status'=>1,						
			);
			
			$q = $this->subject_model->create($insert_data);
			if($q){		
	            $status=1;			
				 $msg='<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Genre/Subject Created Successfully!!</strong>
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


	function edit(){
		$id = $this->uri->segment('3');
		$bd = $this->subject_model->getDetails($id);
		if($bd['num']==1){			 			
			$data['record'] = $bd['data'][0];
			$data['main_content2'] = 'edit_sub';		 
			$this->load->view('template2/body',$data);
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('subject');
		}
	}

	function modify(){
		extract($_POST);
		 $status=0;
		 $msg='';
		 $id = $this->uri->segment('3');
		 $bd = $this->subject_model->getDetails($id);
		 if($bd['num']==1){			
		 $res = $this->subject_model->getDetailsByName($this->input->post('sub_name'));
		 $temp = $res['data'];
		 if($res['num']>0  && $temp[0]['id'] != $id){
			$msg='<div class="alert alert-warning">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 <strong>"'.$this->input->post('sub_name').'" Genre/Subject name already exists</strong>
		   </div>' ;
		   }else if($this->input->post('sub_name')=='' ){
			   $msg='<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			   <strong>Please enter Subject title</strong>
			 </div>' ;
			 }else{
				  $update_data = array();
				  
					if($res['num']>0 || $res['num'] == 0){
						$update_data['sub_name'] = addslashes($this->input->post('sub_name'));
				  }
				  $q = $this->subject_model->modify($update_data,$id);
				  if($q){
				 $status=1;
				// $this->session->set_flashdata('success','Page Updated successfully!!!!');
				$msg='<div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Genre/Subject Updated Successfully</strong></div>';	 
				 
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
			echo "<script type='text/javascript'>if(confirm('Want to delete')){window.location.href ='".base_url('subject/delete/'.$this->uri->segment('3'))."' }else {window.location.href ='".base_url('subject/')."'}</script>";
		}
	
	 function delete(){
		$id = $this->uri->segment('3');
		$cd = $this->subject_model->getDetails($id);
		if($cd['num']==1){	
			
			$this->subject_model->del($id);
			$this->session->set_flashdata('success','"'.$cd['data']['0']['sub_name'].'" Genre Deleted Successfully');
			redirect('subject');			
		}else{
			$this->session->set_flashdata('invalid','Invalid Request');
			redirect('subject');
		}
	}

	function active(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['status'] = '1';        
			 $this->subject_model->actived($update_data,$id);
			  $this->session->set_flashdata('success', 'Activated Successfully');
			 redirect('subject');
	 }
	 function deactive(){
		$id = $this->uri->segment('3');
			$update_data = array();
			  $update_data['status'] = '0';        
			 $this->subject_model->inactived($update_data,$id);
			  $this->session->set_flashdata('success', 'Deactivated Successfully');
			 redirect('subject');
	 }
	
	
}