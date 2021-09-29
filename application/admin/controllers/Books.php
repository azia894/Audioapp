<?php
class Books extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_not_logged_in();
        $this->load->model('author_model');
        $this->load->model('books_model');
        $this->load->model('subject_model');
        $this->load->library('datatbl');
        $this->load->model('bookSubject_model');

    }
     
    public function index()
    {
        //$data['get_data'] = $this->author_model->selectAll();
        $data['main_content2'] = 'books_list';
        $this->load->view('template2/body', $data);
    }
     
    public function is_not_logged_in()
    {
        $is_logged_in = $this->session->userdata('rcc_admin_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login');
        }
    }
    
    
    public function add()
    {
        $data['get_data'] = $this->author_model->selectAllActive();
        $data['get_sub'] = $this->subject_model->selectAllActive();
        $data['main_content2'] = 'add_books';
        $this->load->view('template2/body', $data);
    }
     

    public function create()
    {
        extract($_POST);
        /*echo "<pre>";
        print_r($_FILES);
        print_r($_POST);*/
        $status=0;
        $msg='';
        $res = $this->books_model->getDetailsByName($this->input->post('bk_name'));
        if ($res['num']>0) {
            $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>"'.$this->input->post('bk_name').'" Book Name already exists</strong>
			</div>' ;
        } elseif ($this->input->post('bk_name')=='') {
            $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter book name</strong>
			</div>' ;
        } 
        // elseif ($this->input->post('bk_desc')=='') {
        //     $msg='<div class="alert alert-warning">
		// 	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		// 	  <strong>Please enter  description</strong>
		// 	</div>' ;
        // }
         else {
            $bk_tags = $this->input->post('bk_tags');
            $value = str_replace(" ", ',', $bk_tags);
            $insert_data = array(
                // 'bk_age'=>$this->input->post('bk_age'),
                'author_id'=>$this->input->post('author_id'),
                // 'sub_id'=>$this->input->post('sub_id'),
                'bk_name'=>$this->input->post('bk_name'),
                // 'bk_desc'=>$this->input->post('bk_desc'),
                'bk_year'=>$this->input->post('bk_year'),
                'bk_blurb'=>$this->input->post('bk_blurb'),
                'bk_img'=>$this->input->post('bk_img'),
                'bk_tags'=>$value,
                'bk_status'=>1,
                'created_on'=>date('Y-m-d H:i:s'),
            );
            // if(isset($_FILES['up']) && !empty($_FILES) && $_FILES['up']['name']!=""){
            // 			$fileTypes = array('jpeg','jpg','png','gif');
            // 			$trgt='assets/bookimages/';
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
            // 				$insert_data['bk_img']=$file;
            // 				move_uploaded_file($_FILES['up']['tmp_name'],$trgt.$file);                            
            // 			 }
            // 		 }
            $q = $this->books_model->create($insert_data);
            // if($this->input->post('upload')){
            //     $q = $this->books_model->create($insert_data);
            //     // echo $q; exit;
            // }
            $id = $q;
            $subj = $this->input->post('sub_id[]');
            if (!empty($subj) && !empty($id) ) {
                for ($i = 0; $i < count($subj); $i++) {
                    $insert_data = array(
                        'bkid'=>$id,
                        'sub_id'=>$subj[$i],
                        'status'=>'1',
                    );
                    $q = $this->bookSubject_model->create($insert_data);
                }
            }
            if ($q) {
                $status=1;
                $msg='<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Book Created Successfully!!</strong>
						</div>' ;
            } else {
                $msg='<div class="alert alert-warning">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Unable To Create, Try Again !!</strong>
						</div>' ;
            }
        }
        $res = array('status'=>$status,'msg'=>$msg);
        echo json_encode($res);
        exit;
    }
    
    public function getBooksAll()
    {
        $column = array('bkid','bk_name','bk_rating','created_on','bk_status','bk_img');
        $order = array('bkid' => 'desc');
        $join = array();
        $where="bkid!=''";
        $tb_name = 'aud_booktbl';
        $list = $this->datatbl->get_datatables($column, $order, $tb_name, $join, $where);
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $req) {
            $rating = $req->bk_rating.'&nbsp;&nbsp;out of 5';
            $edit='&nbsp;&nbsp;<a href="'.base_url('books/edit/'.$req->bkid).'" class="label label-info" md-ink-ripple="">Edit</a>';
            $ch='<a href="'.base_url('chapter/list/'.$req->bkid).'"<button type="button" class="btn btn-primary">View Chapters</button>';
            $img='<img src="'.$req->bk_img.'" alt="image" class="img-responsive thumb-md">';
            $status = ($req->bk_status==1)?'<a href="'.base_url('books/deactive/'.$req->bkid).'"<span class="label label-success">Active</span>':'<a href="'.base_url('books/active/'.$req->bkid).'"<span class="label label-pink">In-Active</span>';
            $delete = '<button class="delete label label-danger btn" onClick="confirmDelete('.$req->bkid.')">Delete Book</button>'; // href="'.base_url('books/del/'.$req->bkid).'"            
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $req->bk_name;
            $row[] = $ch;
            $row[] = $img;
            $row[] = $rating;
            $row[] = $req->created_on;
            $row[] = $edit;
            //$row[] = $edit.'&nbsp;'.'<a href="'.base_url('books/del/'.$req->bkid).'" class="label label-danger" md-ink-ripple="">Delete</a>';
            $row[] = $status;
            $row[] = $delete;
            $data[] = $row;
            $i++;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->datatbl->count_all($tb_name, $join, $where),
                        "recordsFiltered" => $this->datatbl->count_filtered($column, $order, $tb_name, $join, $where),
                        "data" => $data,
                );
        
        echo json_encode($output);
    }

    public function edit()
    {
        $id = $this->uri->segment('3');
        $bd = $this->books_model->getDetails($id);
        if ($bd['num']==1) {
            $data['get_data'] = $this->author_model->selectAllActive();
            $data['get_sub'] = $this->subject_model->selectAllActive();
            $data['get_booksub'] = $this->bookSubject_model->getBookSubjects($id);
            $data['record'] = $bd['data'][0];
            $data['main_content2'] = 'edit_books';
            $this->load->view('template2/body', $data);
        } else {
            $this->session->set_flashdata('invalid', 'Invalid Request');
            redirect('books');
        }
    }

    public function modify()
    {
        extract($_POST);
        $status=0;
        $msg='';
        $id = $this->uri->segment('3');
        $bd = $this->books_model->getDetails($id);
        if ($bd['num']==1) {
            $res = $this->books_model->getDetailsByName($this->input->post('bk_name'));
            if ($this->input->post('bk_name')=='') {
                $msg='<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			   <strong>Please enter Book Name</strong>
			 </div>' ;
            } 
            // elseif ($this->input->post('bk_desc')=='') {
            //     $msg='<div class="alert alert-warning">
			//    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			//    <strong>Please enter description</strong>
			//  </div>' ;
            // }
             else {
                $bk_tags = $this->input->post('bk_tags');
                $value = str_replace(" ", ',', $bk_tags);
                $update_data = array();
                $update_data = array(
                    'author_id'=>$this->input->post('author_id'),
                    // 'sub_id'=>$this->input->post('sub_id'),
                    // 'bk_desc'=>$this->input->post('bk_desc'),
                    // 'bk_age'=>$this->input->post('bk_age'),
                    'bk_year'=>$this->input->post('bk_year'),
                    'bk_blurb'=>$this->input->post('bk_blurb'),
                    'bk_tags'=>$value,
                    'bk_img'=>addslashes($this->input->post('bk_img')),
                );
                if ($res['num']==0) {
                    $update_data['bk_name'] = $this->input->post('bk_name');
                }
                $q = $this->books_model->modify($update_data, $id);

                $subj = $this->input->post('sub_id[]');
                if (!empty($subj) && !empty($id) ) {
                    $q = $this->bookSubject_model->del($id);
                    for ($i = 0; $i < count($subj); $i++) {
                        $insert_data = array(
                            'bkid'=>$id,
                            'sub_id'=>$subj[$i],
                            'status'=>'1',
                        );
                        $q = $this->bookSubject_model->create($insert_data);
                    }
                }
                if ($q) {
                    $status=1;
                    // $this->session->set_flashdata('success','Page Updated successfully!!!!');
                    $msg='<div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Book Updated Successfully</strong></div>';
                } else {
                    $msg='<div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Please Try Again Later</strong></div>';
                }
            }
        } else {
            $msg='<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			   <strong>Warning!</strong>Invalid action</div>';
        }
         
        $res = array('status'=>$status,'msg'=>$msg);
        echo json_encode($res);
        exit;
    }
    public function del()
    {
        echo "<script type='text/javascript'>if(confirm('Want to delete')){window.location.href ='".base_url('books/delete/'.$this->uri->segment('3'))."' }else {window.location.href ='".base_url('books/')."'}</script>";
    }
    public function delete(){
        $id = $this->uri->segment('3');
        $bd = $this->books_model->getDetails($id);
        if ($bd['num']==1) {
            if ($bd['data'][0]['bk_img']!="") {
                unlink('assets/bookimages/'.$bd['data'][0]['bk_img']);
            }
            $this->books_model->del($id);
            $this->bookSubject_model->del($id);
            $this->session->set_flashdata('success', '"'.$bd['data']['0']['bk_name'].'" books Deleted Successfully');
            redirect('books');
        } else {
            $this->session->set_flashdata('invalid', 'Invalid Request');
            redirect('books');
        }
    }
    public function active()
    {
        $id = $this->uri->segment('3');
        $update_data = array();
        $update_data['bk_status'] = '1';
        $this->books_model->actived($update_data, $id);
        $this->session->set_flashdata('success', 'Activated Successfully');
        redirect('books');
    }
    public function deactive()
    {
        $id = $this->uri->segment('3');
        $update_data = array();
        $update_data['bk_status'] = '0';
        $this->books_model->inactived($update_data, $id);
        $this->session->set_flashdata('success', 'Deactivated Successfully');
        redirect('books');
    }
}
