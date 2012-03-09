<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *  로그인, 회원등록 모델
 *
 */
class Auth_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');            // 암호화
    }
    
    /*
     *  유저 접근 기록 체크
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
     *  유저 access 기록 갱신
     */
    function user_access_update($user_id, $user_pwd)
    {
        $data = array('access_date' => date('Y-m-d H:i:s'));
        $this->db->where(array('user_id' => $this->encrypt->encode($user_id), 'user_pwd' => md5(SALT.$user_pwd.SALT) ));
        $this->db->update('t_vrs_users', $data); 
    } 
    
    /*
     *  유저 정보 반환
     */
    function get_user_info()
    {
        $query = $this->db->get_where('t_vrs_users',
             array('user_id' => $this->encrypt->encode($user_id), 'user_pwd' => md5(SALT.$user_pwd.SALT) ));
        return $query->row_array();
    }
    
    /*
     *  유저 아이디 유무 체크
     */
    function user_id_check($user_id)
    {
        $query = $this->db->get_where('t_vrs_users', array('user_id' => $this->encrypt->encode($user_id)));
        return $query->num_rows() === 1;    
    }   
    
    /*
     *  유저 비밀번호 체크
     */
    function password_check($user_id, $user_pwd)
    {
        $query = $this->db->get_where('t_vrs_users',
            array('user_id' => $this->encrypt->encode($user_id), 'user_pwd' => md5(SALT.$user_pwd.SALT) ));
        return $query->num_rows() === 1;    
    }     
    
    /*
     *  유저 등록
     */
    function register($user)
    {
        $data = array(
           'user_id' => $this->encrypt->encode($user['user_id']),           // 유저 아이디
           'user_name' => $this->encrypt->encode($user['user_name']),       // 유저 이름
           'user_pwd' => md5(SALT.'0525nam'.SALT),                  // 비밀번호
           'user_level' => $user['user_level'],                             // 회원 등급
           'register_date' => date('Y-m-d H:i:s'),                          // 등록 날짜          
        );

        $this->db->insert('t_vrs_users', $data); 
        return $this->db->affected_rows() === 1;
    }
    
           
    

}

/* End of file log_register.php */
/* Location: ./application/controllers/auth_model.php */