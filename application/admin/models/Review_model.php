<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class review_model extends CI_Model{
	
	private $tbl_name='aud_review';
	
	function selectAll(){
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		return $data;
	}
	
	function selectAllActive(){
		$query = "SELECT ar.id, ab.bk_name, ar.user_name, ar.review, ar.rating, ar.status, ar.created_on FROM aud_review ar JOIN aud_booktbl ab ON ar.bid = ab.bkid";
		$q = $this->db->query($query);
		// $this->db->where('aut_status','1');
		// $q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		// print_r($data); exit;
		return array('num'=>$num,'data'=>$data);
	}
	
	

	function getDetailsByName($aut_name){
		$query = "select * from $this->tbl_name where  aut_name=?";
		$q = $this->db->query($query,array($aut_name));		
		$num =  $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function getDetails($id){
		$this->db->where('id',$id);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function create($data){
		$q = $this->db->insert($this->tbl_name,$data);
		return $q;
	}

	function modify($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
		
	}

	function actived($update_data,$id){
        $this->db->where('id',$id);
        $q = $this->db->update($this->tbl_name,$update_data);
        return $q;
        
    }

      function inactived($update_data,$id){
        $this->db->where('id',$id);
        $q = $this->db->update($this->tbl_name,$update_data);
        return $q;
        
	}

	
	function del($id){
		$this->db->where('id',$id);
		$q = $this->db->delete($this->tbl_name);
		return $q;
		
	}
}
?>