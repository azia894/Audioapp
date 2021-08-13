<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class subject_model extends CI_Model{

    private $tbl_name='aud_subject';
    private $tbl_name2='aud_booktbl';

    /*function sublist()
    {
        //$this->db->order_by("id", "desc");
        $this->db->select('IFNULL(bt.bkid,0) as total');
        $this->db->select('bt.bkid,bt.sub_id,s.id,s.sub_name,count(*) as total');
        $this->db->join('aud_booktbl as bt','s.id = bt.sub_id');
        $this->db->from('aud_subject as s');
        $this->db->group_by('s.id');
          $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $data) {
            $result[] = $data;
            }
            return $result;
        }
    }*/

   function sublist()
    {
        $query = "SELECT id,sub_name, concat(IFNULL( u.total,0) + IFNULL( bs.total,''))total FROM aud_subject s LEFT JOIN (
            SELECT sub_id,count(*)total FROM aud_booktbl GROUP BY sub_id)u ON s.id=u.sub_id LEFT JOIN (
                SELECT sub_id,count(*)total FROM bookSubjects GROUP BY sub_id)bs ON s.id=bs.sub_id";
        $q = $this->db->query($query); 
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $data) {
            $result[] = $data;
            }
            return $result;
        }
    }

    function catbklist($id)
    {
        $query = "SELECT bt.bkid,bt.bk_name,bt.sub_id,bt.bk_img,a.id,a.aut_name,a.dob,bs.sub_id,(SELECT GROUP_CONCAT(CONCAT(sub.id,':',sub.sub_name)) FROM bookSubjects bs JOIN aud_subject sub ON bs.sub_id = sub.id WHERE bs.bkid = bt.bkid) as genre
        FROM $this->tbl_name2  bt 
        LEFT JOIN aud_author a ON a.id = bt.author_id  
        LEFT JOIN bookSubjects bs ON bs.sub_id = '$id' and bt.bkid = bs.bkid   
        WHERE bt.sub_id='$id' ORDER BY bt.bkid DESC";
          $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $data) {
            $result[] = $data;
            }
            return $result;
        }
    }

    function getName($id)
	{
		$this->db->select('sub_name');
		$this->db->where('id',$id);	
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
		if ($num > 0) {
			$data = $q->result_array();
			return $data[0];		
		}
		
	}




}