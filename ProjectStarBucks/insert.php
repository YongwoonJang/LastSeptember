<?php

  require("./lib/db.php");
  require("./config/config.php");

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);
  $result = add_element($conn, $_POST['context'], $_POST['name']);
  header('Location: '.$config["home"].'');

 ?>
