<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model{
	
	private $tbl_name='aud_booktbl';
    private $tbl_name2='aud_author';
	private $tbl_name3='aud_chapter';
	
	
	function selectAll(){
        $this->db->select('bt.bkid,bt.author_id,bt.bk_name,bt.bk_img,au.id,au.aut_name,au.dob');
		
		$this->db->join('aud_author as au','bt.author_id=au.id');
		$q = $this->db->get("$this->tbl_name as bt");
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $data) {
			$result[] = $data;
			}
			return $result;
		}
	}

	function getDetails($id){
		$this->db->where('bt.bkid',$id);	
		$this->db->select('bt.bkid,bt.author_id,bt.bk_desc,bt.bk_name,bt.bk_img,au.id,au.aut_name,au.dob');
		
		$this->db->join('aud_author as au','bt.author_id=au.id');
		$q = $this->db->get("$this->tbl_name as bt");
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}

	function chapter($id)
    {
        $this->db->order_by("id", "ASC");
        $this->db->where('bid',$id);
          $q = $this->db->get($this->tbl_name3);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $data) {
            $result[] = $data;
            }
            return $result;
        }
    }
	
}
?>