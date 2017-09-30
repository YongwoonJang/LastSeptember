<?php
  require("./lib/db.php");
  require("./config/config.php");

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);
  $result = modify_element($conn, $_POST['id'], $_POST['context'], $_POST['name']);

  header('Location: '.$config["home"].'');

 ?>
