<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class authors_model extends CI_Model{

    private $tbl_name='aud_author';
    private $tbl_name2='aud_booktbl';

    function getRows($params = array())
    {
        $this->db->select('bt.bkid,bt.author_id,bt.bk_name,bt.bk_img,au.id,au.aut_name,au.dob,au.created_on,au.aut_img,COUNT(bt.bkid) as total');
        $this->db->join('aud_booktbl as bt','au.id = bt.author_id');
        $this->db->from('aud_author as au');
        $this->db->group_by('au.id');
        $this->db->order_by('created_on','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

    function getDetails($id)
	{
		$this->db->where('id',$id);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();		
		}
		return array('num'=>$num,'data'=>$data);
	}

    function bookslist($id)
    {
        $this->db->order_by("bkid", "ASC");
        $this->db->where('author_id',$id);
          $q = $this->db->get($this->tbl_name2);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $data) {
            $result[] = $data;
            }
            return $result;
        }
    }


}