<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *  �α���, ȸ����� ��
 *
 */
class Auth_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');            // ��ȣȭ
    }
    
    /*
     *  ���� ���� ��� üũ
     */
    function access_write($user)
    {
        $data = array(
           'user_id' => $user['user_id'],
           'message' => $user['message'],
           'ip' => $user['ip'],
           'agent' => $user['agent'],           
           'date' => $user['date'],    
           
        );

        $this->db->insert('t_vr_log', $data);         
    }
    
    /*
     *  ���� access ��� ����
     */
    function user_access_update($user_id, $user_pwd)
    {
        $data = array('access_date' => date('Y-m-d H:i:s'));
        $this->db->where(array('user_id' => $this->encrypt->encode($user_id), 'user_pwd' => md5(SALT.$user_pwd.SALT) ));
        $this->db->update('t_vrs_users', $data); 
    } 
    
    /*
     *  ���� ���� ��ȯ
     */
    function get_user_info()
    {
        $query = $this->db->get_where('t_vrs_users',
             array('user_id' => $this->encrypt->encode($user_id), 'user_pwd' => md5(SALT.$user_pwd.SALT) ));
        return $query->row_array();
    }
    
    /*
     *  ���� ���̵� ���� üũ
     */
    function user_id_check($user_id)
    {
        $query = $this->db->get_where('t_vrs_users', array('user_id' => $this->encrypt->encode($user_id)));
        return $query->num_rows() === 1;    
    }   
    
    /*
     *  ���� ��й�ȣ üũ
     */
    function password_check($user_id, $user_pwd)
    {
        $query = $this->db->get_where('t_vrs_users',
            array('user_id' => $this->encrypt->encode($user_id), 'user_pwd' => md5(SALT.$user_pwd.SALT) ));
        return $query->num_rows() === 1;    
    }     
    
    /*
     *  ���� ���
     */
    function register($user)
    {
        $data = array(
           'user_id' => $this->encrypt->encode($user['user_id']),           // ���� ���̵�
           'user_name' => $this->encrypt->encode($user['user_name']),       // ���� �̸�
           'user_pwd' => md5(SALT.'0525nam'.SALT),                  // ��й�ȣ
           'user_level' => $user['user_level'],                             // ȸ�� ���
           'register_date' => date('Y-m-d H:i:s'),                          // ��� ��¥          
        );

        $this->db->insert('t_vrs_users', $data); 
        return $this->db->affected_rows() === 1;
    }
    
           
    

}

/* End of file log_register.php */
/* Location: ./application/controllers/auth_model.php */