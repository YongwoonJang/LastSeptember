<?php

		require("./config/config.php");
		require("./lib/db.php");
		require("./lib/template.php");

		$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);
		$result = mysqli_query($conn, "SELECT count(*) FROM content");
		$row = mysqli_fetch_assoc($result);
		$countOfRow = $row['count(*)']; // count of rows;

		//배열 생성
		$menu = array("insert","delete","modify","search");

		function title($titlename){
			echo '<label class="row" id="description" style="margin-left:0px;">';
			if($titlename == "insert"){
			echo '새로운 코드를 입력하고 싶을 때 사용합니다.';

			}else if($titlename == "delete"){
			echo '코드를 지우고 싶을 때 사용합니다.';

			}else if($titlename == "modify"){
				echo '코드를 변경하고 싶을 때 사용합니다.';

			}else if($titlename == "search"){
				echo '코드를 찾고 싶을 때 사용합니다.';

			}else{
				echo ''.$titlename.' 하고 싶을 때 사용합니다.';
			}
			echo '</label>';

		}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>

  <div class="container">

  	<div class="row justify-content-center" style="padding-top:30px;padding-bottom:30px">
  		    <h1 class="display-4"><a href="./index.php" style="color:limegreen; text-decoration:none;">스타벅스<span style="color:green">프로젝트</span></a></h1>
  	</div>

		<nav class="row navbar navbar-expand-lg navbar-light bg-dark" style="margin-bottom: 10px;">
				 <a class="navbar-brand" href="./index.php" style="color:limegreen;">집으로</a>

				 <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				 	<div class="navbar-nav">
				 		<a class="nav-item nav-link active" href="#" style="color : lawngreen">CSS <span class="sr-only">(current)</span></a>
				 	</div>
				 </div>

				 <!-- toggler !-->
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    	 	 	<span class="navbar-toggler-icon"></span>
  	 		 </button>
		</nav>

		<!-- Selector(Upper side) !-->
					<div id="v-pills-tab" role="tablist" class="nav-pills nav justify-content-center">

									<!-- menu(Insert delete) part !-->
									<div class = "row container-fluid" style="margin-bottom:10px; border: 2px solid rgb(0,0,0);">
										<?php
												foreach($menu as $menuname){
													echo '<div class="col menuButton">';
													echo '<a class="nav-link" id="v-pills-'.$menuname.'-tab" data-toggle="pill" href="#v-pills-'.$menuname.'" role="tab" aria-controls="v-pills-'.$menuname.'">';
													if($menuname == "insert"){
														echo "코드 추가";
													}else if($menuname == "delete"){
														echo "코드 삭제";
													}else if($menuname == "modify"){
														echo "코드 수정";
													}else if($menuname == "search"){
														echo "코드 찾기";
													}
													echo '</a></div>';
												}
										 ?>
							 		</div>
					</div>

		<!-- Layout of Selector area(Left side) and Showing are(Right side) !-->
		<div class="row">
				<!-- Selector area(Left side) !-->
				<div class="flex-column col-md-2" style="font-size:17px; border:2px solid rgb(0,0,0); border-radius:5px;">

						<!-- Saved codes !-->
							<div id="v-pills-tab" role="tablist" class="nav-pills nav">
							<?php
								$tvariable = 0; // variable for setting initial clicked button.
				      	$result = mysqli_query($conn, "SELECT * FROM content");
									while($row = mysqli_fetch_assoc($result)){
										echo '<li class="nav-item">';
										if($tvariable == 0){
											echo '<a class="nav-link active" id="v-pills-'.$row['id'].'-tab" data-toggle="pill" href="#v-pills-'.$row['id'].'" role="tab" aria-controls="v-pills-'.$row['id'].'" aria-expanded="true" onClick="changeTab('.$row['id'].')">'.$row['title'].'</a>';
											$tvariable = 1;

										}else{
											echo '<a class="nav-link" id="v-pills-'.$row['id'].'-tab" data-toggle="pill" href="#v-pills-'.$row['id'].'" role="tab" aria-controls="v-pills-'.$row['id'].'" aria-expanded="true" onClick="changeTab('.$row['id'].')">'.$row['title'].'</a>';

										}
										echo '</li>';
									}
							?>
					</div>
				</div>
				<!-- end of selector!-->

				<div class="tab-content col-md-10" id="v-pills-tabContent">
				<!-- Right side part !-->

								<?php
								//Insert tab start
									echo '<div class="tab-pane active" id="v-pills-insert" role="tabpanel" aria-labelledby="v-pills-insert-tab">';
									//code title section
									title("insert");
									//code context section
									echo '
												<!-- code insert section !-->
													<div class="row container-fluid">
															<div class="card-body">';
									whiteBoardForCode("insert", NULL, NULL, NULL, NULL);
									echo '			</div>
													</div>
												<!-- code button section !-->
													<div class = "row justify-content-center" style="margin-bottom:30px; margin-top:10px;">
															<input type="button" name="adder" value="Code Adder" id="adder" class="btn btn-dark btn-lg"/><!-- adder code is inserted!-->
													</div>';

									echo '</div>';
									//end of insert tab

									//delete tab start
									echo '<div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab">';
										//code title section
										title("delete");
										echo '
													<!-- delete item\'s section !-->
										    	<div class="row container-fluid">
										      <ul class="row container-fluid list-group">';
													$result = mysqli_query($conn, "SELECT * FROM content");
													while($row = mysqli_fetch_assoc($result)){
													echo '
													<li class="list-group-item list-group-item-action">
														<a href="http://localhost/projectstarbucks/delete.php?deleteId='.$row['id'].'" area-expanded="true">'.$row['title'].'</a>
													</li>';
													}
										echo '</ul>';
										echo '</div> <!-- end of delete item\'s section !-->';
										echo '</div>';
									//end of delete tab section

									//modify part
											echo '<div class="tab-pane fade" id="v-pills-modify" role="tabpanel" aria-labelledby="v-pills-modify-tab">';
											//modify title
											title("modify");
											//modify contents section
											echo '
														<!-- modify item\'s section !-->
											      <div class="row" style="margin-left:0px; width:100%">
														<div class="panel-group row" id="accordion" role="tablist" aria-multiselectable="true" style="margin-left:0px; width:100%">';
														$result = mysqli_query($conn, "SELECT * FROM content");
														while($row = mysqli_fetch_assoc($result)){
															echo '<div class="panel panel-default row" style="margin-left:0px; width:100%">
																		<span class="side-tab row" data-target="#tab'.$row['id'].'" data-toggle="tab" role="tab" aria-expanded="false" style="margin-left:0px; width:100%">
																			<div class="panel-heading row" role="tab" id="heading'.$row['id'].'" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id'].'" aria-expanded="true" aria-controls="collapse'.$row['id'].'"  style="margin-left:0px; width:100%">
																					<h4 class="panel-title">'.$row['title'].'</h4>
																			</div>
																		</span>

																		<div id="collapse'.$row['id'].'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$row['id'].'" style="margin-left:0px; width:100%">
								                        <div class="panel-body"  style="margin-left:0px; width:100%">';

																whiteBoardForCode("modify",$row['title'], $row['htmlcontents'],$row['csscontents'],$row['javascriptcontents']);

																echo '		<input type="hidden" id="newId'.$row['id'].'" value="'.$row['id'].'"/>
																					<input type="button" value="Confirm" id="modifier" onClick="codeModifier('.$row['id'].')" />
								                        </div>
								                    </div>
																		</div>';
														}
				            	echo '</div>
														</div>
														</div>';
									//end of modify part

									//Search part.
									echo '<div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">';

									title("search");
									echo '
										<div class="row">
											<div class="col-md-6 card">
												<textarea id = "search_column"></textarea>
												<textarea id = "search_value"></textarea>
												<div class = "row justify-content-center" style="margin-bottom:30px; margin-top:10px;">
														<input type="button" value="search" id="finder" class="btn btn-dark btn-lg" onClick="finder()"/>
												</div>
											</div>

											<div class="col-md-6 card">
												<div class="card-body">
													<div style="margin-bottom:10px;"> <h4> Result of Search </h4></div>
													<div id="iframeWrapperForSearch">
														<iframe src="http://localhost/projectstarbucks/search.php" width="100%" height="500"></iframe>
													</div>
												</div>
											</div>
										</div>';
										echo '</div>';

								//contents part.
								$result = mysqli_query($conn, "SELECT * FROM content");
								while($row = mysqli_fetch_assoc($result)){
										echo '<div class="tab-pane fade" id="v-pills-'.$row['id'].'" role="tabpanel" aria-labelledby="v-pills-'.$row['id'].'-tab">';
										title($row['title']);
										echo '
													<div class="row">
														<div class="col-md-6 card"  style="padding-right:25px">
																<div class="card-body">
																	<!-- CSS !-->
																	<div style="margin-bottom:8px;"> <h6> CSS 코드 </h6> <h6>&lt;style&gt;</h6> </div>
																	<textarea id="CSSsource'.$row['id'].'" name="CSSCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:100%;" onkeypress="codeImplementator('.$row['id'].')">'.$row['csscontents'].'</textarea>
																	<div style="margin-bottom:15px;"> <h6>&lt;/style&gt; </h6> </div>

																	<!-- HTML !-->
																	<div style="margin-bottom:8px;"> <h6> HTML 코드 </h6> <h6>&lt;body&gt;</h6> </div>
																	<textarea id="HTMLsource'.$row['id'].'" name="HTMLCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:100%;" onkeypress="codeImplementator('.$row['id'].')">'.$row['csscontents'].'</textarea>
																	<div style="margin-bottom:15px;"> <h6>&lt;/body&gt; </h6> </div>

																	<!-- JAVASCRIPT !-->
																	<div style="margin-bottom:8px;"> <h6> JAVASCRIPT 코드 </h6> <h5>&lt;script&gt;</h5> </div>
																	<textarea id="JAVASCRIPTsource'.$row['id'].'" name="JAVASCRIPTCodeSection" rows="4" cols="45" style="margin-left:20px; margin-bottom:8px; width:100%;" onkeypress="codeImplementator('.$row['id'].')">'.$row['csscontents'].'</textarea>
																	<div style="margin-bottom:15px;"> <h6>&lt;/script&gt; </h6> </div>

																</div>
														</div>
														<div class="col-md-6 card">
																<div class="card-body">
																	<div style="margin-bottom:10px;"><h4> 실행 결과 </h4> </div>
																	<div id="iframeWrapper'.$row['id'].'">
																		<iframe src="http://localhost/ProjectStarBucks/firstcode.php" width="100%" height="500"></iframe>
																	</div>
																</div>
														</div>
													</div>';
											echo '</div>';
								}
								//end of contents part
						 ?>

				</div><!--end of right tab contents!-->
			</div><!-- end of row!-->
		</div><!-- end of container !-->

		<!-- 내용은 여기서 종료됨 !-->
		<!-- Frame으로 전송하는 부분 !-->
		<form id="codeForm" style="margin: 0px; display: none;" autocomplete="off">
					<input name="JAVASCRIPTContext" id="JAVASCRIPTcode" type="hidden">
					<input name="CSSContext" id="CSScode" type="hidden">
					<input name="HTMLContext" id="HTMLcode" type="hidden">
					<input name="name" id="title" type="hidden">
					<input type="hidden" name="id" id="id">
					<input name="column_context" id="column" type="hidden">
					<input name="search_context" id="text" type="hidden">
    </form>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script src="./process.js"></script>

</body>
</html>
