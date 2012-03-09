<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>페이지 에러</title>
<link rel="stylesheet" type="text/css" href="<?=CSS_DIR?>/default.css" />
</head>
<body>

				<div style="position:absolute;top:200px;left:40%;z-index:1;display:block" >
					<div class="error">
						<p class="title">고객님 죄송합니다</p>
						<ul class="detail">
                            <li class=""><?php echo $message; ?></li>
						</ul>
					</div>
				</div>    

 </body>
</html>
