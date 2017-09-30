<?php

		require("./config/config.php");
		require("./lib/db.php");

		$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);
		$result = mysqli_query($conn, "SELECT count(*) FROM content");
		$row = mysqli_fetch_assoc($result);
		$countOfRow = $row['count(*)']; // count of rows;

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
  		    <h1 class="display-4"><a href="./index.php" style="color:limegreen; text-decoration:none;">Project <span style="color:green">Starbucks</span></a></h1>
  	</div>

		<nav class="row navbar navbar-expand-lg navbar-light bg-dark" style="margin-bottom: 10px;">
				 <a class="navbar-brand" href="./index.php" style="color:limegreen;">ProjectStarBucks</a>

				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    	 	 	<span class="navbar-toggler-icon"></span>
  	 		 </button>

				 <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					 <div class="navbar-nav">
						 <a class="nav-item nav-link active" href="#" style="color : lawngreen">CSS <span class="sr-only">(current)</span></a>
					 </div>
			 	 </div>


		</nav>



    <div class="row">

			<div class="nav flex-column nav-pills col-md-2" id="v-pills-tab" role="tablist" style="font-size:17px;">

				<a style="background-color:black; color:lawngreen;" class="nav-link" id="v-pills-insert-tab" data-toggle="pill" href="#v-pills-insert" role="tab" aria-controls="v-pills-insert" aria-expanded="true">Insert</a>
				<a style="background-color:black; color:lawngreen;" class="nav-link" id="v-pills-delete-tab" data-toggle="pill" href="#v-pills-delete" role="tab" aria-controls="v-pills-delete" aria-expanded="true">Delete</a>
				<a style="background-color:black; color:lawngreen;" class="nav-link" id="v-pill-modify-tab" data-toggle="pill" href="#v-pills-modify" role="tab" aria-controls="v-pills-modify" aria-expanded="true">Modify</a>
				<a style="background-color:black; color:lawngreen;" class="nav-link" id="v-pill-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-expanded="true">Search</a>

				<?php
					//This button for list showing.
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

<!-- Right side part !-->

			<div class="tab-content col-md-10" id="v-pills-tabContent">


				<?php

						//insert 하는 button이 생기게 하고 이에 따라 tab의 내용도 변경되도록 함.
						echo '<div class="tab-pane fade" id="v-pills-insert" role="tabpanel" aria-labelledby="v-pills-insert-tab">';
						echo '
									<!-- tab 시작 !-->
									<div class="row" id="description">
										<label>
											This Section is used for insert.
										</label>
									</div>

									<div class="col-md-12 card"  style="padding-right:25px">
											<div class="card-body">
												<label><h4> Code Name </h4></label>
													<textarea id="inputTitle" name="NameSection" rows="1" cols="45" style="margin-left:15px; width:100%;">Not inserted</textarea>
												<br/>
												<label> <h4> CSS Code </h4> </label>
												<br/>
												<label> <h5>&lt;style&gt; </h5> </label>
												<br/>
												<label> <h5>  &nbsp;  &nbsp;  .htmlcode { </h5> </label>
												<textarea id="inputSource" name="CodeSection" rows="10" cols="45" style="margin-left:20px; width:100%;">Not inserted</textarea>
												<br/>
												<label> <h5> &nbsp; &nbsp;  } </h5> </label>
												<br/>
												<label> <h5>&lt;/style&gt; </h5> </label>
												<br/>
												<br/>


												<label> <h4> HTML Code </h4> </label>
												<br/>
												<label> &lt;div class="htmlcode"&gt; Hi Im Yongwoon Jang &lt;/div&gt; </label>
											</div>
									</div>

									<div class = "row justify-content-center" style="margin-bottom:30px; margin-top:10px;">
											<input type="button" name="adder" value="Code Adder" id="adder" class="btn btn-dark btn-lg"/><!-- adder code is inserted!-->
									</div>
									<!-- tab 종료 !-->';

							echo '</div>';

							//delete 하는 button이 생기게 하고 이에 따라 tab의 내용도 변경되도록 함.
							echo '<div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab">';
							echo '<!-- tab 시작 !-->
										<div class="row" id="description">
											<label>
												This Section is used for Delete
											</label>
										</div>

										<div class="col-md-12 card"  style="padding-right:25px">';

							$result = mysqli_query($conn, "SELECT * FROM content");

							echo '<ul class="list-group">';
							while($row = mysqli_fetch_assoc($result)){
								echo '
									<li class="list-group-item list-group-item-action">
										<a href="./delete.php?deleteId='.$row['id'].'">'.$row['title'].'</a>
									</li>';
							}
							echo '</ul>';
							echo '</div>';
							echo '</div>';

							//modify part
									echo '<div class="tab-pane fade" id="v-pills-modify" role="tabpanel" aria-labelledby="v-pills-modify-tab">';

									echo '<!-- tab 시작 !-->
												<div class="row" id="description">
													<label>
														This Section is used for Modify
													</label>
												</div>';

									echo '<div class="col-md-12 card"  style="padding-right:25px;">';

									$result = mysqli_query($conn, "SELECT * FROM content");


											//start of pannel group
		            			echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
												while($row = mysqli_fetch_assoc($result)){
													echo '<div class="panel panel-default">';
													echo '
																<span class="side-tab" data-target="#tab'.$row['id'].'" data-toggle="tab" role="tab" aria-expanded="false">
																	<div class="panel-heading" role="tab" id="heading'.$row['id'].'" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id'].'" aria-expanded="true" aria-controls="collapse'.$row['id'].'">
																			<h4 class="panel-title">'.$row['title'].'</h4>
																	</div>
																</span>

																<div id="collapse'.$row['id'].'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$row['id'].'">
						                        <div class="panel-body">
						                        	<textarea id="newTitle'.$row['id'].'">'.$row['title'].'</textarea>
																			<textarea id="newContents'.$row['id'].'">'.$row['contents'].'</textarea>
																			<input type="hidden" id="newId'.$row['id'].'" value="'.$row['id'].'"/>
																			<input type="button" value="Confirm" id="modifier" onClick="codeModifier('.$row['id'].')" />
																			<!-- Add confirm button !-->
						                        </div>
						                    </div>';
													echo '</div>';
												}
		            			echo '</div>';
											//end of panel group

									echo '</div>';
									echo '</div>';
							//end of modify part

						//contents part.
						//count 하는 만큼 row가 생성되도록 함.
						$tvariable = 0;
						$result = mysqli_query($conn, "SELECT * FROM content");
						while($row = mysqli_fetch_assoc($result)){
							if($tvariable == 0){
										echo '<div class="tab-pane active" id="v-pills-'.$row['id'].'" role="tabpanel" aria-labelledby="v-pills-'.$row['id'].'-tab">';
										$tvariable = 1;
							}else{
										echo '<div class="tab-pane fade" id="v-pills-'.$row['id'].'" role="tabpanel" aria-labelledby="v-pills-'.$row['id'].'-tab">';

							}
							echo '
											<!-- right tab 시작 !-->
											<!-- tab의 표시 !-->
											<div class="row" id="description">
												<label>
													This code is used for coloring
												</label>
											</div>

											<div class="row">
												<div class="col-md-6 card"  style="padding-right:25px">
														<div class="card-body">
															<label> <h4> CSS Code </h4> </label>
															<br/>
															<label> <h5>&lt;style&gt; </h5> </label>
															<br/>
															<label> <h5>  &nbsp;  &nbsp;  .htmlcode { </h5> </label>
															<textarea id="source'.$row['id'].'" name="CodeSection" rows="10" cols="45" style="margin-left:20px; width:100%;">'.$row['contents'].'</textarea>
															<br/>
															<label> <h5> &nbsp; &nbsp;  } </h5> </label>
															<br/>
															<label> <h5>&lt;/style&gt; </h5> </label>
															<br/>
															<br/>


															<label> <h4> HTML Code </h4> </label>
															<br/>
															<label> &lt;div class="htmlcode"&gt; Hi Im Yongwoon Jang &lt;/div&gt; </label>
														</div>
												</div>

												<div class="col-md-6 card">
														<div class="card-body">
															<label> <h4> Result of implementation </h4> </label>
															<br>
															<div id="iframeWrapper'.$row['id'].'">
																<iframe src="./firstcode.php" width="100%" height="500"></iframe>
															</div>
														</div>
												</div>

											</div>

											<div class = "row justify-content-center" style="margin-bottom:30px; margin-top:10px;">
													<input type="button" name="processor" value="Code Implementation" id="generator" class="btn btn-dark btn-lg" onClick="codeImplementator('.$row['id'].')"/>
											</div>
											<!-- tab 종료 !-->';

									echo '</div>';
						}

						//Search part.
						echo '<div class="tab-pane active" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">';
						echo '
								<!-- right tab 시작 !-->
								<div class="row" id="description">
									<label>
										This code shows result of search
									</label>
								</div>

								<textarea id = "search_column"></textarea>
								<textarea id = "search_value"></textarea>

								<div class = "row justify-content-center" style="margin-bottom:30px; margin-top:10px;">
										<input type="button" value="search" id="finder" class="btn btn-dark btn-lg" onClick="finder()"/>
								</div>

								<div class="col-md-6 card">
										<div class="card-body">
											<label> <h4> Result of Search </h4> </label>
											<br>
											<div id="iframeWrapperForSearch">
												<iframe src="./search.php" width="100%" height="500"></iframe>
											</div>
										</div>
								</div>
								<!-- tab 종료 !-->';

							echo '</div>';
				 ?>

			 </div><!--end of tab contents!-->
		</div><!-- end of row !-->
		</div><!-- end of container!-->

		<!-- 내용은 여기서 종료됨 !-->
		<!-- Frame으로 전송하는 부분 !-->
		<form id="codeForm" style="margin: 0px; display: none;" autocomplete="off">
          <input name="context" id="code" type="hidden">
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
