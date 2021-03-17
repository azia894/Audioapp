<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __Construct(){
		parent:: __construct();
		
		$this->is_not_logged_in();
	}
	
	function is_not_logged_in()
	{
		$is_logged_in = $this->session->userdata('rcc_admin_logged_in');
		if(isset($is_logged_in) && $is_logged_in != true)
		{
			redirect('login');			
		}		
	}
		
	
	public function index()
	{		
		$sess_data = array(
			'rcc_admin_user_name'=>'',			
			'rcc_admin_logged_in'=>false
		);
		$this->session->set_userdata($sess_data);
		redirect("login");
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */