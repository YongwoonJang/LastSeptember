<?php

  require("./lib/db.php");
  require("./lib/filehandler.php");
  require("./config/config.php");

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);
  $result = add_element($conn, $_POST['JAVASCRIPTContext'], $_POST['CSSContext'], $_POST['HTMLContext'], $_POST['name']);

  //max row number check
  $result = mysqli_query($conn, "SELECT max(id) FROM content");
  $row = mysqli_fetch_assoc($result);
  $idnumber = $row['max(id)'];

  file_writer($idnumber, $_POST['CSSContext'], $_POST['HTMLContext'],$_POST['JAVASCRIPTContext']);

  header('Location: '.$config["home"].'');

 ?>
