<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 녹취 상태 컨트롤러 클래스
 */
class Rec_Mon extends CI_Controller {
    
   public function __construct()
   {
        parent::__construct();
        // 프로 파일링 
       //  $this->output->enable_profiler(TRUE);
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
        /*
        show_error('잘못된 경로 입니다. 정확한 경로를 입력해 주세요.'.
                   '<br/>처음으로 돌아가기 <a href="'.BASE_URL.'rec_mon/rec_list/">처음으로</a>' );
        */
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
        $this->load->helper('form');
        $this->load->library('pagination');

        $len = strpos(current_url(), "/rec_list");
        $url = substr(current_url(), 0, $len);
        $get = $this->input->get(); // returns all POST items without XSS filtering
        $data['startDate'] = '';
        $data['endDate'] = '';
        $data['listAmount'] = 10;
                
        if($get !== FALSE){     // query 내용이 있으면..
            $data['startDate'] = $get['startDate'];
            $data['endDate'] = $get['endDate'];
            // 페이지 목록수가 있으면 가져오기 if 없으면 기본 10개씩
            $data['listAmount'] = $get['listAmount'];
        }

        $query_string = '';
        if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])){
            $query_string = explode("/",$_SERVER['QUERY_STRING']);
            $query_string = "?".$query_string[0];
        }
        
        $config['base_url'] = $url."/rec_list";
        $config['total_rows'] = 200;
        $config['per_page'] = $data['listAmount'];
        $config['uri_segment'] = 3;
        $config['query_str'] = $query_string;
        $page = $this->uri->segment(3, 1);

        $this->load->model('Rec_queries','', TRUE);
        $data['query'] = $this->Rec_queries->get_list($data['listAmount'], $page);

        $this->pagination->initialize($config);           
        $data['link'] = $this->pagination->create_links();
	    $this->load->view('header');   
        $this->load->view('recorded_list', $data); 
    }
    
    private function _rec_statistics()
    {
        $this->load->view('header');
        $this->load->model('Rec_queries','', TRUE);   
        $data['query'] = $this->Rec_queries->get_statistics();
        $data['chart_caption'] = '2월 통계';
        $this->load->view('statistic', $data);     
    }

}

/* End of file rec_mon.php */
/* Location: ./application/controllers/rec_mon.php */