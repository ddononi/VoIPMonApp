<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 회원등록, 리스트, 가입 클래스
 * 
 */
class Auth extends CI_Controller {
   private $_user;
   public function __construct()
   {
        parent::__construct();
        $this->load->library('form_validation');    // 폼검증
        $this->load->library('encrypt');            // 암호화
        if(true){ // profile
         $this->output->enable_profiler(TRUE);
        }
        
   }    

	public function index()
	{

	}
    
    public function _remap($method, $params = array())
    {
        $method = '_'.$method;
        if (method_exists($this, $method)){ // 메소드가 존재하면 해당 메소드 호출
            return call_user_func_array(array($this, $method), $params);
        }
        // 잘못된 경로면 에러 처리
        show_404();
    }  
    
    /*
     *  로그인 시작 화면 
     */
    private function _login()
    {
        $this->load->helper('form');
        $this->load->view('login'); 
    }
    
    /*
     *  로그인 처리 
     */
    private function _loginProcess()
    {
        // $_POST 데이터가 없으면 다시로그인화면으로 이동
        if($this->input->post() == null)
        {
            $this->_login(); 
            return;
        }
        
        // 폼 검증 처리
        $this->form_validation->set_rules('user_id', '아이디', 'trim|required|min_length[3]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('user_pwd', '비밀번호', 'trim|required|min_length[4]||max_length[20]|xss_clean|callback_password_check');        
        // input값 필터링..
        $this->_user = $this->input->post(NULL, TRUE);   
		if ($this->form_validation->run() == FALSE)
        {
            $this->_user['message'] = "로그인 실패"; 
            $this->_register_log($this->_user['user_id']);
            // 로그인 실패시 다시 로그인 화면으로
            $this->_login();                        
		}
		else
        {   // 로그인 성공시
            $this->_user['message'] = "로그인 성공"; 
            $this->_register_log($this->_user['user_id']);
            
            $this->load->model('Auth_model','', TRUE);
            // 접근 기록 갱신
            $this->Auth_model->user_access_update($this->_user['user_id'], $this->_user['user_pwd']);
            $user_info = $this->Auth_model->get_user_info($this->_user['user_id'], $this->_user['user_pwd']);
            // 유저 로그인 정보를 세션에 저장            
            $data = array(
                        'idx'=> $user_info['idx'],                                          // 인덱스  
                        'user_id'=> $this->encrypt->decode($user_info['user_id']),          // 유저 아이디
                        'user_name'=> $this->encrypt->decode($user_info['user_name']),      // 유저 이름
                        'user_level' => $user_info['user_level'],                           // 유저 레벨
                        'access_date' => $user_info['access_date'],                         // 접근 시간 
                        'logged_in' => TRUE                                                 // 로그인 여부
                    );
            $this->session->set_userdata($data);
            // 녹취조회 페이지로 리다이렉트
            $this->load->helper('url');
            redirect('/rec_mon/rec_list/', 'refresh');
		}        

    }
    
    /*
     *  password 필터 콜백함수
     *  아이디와 비밀번호를 체크 
     */ 
    public  function user_check()
    {
        $this->load->model('Auth_model','', TRUE);
        if($this->Log_register->user_id_check($this->_user['user_id']) === TRUE )
        {
            return TRUE;
        }
        else
        {   // 에러 메세지 
            $this->form_validation->set_message('user_check', '유저 아이디를 확인하세요');
            return FALSE;
        }              
    }    
    
    /*
     *  password 필터 콜백함수
     *  아이디와 비밀번호를 체크 
     */ 
    public function password_check()
    {
        $this->load->model('Auth_model','', TRUE);
        if($this->Auth_model->password_check($this->_user['user_id'], $this->_user['user_pwd']))
        {
            return TRUE;
        }
        else
        {   // 에러 메세지
            $this->form_validation->set_message('password_check', '비밀번호를 정확히 입력하세요');
            return FALSE;
        }              
    }
    
    /*
     *  사용자 로그 db에 저장처리
     */
    private function _register_log($user_id)
    {
        // 저장 내용
        $this->_user['user_id']= $user_id;
        $this->_user['ip'] = $this->input->ip_address();       // 아이피
        $this->_user['agent'] = $this->input->user_agent();    // 브라우져
        $this->_user['date'] = date("Y-m-d H:i:s");            // 저장 시간
        $this->load->model('Auth_model','', TRUE);
        // db에 기록
        $this->Auth_model->access_write($this->_user);        
    }
    
    /*
     *  회원 등록
     */
    private function _register_view()
    {
        $this->load->view('header');
        $this->load->view('register_view');
    }
    
    /*
     *  회원 리스트
     */
    private function _users_list($data = NULL)
    {
        $this->load->view('header');
        $this->load->view('users_list_view', $data);
    }    
    
    /*
     *  로그 아웃
     */
    public function logout()
    {
        $this->session->sess_destroy();
        $this->_login();
    }
    
    
    private function _register()
    {
        // 폼 검증
        $this->form_validation->set_rules('user_id', '유저 아이디', 'xss_clean|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('user_pwd', '유저 비밀번호', 'xss_clean|required|min_length[4]|max_length[20]|matches[user_re_pwd]');
        $this->form_validation->set_rules('user_re_pwd', '유저 비밀번호', 'xss_clean|required|min_length[4]|max_length[20]|matches[user_pwd]');
       // $this->form_validation->set_rules('user_level', '유저 등급', 'xss_clean|required|min_length[1]|max_length[1]|callback_level_validate[user_level]');
        if($this->form_validation->run() == FALSE)
        {
            //  등록폼 검증 실패시 다시 등록화면으로
            $this->_register_view();
        }
        else
        {   // 정상 입력이면
            $this->_user = $this->input->post(NULL, TRUE);
            $this->load->model('Auth_model','', TRUE);   
            if($this->Auth_model->register($this->_user))
            {  // 정상 등록 메세지 
               $data['message'] = '정상 등록되었습니다.';
            }
            else
            {
               // 에러 처리메세지 
               $data['message'] = '등록 실패!!';
            }
        }
        echo $data['message'];
        $this->_register_view();
      //  $this->_user_list_view($data);
    }       
    
    /*
     * 회원 등급 검증
     */
    public function level_validate($level){
        return $level === 'n' OR $level === 's';
    }
    

}

/* End of file login.php */
/* Location: ./application/controllers/auth.php */