<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$config['use_page_numbers'] = TRUE;

// 좌우 페이지 갯수
$config['num_links'] = 5;

$config['full_tag_open'] = '<div class="paging">';
$config['full_tag_close'] = '</div>';
// 처음으로 
$config['first_link'] = '<img src="'.IMG_DIR.'/btn_paging_start.gif" alt="처음으로" align="middle" />';
$config['first_tag_open'] = '';
$config['first_tag_close'] = '';

// 끝으로
$config['last_link'] = '<img src="'.IMG_DIR.'/btn_paging_end.gif" alt="마지막으로" />';
$config['last_tag_open'] = '';
$config['last_tag_close'] = '';


// 다음으로
$config['next_link'] = '<img src="'.IMG_DIR.'/btn_paging_next.gif" alt="다음으로" />';

// 이전으로
$config['prev_link'] = '<img src="'.IMG_DIR.'/btn_paging_prev.gif" alt="이전으로" />';

// 현재페이지
$config['cur_tag_open'] = '<span class="on">';
$config['cur_tag_close'] = '</span>';

// 링크숫자
$config['num_tag_open'] = '<span>';
$config['num_tag_close'] = '</span>';

/* End of file pagination.php */
/* Location: ./application/config/pagination.php */
