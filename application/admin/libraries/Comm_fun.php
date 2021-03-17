<?php
if(!defined('BASEPATH'))exit('No direct script access allowed'); 
class Comm_fun {
    public $mandiatory_fields=array('js_fullname','js_mobile','js_experience','js_skills','js_workauth','js_availability','js_state','js_city','js_zipcode','js_relocation','js_rate');
    public $field_req_msgs=array(
			'fill_basic_fields'=>'Please fill all the Basic fields',
			'success_update'=>'Profile Updated Successfully',
			'err_update'=>'Unable to update ,please try again',
			'err_delete'=>'Unable to delete ,please try again',
			'invalid_req'=>'Invalid request',
			'post_empty'=>'Fill required fields and submit',
			'js_fullname'=>'Name is required',
			'js_email'=>'Email is required',
			'js_mobile'=>'Mobile number is required',
			'js_experience'=>'Experience is required',
			'js_skills'=>'Skills is required',
			'js_workauth'=>'Work Authorization is required',
			'js_availability'=>'Availability is required',
			'js_state'=>'State is required',
			'js_city'=>'City is required',
			'js_zipcode'=>'Zipcode is required',
			'js_relocation'=>'Relocation is required',
			'js_rate'=>'Rate is required',
			'skills_required'=>'Skills is required',
			'yrsexp_required'=>'Years of experience in skill is required',
		);
	
	function warning_msg($msg){
		return '<div class="alert alert-warning alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<span class="alert-link">'.$msg.'</span>.
										</div>';
	}
	function success_msg($msg){
		return '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<span class="alert-link">'.$msg.'</span>.
										</div>';
	}
	/*PHP Mail*/
	function sendEMAIL($to,$subject,$message){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: noreply@dollarstaffing.com Dollar-Staffing';
		 mail($to, $subject, $message, $headers);
	}
}
?>