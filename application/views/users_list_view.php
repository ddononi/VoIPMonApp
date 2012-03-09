	<div id="container">
			<!-- content03-->
			<div class="content03">
              			<div class="img">
                          <img src="<?=IMG_DIR?>/img2.jpg" width="778" height="181" alt="img" />
                        </div>
						<div class="">
                        <form id="frm" name="frm" action="./rec_list" method="get">
                            <!-- 리셋 클릭시 날짜 필드 값이 리셋이 안되는 관계로 
                                넘어온 get 날짜는 일단 여기에 넣고 document ready 가 됐을때
                                날짜 값이 있으면 startDate, endDate에 넣어준다. -->
                            <input type="hidden" value="<?php echo $startDate; ?>" id="tmpStartDate" />
                            <input type="hidden" value="<?php echo $endDate; ?>" id="tmpEndDate" />
    						<table cellpadding="0" cellspacing="0" class="table01 tablesorter" >
    							  <col width="25%" />
    							  <col width="25%" />
    							  <col width="25%" />
    							  <col width="25%" />
    							<tbody>
    								<tr>
    									<th>가입시작날짜</th>
    									<td>
    										<input value="" type="text"  id="startDate" name="startDate" alt="가입시작날짜" />
    									</td>
    									<th>가입종료날짜</th>
    									<td>
    										<input value="" type="text"  id="endDate" name="endDate" alt="가입종료날짜" />
    									</td>
    								</tr>    
                                    <!--                        
    								<tr>
    									<th>채널정보</th>
    									<td>
    										<input value="" type="text"  id="" name="" title="시작날짜" />
    									</td>
    									<th>전화번호</th>
    									<td>
    										<input value="" type="text"  id="" name="" title="전화번호" />
    									</td>
    								</tr>
                                    
                                    -->
    								<tr>
    									<th>외부번호</th>
    									<td>
    										<input value="" type="text"  id="aaa" name="aaa" title="시작날짜" />
    									</td>
    									<th>목록수</th>
    									<td>
    										<select id="listAmount" name="listAmount">
    											<option <?php if($listAmount == 10) echo "selected='selected'"; ?> value="10">10개씩 보기</option>
    											<option <?php if($listAmount == 20) echo "selected='selected'"; ?> value="20">20개씩 보기</option>
                                                <option <?php if($listAmount == 30) echo "selected='selected'"; ?> value="30">30개씩 보기</option>
                                                <option <?php if($listAmount == 40) echo "selected='selected'"; ?> value="40">40개씩 보기</option>
                                                <option <?php if($listAmount == 50) echo "selected='selected'"; ?> value="50">50개씩 보기</option>
    										</select>
    									</td>
    								</tr>
    								<tr>
    									<td colspan="4" style="text-align:  center;"><input type="submit" value="검색" /> <input type="reset" value="초기화" /></td>
    								</tr>                                
    							</tbody>
    						</table>
                        </form>
						</div>

						<div class="">
						<table id="recodeList" cellpadding="0" cellspacing="0" class="table02">
							<thead>
								<th class="first">번호</th>
								<th>내선번호</th>
								<th>전화번호</th>
								<th>녹음날짜</th>
								<th>시작시간</th>
								<th>길이</th>
								<th>콜</th>
								<th>듣기</th>
								<th>다운</th>
							</thead>
							<tbody>
                            
                            
                            <?php foreach($query as $row): ?>
								<tr>
									<td class="first">341</td>
									<td><?=$row->f_channel?></td>
									<td><?=$row->f_sdatetime?></td>
									<td><?=$row->f_edatetime?></td>
									<td><?=$row->f_entprog?></td>
									<td><?=$row->f_pathdir?></td>
									<td><a href="#"  class="btn_listen">듣기</a></td>
									<td><a href="#"  class="btn_down">다운로드</a></td>
								</tr>                          
                            <?php endforeach; ?>
  							</tbody>
						</table>
                        <div style="text-align:  right;"><a id="top" href="#">맨위로</a> <a id="recent" href="#">목록</a></div> 
                        <?=$link?>
						</div>

				
			</div><!--// content03-->

	
	</div><!--// container-->
<!-- <div id="footer">서울시 관악구 신사동 000-00  고객지원팀:02-000-0000   COPYRIGHT2012 CORPORATION.ALL RIGHTS RESERVED.</div> -->	
</div>

</body>
<link type="text/css" href="<?=CSS_DIR?>/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?=JS_DIR?>/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="<?=JS_DIR?>/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
$(function(){
    setDatePicker();   
    
    
    // table sort
    $("#recodeList").tablesorter();
    $("#recodeList th").css('cursor', 'pointer');
    // odd td colume stand out
    $("#recodeList tbody tr").each(function(i){
       if(i % 2 == 0){
        $(this).children('td').css('background', '#eee');
       } 
    });
    
    
    //  버튼 설정
    $( "input:submit, input:reset, #recent, #top" ).button();
    
    // 테이블 현재 열 강조 효과
    $("#recodeList td").hover(
      function () {
        $(this).siblings().andSelf().addClass("hover");
      },
      function () {
        $(this).siblings().andSelf().removeClass("hover");
      }
    );    
});

setDatePicker = function(){
        // date picker
    var datePickerOption = {
        dateFormat : 'yy-mm-dd',
        changeMonth: true,
    	changeYear: true,    
        dayNames : ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin : ['일', '월', '화', '수', '목', '금', '토'],
        monthNamesShort : ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ],
        monthNames : ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ]
    };
    $("#startDate, #endDate").datepicker(datePickerOption);
    if($("#tmpStartDate").val().length > 0 ){
         $("#startDate").datepicker( "setDate" , $("#tmpStartDate").val() );
    }
    
    if($("#tmpEndDate").val().length > 0 ){
         $("#endDate").datepicker( "setDate" , $("#tmpEndDate").val() );
    } 
}

</script>
</html>
