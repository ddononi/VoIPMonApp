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
    
    function get_statistics()
    {
		$where = "";
	//	$this->db->select($table.'.*, files.file_name, users.nickname');

  	//	$this->db->where($where);
        
        // ex) SELECT count(*) as cnt, f_channel FROM `t_vrs_entvrc_2012` where f_sdatetime > '2012-02-20 00:00:00' and f_sdatetime < '2012-02-20 12:00:00' group by f_channel
        $where = "f_sdatetime > '2012-02-01 00:00:00' and f_sdatetime < '2012-03-01 00:00:00'";
        $this->db->select('count(*) as cnt, f_channel');
        $this->db->where($where);
        $this->db->order_by("f_channel", "asc"); 
        $this->db->group_by("f_channel");
        $query = $this->db->get("t_vrs_entvrc_2012");
        return $query->result();  
    }             
    

}

/* End of file rec_mon.php */
/* Location: ./application/controllers/rec_queries.php */