<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class signup_model extends CI_Model{
	private $tbl_name = 'admin';


	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
	function validate($username,$pwd){
		
		$sql = "select * from $this->tbl_name where `user_name`=? and md5(`user_pass`)=?";
		$q = $this->db->query($sql,array($username,$pwd));
		$num=$q->num_rows();
		$data="";
		if($num>0){

			$data=$q->result_array();

		}
		return array('num'=>$num,'data'=>$data);	
		
	}
	function modify($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
}


    


?>