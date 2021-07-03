<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class books_model extends CI_Model{

    private $tbl_name='aud_author';
    private $tbl_name2='aud_booktbl';
    private $tbl_name3 = 'aud_subject';
    private $tbl_name4 = 'bookSubjects';

    function getRows($params = array())
    {
        $this->db->select('bt.bkid,bt.author_id,bt.bk_name,bt.bk_img,au.id,au.aut_name,au.dob,au.created_on,au.aut_img, (SELECT GROUP_CONCAT(CONCAT(sub.id,":",sub.sub_name)) FROM bookSubjects bs JOIN aud_subject sub ON bs.sub_id = sub.id WHERE bs.bkid = bt.bkid) as genre');
        $this->db->join('aud_author as au','bt.author_id = au.id');
        $this->db->from('aud_booktbl as bt');
       
        $this->db->order_by('created_on','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
}