<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Privacypolicy extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('home_model');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data = array();
    $data['main_content'] = 'privacypolicy';
    $data['title']= 'Privacy Policy - Dil ki Awaz';
    $this->load->view('template/body', $data);
  }
}
