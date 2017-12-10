<?php

  require("./lib/db.php");
  require("./config/config.php");

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);

  if(isset($_POST['column_context']) & isset($_POST['search_context'])){
    $result = search_element($conn, $_POST['column_context'], $_POST['search_context']);
    while($row = mysqli_fetch_assoc($result)){
      echo $row['id'];
      echo '<br/>';
    }

  }else{
      echo "어떤 내용도 입력되지 않았습니다.";
  }

 ?>
