<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class books_model extends CI_Model{
	
	private $tbl_name='aud_booktbl';
	
	function selectAll(){
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function selectAllActive(){
		$this->db->where('bk_status','1');
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		return array('num'=>$num,'data'=>$data);
	}

	function getbName($id)
	{
		
		$this->db->where('bkid',$id);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();
			return $data[0];		
		}
		
	}
	
	

	function getDetailsByName($bk_name){
		$query = "select * from $this->tbl_name where  bk_name=?";
		$q = $this->db->query($query,array($bk_name));		
		$num =  $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function getDetails($id){
		$this->db->where('bkid',$id);	
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
		// return $q;
		$last_id = $this->db->insert_id();
		return $last_id;
	}
	function modify($data,$id){
		$this->db->where('bkid',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	function actived($update_data,$id){
        $this->db->where('bkid',$id);
        $q = $this->db->update($this->tbl_name,$update_data);
        return $q;
        
    }

      function inactived($update_data,$id){
        $this->db->where('bkid',$id);
        $q = $this->db->update($this->tbl_name,$update_data);
        return $q;
        
	}

	
	function del($id){
		$this->db->where('bkid',$id);
		$q = $this->db->delete($this->tbl_name);
		return $q;
		
	}
}
?>
