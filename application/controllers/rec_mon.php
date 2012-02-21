<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 녹취 상태 컨트롤러 클래스
 */
class Rec_Mon extends CI_Controller {
    
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
    
	public function test()
	{
	    //echo "test";
        
      //  alert('잘못된 접근입니다.', '/');
      show_404();
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
    
    private function _monitering()
    {
	    $this->load->view('header');   
        $this->load->view('record_state'); 
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

/* End of file rec_mon.php */
/* Location: ./application/controllers/rec_mon.php */