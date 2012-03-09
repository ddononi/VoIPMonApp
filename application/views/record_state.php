	<div id="container">
  			<div style="text-align: center;" class="img">
              <img src="<?=IMG_DIR?>/img.jpg" width="778" height="181" alt="img" />
            </div>     
			<div class="content01">
				<div class="content01Menu">
					<!-- STYSTEM 01 현황 -->
						<div class="systemBox01">
							<ul >
								<li style="text-align: right;" class="colorR"> 5</li>
								<li style="text-align: right;" class="colorY"> 0</li>
								<li style="text-align: right;" class="colorW"> 0</li>
								<li style="text-align: right;" class="colorG"> 0</li>
							</ul>
						</div>
					<!-- STYSTEM 02 현황 -->
						<div class="systemBox02">
							<ul>
								<li style="text-align: right;"  class="colorR"> 5</li>
								<li style="text-align: right;" class="colorY"> 0</li>
								<li style="text-align: right;" class="colorW"> 0</li>
								<li style="text-align: right;" class="colorG"> 0</li>
							</ul>
						</div>
				</div>
				
			</div>
			<div class="content02">

					<!-- STYSTEM 01 테이블 -->
					<p class="ipBox01"><span>10.70.2.93</span></p>
					<table id="stateBox01" cellpadding="0" cellspacing="0" border="0">
                    <?php
                     // 15개 단위로 채널상채를 나열해 준다.
                     for($i=0; $i < 60; $i++): ?>
                        <?php if($i % 16 == 0): ?>
                            <tr>
                        <?php endif; ?>
                        <td><span class="icG" title="<?=$i?>번 채널"><?=$i?></span></td>
                        <?php if( $i != 0 && ($i == 59 OR ($i+1) % 16 == 0) ): ?>
                            </tr>
                        <?php endif; ?>                        
                    <?php endfor; ?>
					</table>

				<!-- STYSTEM 02 테이블 -->
					<p class="ipBox02"><span>10.70.2.93</span></p>
					<table id="stateBox02" cellpadding="0" cellspacing="0" border="0">
                    <?php for($i=0; $i < 60; $i++): ?>
                        <?php if($i % 16 == 0): ?>
                            <tr>
                        <?php endif; ?>
                        <td><span class="icG" title="<?=$i?>번 채널"><?=$i?></span></td>
                        <?php if( $i != 0 && ($i == 59 OR ($i+1) % 16 == 0) ): ?>
                            </tr>
                        <?php endif; ?>                        
                    <?php endfor; ?>
					</table>

			</div>		
	
	</div>
<div id="footer"><?php echo $this->config->item('footer_title'); ?></div>	
</div>

<h1 id="qunit-header">단위 테스트</h1>
 <h2 id="qunit-banner"></h2>
 <div id="qunit-testrunner-toolbar"></div>
 <h2 id="qunit-userAgent"></h2>
 <ol id="qunit-tests"></ol>
 <div id="qunit-fixture">test markup, will be hidden</div>



<!-- tooltip element -->
<div class="tooltip">

	<img src="http://static.flowplayer.org/img/title/eye.png" alt="Flying screens" 
		style="float:left;margin:0 15px 20px 0" />

	<table style="margin:0">
		<tr>
			<td class="label">File</td>
			<td>flowplayer-3.2.7.zip</td>
		</tr>
		<tr>
			<td class="label">Date</td>
			<td>2011-03-03</td>
		</tr>
		<tr>
			<td class="label">Size</td>
			<td>112 kB</td>
		</tr>
		<tr>
			<td class="label">OS</td>
			<td>all</td>
		</tr>		
	</table>

	<a href="/3.2/">What's new in 3.2</a>
</div>

 </body>
<script type="text/javascript">
$(function(){
    /**
     * ajax로 녹취 상태값을 가져와 해당값에 따라 
     * 녹취 상태 아이콘 및 카운트 박스를 변경
     */
    var rec = {
        // 변경할 색
        stateColor : {
            icR : 0,
            icW : 1,
            icY : 2,
            icG : 3
        },
        
        // 녹취 상태 박스
        board : [
            $("table#stateBox01 td"),
            $("table#stateBox02 td")
        ],
        
        // 카운트 박스
        box : [
            $(".systemBox01 ul li"),
            $(".systemBox02 ul li")
        ],
        // refresh 주기
        refresh : 5000,       
        url :  'http://ddononi.cafe24.com/php_test/test1.php',
    
        loadState : function(){
            $.ajax({
                // 성공시 녹취 상태 박스 갱신
                success : function(data){
                    rec.chageState(rec.board[0], data['a'], rec.box[0]);
                    rec.chageState(rec.board[1], data['b'], rec.box[1]);
                },
                errror : function(jqXHR, textStatus, errorThrown){
                    
                  //  alert(errorThrown);
                },
                complete : function(jqXHR, textStatus){
                    // ajax처리가 완료되면 일정 시간후 loadState 재 호출
                    setTimeout(rec.loadState, rec.refresh); 
                }
            });
        },
        
        /**
         * 녹취 상태 변경 함수
         */
        chageState : function($that, data, $box){
            var className;                  
            var dataSize = data.length;     
            // 카운트 박스넣을 각 변수
            var recording = 0;
            var wait = 0;
            var yield = 0;
            var disConn = 0;
            
            // 녹취 상태 table의 td를 순회하면서 데이터 상태값에 따라
            // 아이콘 색을 변경한다.
            $that.each(function(i){
                if(dataSize < i){   // 데이터 크기를 넘으면 리턴처리
                    return;
                }
                switch(data[i]){
                    case rec.stateColor.icR:    // 녹음중
                        className = "icR";
                        recording++;
                        break;
                    case rec.stateColor.icW:    // 대기중
                        className = "icW";
                        wait++;                    
                        break;
                    case rec.stateColor.icY:    // 미사용
                        className = "icY";
                        yield++;
                        break;
                    case rec.stateColor.icG:    // 단선확인
                        className = "icG";
                        disConn++;
                        break;
                    
                }
                // 클래스 갱신
               $(this).children('span').removeClass()
                      .addClass(className).tooltip({      // 툴팁설정
                            events: {
                              def : 'click, mouseout',    // 툴팁 기본 이벤트 설정
                            },                        
                            onBeforeShow : function() {
                                // get방식으로 인덱스를 보내 해당 인덱스값을 통해 
                                // db에서 채널정보를 가져온 후 툴팁 정보를 갱신
                                var url = 'http://ddononi.cafe24.com/php_test/test2.php?channel=' + i;
                                $('.tooltip').load(url);
                            }
                      });
            });
           // 녹취 카운트 박스 갱신 
           $box.eq(rec.stateColor.icR).text(recording); // 녹음중
           $box.eq(rec.stateColor.icW).text(wait);      // 대기중
           $box.eq(rec.stateColor.icY).text(yield);     // 미사용
           $box.eq(rec.stateColor.icG).text(disConn);   // 단선확인
        },
        
        startLoad : function(){
            // 시작시 미리 ajax를 설정해 놓는다.
            $.ajaxSetup({
               url: this.url,
               dataType : 'json'                                         
            });
            this.loadState();
        }
    }

    rec.startLoad();


    
    module("Module A");
    test("녹음 채널 ajax 테스트", function() {
    	expect(6);  // 예상되는 test 수 error는 발생 하지 않는다고 예상
        stop();     // 비동기 시작전
    	$.ajax({
    		url: 'http://ddononi.cafe24.com/php_test/test1.php',
            dataType : 'json',
    		beforeSend: function(){ ok(true, "beforeSend");  },
    		success: function(data){ 
              var size = data['a'].length;
              equal(size, 60, " 반환 되는 채널 갯수 60 예상");  
              equal(data instanceof Object, true, " 반환 되는 형식");  
              equal(data['a'][1] < 4, true, " 0~3까지 "); 
              equal(data['a'][3] >= 0, true, " 0~3까지 "); 
              start();  // 비동기 테스트 시작
            },
    		error: function(){ ok(false, "error"); },
    		complete: function(){ok(true, "complete");  start(); }
    	});
        
    });
      
});
</script> 



</html>
