<?php
  require("./lib/db.php");
  require("./config/config.php");

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);
  $result = delete_element($conn, $_GET['deleteId']);
  header('Location: '.$config["home"].'');

 ?>
