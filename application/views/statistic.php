	<div id="container">
  			<div style="text-align: center;" class="img">
              <img src="<?=IMG_DIR?>/img.jpg" width="778" height="181" alt="img" />
            </div>       
			<!-- content03-->
			<div class="content03">
    			<div class="graphMenu">
    					<div class="floatL">
                            <form>
     							<input type="radio" name="chart_type" value="bar" /><span class="mr20">막대</span>
    							<input type="radio" name="chart_type" value="line" /><span class="mr20">선</span>
                                <input type="radio" name="chart_type" value="area" /><span class="mr20">면적</span>                                
    							<input type="radio" name="chart_type" value="pie" /><span class="mr20">원</span>
                            </form>                            
    					</div>
    					<div class="floatR"><input type="button" class="btn01"  value="적용"> <input type="button" class="btn01"  value="인쇄"></div>
    			</div>            
				<table id="chart" cellpadding="0" cellspacing="0" class="table02">
                    <caption><?=$chart_caption?></caption>
					<thead>
                        <td></td>
						<th>녹음수</th>
					</thead>
					<tbody>

                    <?php foreach($query as $row): ?>
						<tr>
                        	<th><?=intval($row->f_channel) + 1?>번 채널</th>
							<td><?=$row->cnt?></td>
						</tr>                          
                    <?php endforeach; ?>

					</tbody>
				</table>

			</div><!--// content03-->

	</div><!--// container-->
<!-- <div id="footer">서울시 관악구 신사동 000-00  고객지원팀:02-000-0000   COPYRIGHT2012 CORPORATION.ALL RIGHTS RESERVED.</div> -->	
</div>

</body>

<link type="text/css" href="<?=CSS_DIR?>/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
<link type="text/css" href="<?=CSS_DIR?>/chart/visualize.css" rel="stylesheet" />	
<link type="text/css" href="<?=CSS_DIR?>/chart/visualize-dark.css" rel="stylesheet" />	
<script type="text/javascript" src="<?=JS_DIR?>/chart/excanvas.js"></script>
<script type="text/javascript" src="<?=JS_DIR?>/chart/visualize.jQuery.js"></script>
<script type="text/javascript" src="<?=JS_DIR?>/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript">

$(function(){
    $("input:radio").change(function(){
        var chartType = $(this).val();
        $('table').next('div').remove();    // 이전 차트가 있으면 지워준다.
        $('table').visualize({type: chartType, width: '700px', height: '400px'});     
    }).first().click();

    
});




</script>
</html>
