<?php

  require("./lib/db.php");
  require("./config/config.php");

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);

  $result = search_element($conn, $_POST['column_context'], $_POST['search_context']);

  while($row = mysqli_fetch_assoc($result)){
    echo $row['id'];
    echo '<br/>';

    //이제 이 아이를 클릭하면 왼쪽 탭으로 연동되게 만든다.
    //ok 
  }

 ?>
