<?php
class Notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_not_logged_in();
        // $this->load->model('author_model');
        $this->load->model('books_model');
        // $this->load->model('subject_model');
        // $this->load->library('datatbl');
        // $this->load->model('bookSubject_model');
    }
     
    public function index()
    {
        //$data['get_data'] = $this->author_model->selectAll();
        $data['main_content2'] = 'notification';
        $data['token']="AAAAumNsolA:APA91bFPRonuZSFo0xnXngbtI0GbVmMjeV-8XCe3mwXk2ktIqKONZTIcbfidXUO4I35dT0qwGY9Xt6JHsFMreWayn7ur-lpUHEtPL3AyfCFfa7JXflih7w8pYOVi3imes3SdfKqv9boL";
        $this->load->view('template2/body', $data);
    }
    public function is_not_logged_in()
    {
        $is_logged_in = $this->session->userdata('rcc_admin_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login');
        }
    }
}