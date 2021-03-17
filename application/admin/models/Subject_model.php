<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class subject_model extends CI_Model{
	
	private $tbl_name='aud_subject';
	
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
		$this->db->where('status','1');
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
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
	
	function getDetailsByName($name){
		$this->db->where('sub_name',$name);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function getDetailsByCode($code){
		$this->db->where('code',$code);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function create($data) {
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