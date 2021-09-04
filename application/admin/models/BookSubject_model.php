<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class bookSubject_model extends CI_Model
{
  private $tbl_name = 'booksubjects';

  public function create($data) {
    $q = $this->db->insert($this->tbl_name, $data);
    return $q;
  }
  function del($id){
		$this->db->where('bkid',$id);
		$q = $this->db->delete($this->tbl_name);
		return $q;		
	}
  function getBookSubjects($id){
    $this->db->where('bkid',$id);
		$q = $this->db->get($this->tbl_name);
		$num = $num = $q->num_rows();
		$data="";
    $temp=[];
		if ($num > 0) {
      $data = $q->result();		
		}
    foreach ($data as $key) {
      array_push($temp,$key->sub_id);
    }
		return array('num'=>$num,'data'=>$data,'temp'=>$temp);
	}

}
