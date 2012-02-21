<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 녹취 상태 컨트롤러 클래스
 */
class Login extends CI_Controller {
   private $user;
   public function __construct()
   {
        parent::__construct();
        // 프로 파일링 
        // $this->output->enable_profiler(TRUE);
   }    

	public function index()
	{
	 //   $this->load->view('header');   
    //    $this->load->view('record_state');
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
    private function _doLogin()
    {
        $this->load->helper('form');
        $this->load->view('login'); 
    }
    
    /*
     *  로그인 처리 
     */
    private function _loginProcess()
    {
		$this->load->library('form_validation');
        // 폼 검증 처리
        $this->form_validation->set_rules('user_id', '아이디', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('user_pwd', '비밀번호', 'trim|required|min_length[6]');        
		if ($this->form_validation->run() == FALSE)
		{
            // input값 필터링..
		    $this->user = $this->input->post(NULL, TRUE);            
            $this->user['message'] = "로그인 실패"; 
            $this->_register_log();
            
            // 로그인 실패시 다시 로그인 화면으로
            $this->_doLogin();                        
		}
		else
		{
            // input값 필터링..
		    $this->user = $this->input->post(NULL, TRUE);
            $this->user['message'] = "로그인 성공"; 
            $this->_register_log();

		    echo "sucess";
		}        

    }
    
    /*
     *  사용자 로그 db에 저장처리
     */
    private function _register_log()
    {
        // 저장 내용
        $this->user['ip'] = $this->input->ip_address();       // 아이피
        $this->user['agent'] = $this->input->user_agent();    // 브라우져
        $this->user['date'] = date("Y-m-d H:i:s");            // 저장 시간
        $this->load->model('Log_register','', TRUE);
        // insert
        $this->Log_register->login_write($this->user);        
    }
    
    private function _rec_list()
    {
        $this->load->helper('url');
    
        $this->load->library('pagination');
        //$config['base_url'] = str current_url();
        $len = strpos(current_url(), "/rec_list");
        $url = substr(current_url(), 0, $len);
        $config['base_url'] = $url."/rec_list";
        $config['total_rows'] = 200;
        $config['per_page'] = 10; 
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;

        $config['use_page_numbers'] = TRUE;
        
        $page = $this->uri->segment(3);
        $this->load->model('Rec_queries','', TRUE);
        $data['query'] = $this->Rec_queries->get_list(10, $page);
        
           
        
        $this->pagination->initialize($config);           
        $data['link'] = $this->pagination->create_links();
	    $this->load->view('header');   
        $this->load->view('recorded_list', $data); 
    }       
    

}

/* End of file login.php */
/* Location: ./application/controllers/rec_mon.php */