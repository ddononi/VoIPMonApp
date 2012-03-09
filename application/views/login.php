<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->config->item('vr_title'); ?></title>
<link rel="stylesheet" type="text/css" href="<?=CSS_DIR?>/login.css" />
<script language="javascript" src="<?=JS_DIR?>/jquery-1.7.1.min.js"></script>
<script language="javascript" src="<?=JS_DIR?>/jquery.tools.min.js"></script>
</head>
<body>

<?php echo validation_errors(); ?>
 <div id="login">
   <?=form_open('auth/loginProcess')?>
    	<ul class="loginBox">
    		<li><input type="text" maxlength="10" id="user_id" name="user_id" value="<?php echo set_value('user_id'); ?>" /></li>
    		<li><input type="password" maxlength="10" id="user_pwd" name="user_pwd" value="" /></li>
    		<li><img id="login_btn" style="cursor: pointer;" src="<?=IMG_DIR?>/main_btnLogin.gif" width="71" height="48" alt="로그인" /></li>
    	</ul>
    <?=form_close()?>
 </div>

 </body>
 <script  type="text/javascript">
 $(function(){
     var ENTER_KEY = 13;   // Enter  keycode 값
     
     // inoput 항목에 stand out 효과 주기
     /*
	$("#user_id, #user_pwd").bind("click keydown",function() {
		// perform exposing for the clicked element
		$(this).expose({
		  color : '#ccc',
          opacity : 0.6
		});  

	});
    */     
     
     // 전송전 로그인필드 검증 처리
     $("#login_btn").click(function(){
        /*
        var user_id = $("#user_id").val();
        var user_pwd = $("#user_pwd").val();
        
        var regIdExp = /^[a-z0-9_]{4,20}$/;
         //입력을안했다면
        if(user_id.length <= 0){
           alert("아이디를 입력하세요");
           return false;
        }else if(user_id.match(regIdExp) === false){
           alert("아이디를 확인하세요");
           return false;          
        }

        if(user_pwd.length <= 0){
           alert("비밀번호를 입력하세요");
           return false;
        }else if(checkPassword(user_pwd) === false){
           alert("비밀번호를 확인하세요");
           return false;          
        }

        //데이터형식이맞지않다면
        alert('done!!');        
        */
        $("form").submit();
     });
     
     // 비밀번호창에 엔터키를 누르면 로그인버튼 트리거
     $("#user_pwd").keydown(function(event){
        if(event.keyCode == ENTER_KEY){
            $("#login_btn").click();
        }
     });
     
     // 아이디 필드에 포커스
     $("#user_id").focus();
 });
 
function checkPassword(pwd){
    reg1 = /^[a-z\d]{6,12}$/i;  //a-z와 0-9이외의 문자가 있는지 확인
    reg2 = /[a-z]/i;  //적어도 한개의 a-z 확인
    reg3 = /\d/;  //적어도 한개의 0-9 확인
    return reg1.test(pwd) && reg2.test(pwd) && reg3.test(pwd);
} 
     
 </script>
</html>
