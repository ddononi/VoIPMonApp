<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->config->item('title'); ?></title>
<link rel="stylesheet" type="text/css" href="<?=CSS_DIR?>/default.css" />
<script language="javascript" src="<?=JS_DIR?>/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/qunit/git/qunit.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://code.jquery.com/qunit/git/qunit.js"></script> 
<!-- UI Tools: Tabs, Tooltip, Scrollable and Overlay (4.45 Kb) -->
<script src="http://cdn.jquerytools.org/1.2.6/tiny/jquery.tools.min.js"></script>
<style>
/* tooltip styling */
.tooltip {
	display:none;
	background:transparent url(<?=IMG_DIR?>/black_arrow.png);
	font-size:12px;
	height:70px;
	width:160px;
	padding:25px;
	color:#fff;
}

/* a .label element inside tooltip */
.tooltip .label {
	color:yellow;
	width:35px;
}

.tooltip a {
	color:#ad4;
	font-size:11px;
	font-weight:bold;
}

.icR, .icW, .icY, .icG{
    cursor: pointer;
}  
</style>
</head>
<body>


<div id="wrapper">
	<div id="header">			
			<div class="gnb">
					<h1><a href="#"><img src="<?=IMG_DIR?>/logo.jpg" width="122" height="43" alt="active ice" /></a></h1>
					<div class="gnbMenu">
								<span>홍길동님 반갑습니다</span>
								<a href="#" class="on"><img src="<?=IMG_DIR?>/btn_logout.gif" width="56" height="20" alt="로그아웃" /></a>
								<a href="#"><img src="<?=IMG_DIR?>/btn_info.gif" width="56" height="20" alt="정보변경" /></a>
								<a href="#"><img src="<?=IMG_DIR?>/btn_dataOn.gif" width="56" height="20" alt="통계" /></a>
					</div>
			</div>
			<div class="lnb">
				<ul class="lnbMenu">
					<li><a href="#">통계</a></li>
					<li><a href="#">모니터링</a></li>
				</ul>
			</div>
			<div class="img"><img src="<?=IMG_DIR?>/img.jpg" width="778" height="181" alt="img" /></div>
	
	</div>