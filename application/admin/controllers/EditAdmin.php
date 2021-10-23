<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditAdmin extends CI_Controller
{
  public function __Construct()
  {
    parent::__Construct();
    // $this->is_logged_in();

    $this->load->model('signup_model');
  }

  public function is_logged_in()
  {
    $is_logged_in = $this->session->userdata('rcc_admin_logged_in');
    if (isset($is_logged_in) && $is_logged_in == true) {
      redirect('dashboard');
    }
  }
  public function index()
  {

    $is_logged_in = $this->session->userdata('rcc_admin_logged_in');
    if (!isset($is_logged_in) || $is_logged_in != true) {
      redirect('login');
    }
    $data['record'] = $this->session->userdata('rcc_admin_user_name');
    $data['main_content2'] = 'edit_admin';
    $this->load->view('template2/body', $data);
  }

  public function modify()
  {
    extract($_POST);
    $status = 0;
    $msg = '';
    if ($this->input->post('user_name') == '') {
      $msg = '<div class="alert alert-warning">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Please enter Name</strong>
         </div>';
    } else if ($this->input->post('user_pass') == '') {
      $msg = '<div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Please enter Password</strong>
         </div>';
    } else if ($this->input->post('confirm_pass') == '') {
      $msg = '<div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Please enter Confirm Password</strong>
        </div>';
    } else if ($this->input->post('user_pass') != $this->input->post('confirm_pass')) {
      $msg = '<div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Confirm Password Does not match</strong>
        </div>';
    } else {
      $id = $this->session->userdata('rcc_admin_user_id');
      $update_data = array(
        'user_name' => $this->input->post('user_name'),
        'user_pass' => $this->input->post('user_pass'),
      );
      $q = $this->signup_model->modify($update_data, $id);
      if ($q) {
        $status = 1;
        $msg='<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>author Created Successfully!!</strong>
						</div>' ;
        // redirect('logout');
      }
    }
    $res = array('status' => $status, 'msg' => $msg);
    echo json_encode($res);
    exit;
  }
}
