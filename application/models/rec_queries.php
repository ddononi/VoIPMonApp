<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rec_queries extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_list($limit, $page)
    {
		$where = "";
	//	$this->db->select($table.'.*, files.file_name, users.nickname');
		$this->db->limit($limit, $page);

  	//	$this->db->where($where);
        
        $this->db->order_by("f_sdatetime", "desc"); 
        $query = $this->db->get('t_vr_entvrc');
        return $query->result();  
    }      
    

}

/* End of file rec_mon.php */
/* Location: ./application/controllers/rec_mon.php */