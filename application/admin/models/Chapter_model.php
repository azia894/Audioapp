<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter_model extends CI_Model{
	
	private $tbl_name='aud_chapter';
	
	function selectAll(){
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		return array('num'=>$num,'data'=>$data);
	}

	function selectAllch($id){
		$this->db->where('bid',$id);	
		$q = $this->db->get($this->tbl_name);
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $data) {
			$result[] = $data;
			}
			return $result;
		}
	}
	
	
	function selectAllActive(){
		$this->db->where('ch_status','1');
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result();		
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	

	function getDetailsByName($ch_name){
		$query = "select * from $this->tbl_name where  ch_name=?";
		$q = $this->db->query($query,array($ch_name));		
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