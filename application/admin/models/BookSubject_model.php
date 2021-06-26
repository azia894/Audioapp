<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bookSubject_model extends CI_Model{
	
	private $tbl_name='booksubjects';

    function create($data){
		$q = $this->db->insert($this->tbl_name,$data);
		return $q;
	}
}
?>

	