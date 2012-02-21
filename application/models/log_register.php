<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_register extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function login_write($user)
    {
        $data = array(
           'user_id' => $user['user_id'] ,
           'message' => $user['message'] ,
           'ip' => $user['ip'] ,
           'agent' => $user['agent'] ,           
           'date' => $user['date'] ,    
           
        );

        $this->db->insert('t_vr_log', $data);         
    }      
    

}

/* End of file log_register.php */
/* Location: ./application/controllers/rlog_register.php */