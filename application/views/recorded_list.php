	<div id="container">
			<!-- content03-->
			<div class="content03">

						<div class="">
						<table  cellpadding="0" cellspacing="0" class="table01">
								  <col width="25%" />
								  <col width="25%" />
								  <col width="25%" />
								  <col width="25%" />
							<tbody>
								<tr>
									<th>조회날짜</th>
									<td>
										<select id="">
											<option value="" selected="selected">2012-01-15</option>
											<option value=""></option>
										</select>
									</td>
									<th>조회날짜</th>
									<td>
										<select id="">
											<option value="" selected="selected">2012-01-15</option>
											<option value=""></option>
										</select>
									</td>
								</tr>
								<tr>
									<th>조회날짜</th>
									<td>
										<select id="">
											<option value="" selected="selected">2012-01-15</option>
											<option value=""></option>
										</select>
									</td>
									<th>조회날짜</th>
									<td>
										<select id="">
											<option value="" selected="selected">2012-01-15</option>
											<option value=""></option>
										</select>
									</td>
								</tr>
								<tr>
									<th>외부번호</th>
									<td>
										<select id="">
											<option value="" selected="selected">2012-01-15</option>
											<option value=""></option>
										</select>
									</td>
									<th>조회날짜</th>
									<td>
										<select id="">
											<option value="" selected="selected">2012-01-15</option>
											<option value=""></option>
										</select>
									</td>
								</tr>
							</tbody>
						</table>
						</div>

						<div class="">
						<table  cellpadding="0" cellspacing="0" class="table02">
								  <col width="" />
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
                            <!--
								<tr>
									<td class="first">341</td>
									<td>1050</td>
									<td>0100000000</td>
									<td>2012-01-15</td>
									<td>10:47:42</td>
									<td>00:47</td>
									<td>0</td>
									<td><a href="#"  class="btn_listen">듣기</a></td>
									<td><a href="#"  class="btn_down">다운로드</a></td>
								</tr>
								<tr>
									<td class="first">341</td>
									<td>1050</td>
									<td>0100000000</td>
									<td>2012-01-15</td>
									<td>10:47:42</td>
									<td>00:47</td>
									<td>0</td>
									<td><a href="#"  class="btn_listen">듣기</a></td>
									<td><a href="#"  class="btn_down">다운로드</a></td>
								</tr>
								<tr>
									<td class="first">341</td>
									<td>1050</td>
									<td>0100000000</td>
									<td>2012-01-15</td>
									<td>10:47:42</td>
									<td>00:47</td>
									<td>0</td>
									<td><a href="#"  class="btn_listen">듣기</a></td>
									<td><a href="#"  class="btn_down">다운로드</a></td>
								</tr>
								<tr>
									<td class="first">341</td>
									<td>1050</td>
									<td>0100000000</td>
									<td>2012-01-15</td>
									<td>10:47:42</td>
									<td>00:47</td>
									<td>0</td>
									<td><a href="#"  class="btn_listen">듣기</a></td>
									<td><a href="#"  class="btn_down">다운로드</a></td>
								</tr>
								<tr>
									<td class="first">341</td>
									<td>1050</td>
									<td>0100000000</td>
									<td>2012-01-15</td>
									<td>10:47:42</td>
									<td>00:47</td>
									<td>0</td>
									<td><a href="#"  class="btn_listen">듣기</a></td>
									<td><a href="#"  class="btn_down">다운로드</a></td>
								</tr>
								<tr>
									<td class="first">341</td>
									<td>1050</td>
									<td>0100000000</td>
									<td>2012-01-15</td>
									<td>10:47:42</td>
									<td>00:47</td>
									<td>0</td>
									<td><a href="#"  class="btn_listen">듣기</a></td>
									<td><a href="#"  class="btn_down">다운로드</a></td>
								</tr>
                                
                                -->
                                
							</tbody>
						</table>
                        <?=$link?>
						<div class="alignC"><input type="button" value="등록" class="btn01"><input type="button" value="삭제" class="btn01"></div>
						</div>

				
			</div><!--// content03-->

	
	</div><!--// container-->
<div id="footer">서울시 관악구 신사동 000-00  고객지원팀:02-000-0000   COPYRIGHT2012 CORPORATION.ALL RIGHTS RESERVED.</div>	
</div>

 </body>
</html>
