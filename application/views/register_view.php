	<div id="container">
  			<div style="text-align: center;" class="img">
              <img src="<?=IMG_DIR?>/img2.jpg" width="778" height="181" alt="img" />
            </div>       
			<!-- content03-->
			<div class="content03">

						<div class="tm20">
						<p class="title01">회원등록</p>
                        <?=form_open('auth/register')?>
						<table  cellpadding="0" cellspacing="0" class="table01">
								  <col width="20%" />
								  <col width="80%" />
							<tbody>
								<tr>
									<th>아이디</th>
									<td>
										<input type="text" maxlength="15" name="user_id" minlength="3" size="20"  />
									</td>
								</tr>
								<tr>
									<th>이름</th>
									<td>
										<input type="text" maxlength="15" name="user_name" id="user_name" size="20"  minlength="2"/>
									</td>
								</tr>                                
								<tr>
									<th>비밀번호</th>
									<td>
										<input type="password" maxlength="20" name="user_pwd" id="user_pwd" size="20" minlength="4"/>
									</td>
								</tr>
								<tr>
									<th>비밀번호확인</th>
									<td>
										<input type="password" maxlength="20" name="user_re_pwd" id="user_re_pwd" size="20"  minlength="4"/>
									</td>
								</tr>
								<tr>
									<th>회원등급</th>
									<td>
									   <select id="user_level" name="user_level">
                                            <option value="n">일반회원</option>
                                            <option value="s">관리자</option>
                                       </select>
									</td>
								</tr>                                
                                <!--
								<tr>
									<th>주민등록번호</th>
									<td>
										<input type="text" size="7"  /> - <input type="text" size="7"  />
									</td>
								</tr>
								<tr>
									<th>전화번호</th>
									<td>
										<input type="text" size="5"  /> - <input type="text" size="5"  /> - <input type="text" size="5"  /> 
									</td>
								</tr>
								<tr>
									<th>핸드폰번호</th>
									<td>
										<input type="text" size="5"  /> - <input type="text" size="5"  /> - <input type="text" size="5"   /> 
									</td>
								</tr>
								<tr>
									<th>우편번호</th>
									<td>
										<input type="text" size="5" /> - <input type="text" size="5" /><input type="button" value="우편번호" class="btn01" > <br />
										<input type="text" size="50" />
										<input type="text" size="50" />
									</td>
								</tr>
                                
                                -->
							</tbody>
						</table>
                            <div class='submitButton'>
                                <input type="submit" value="등록" />
                                <input type="reset" value="리셋" />
                            </div>
                      
                         <?=form_close()?>
						</div>
	
			</div><!--// content03-->

	
	</div><!--// container-->
    <!-- <div id="footer">서울시 관악구 신사동 000-00  고객지원팀:02-000-0000   COPYRIGHT2012 CORPORATION.ALL RIGHTS RESERVED.</div>
    -->	
</div>



</body>
<link type="text/css" href="<?=CSS_DIR?>/register_error.css" rel="stylesheet" />	
<link type="text/css" href="<?=CSS_DIR?>/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?=JS_DIR?>/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="<?=JS_DIR?>/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
$(function(){
    $("input:submit, input:reset").button();
    
    // 최소 입력 글자 체크
    $.tools.validator.fn("[minlength]",  function(input, value) {
    	var min = input.attr("minlength");
    	return value.length >= min ? true : {     
    		en: "최소  " + min + " 글자 이상 입력해주세요"
    	};
    });
    
    // 비밀번호가 같은지 체크
    $.tools.validator.fn("#user_re_pwd", "비밀번호가 서로 다릅니다.", function(input, value) {
        var pwdVal = $("#user_pwd").val();
    	return  pwdVal == value;
    });    
    
    
    $("form").validator();    
 });

</script>
</html>
