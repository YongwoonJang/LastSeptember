<?php
  require("./lib/db.php");
  require("./config/config.php");

  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"],$config["dport"]);
  $result = modify_element($conn, $_POST['id'], $_POST['javascriptcontext'], $_POST['csscontext'], $_POST['htmlcontext'], $_POST['name']);

  $myfile = fopen("./sourcestorage/".$_POST['id'].".php", "w") or die("Unable to open file!");
  fwrite($myfile, "<!DOCTYPE html><html><head><style>");
  fwrite($myfile, $_POST['CSScontext']);
  fwrite($myfile, "</style></head><body>");
  fwrite($myfile, $_POST['HTMLcontext']);
  fwrite($myfile, "<script>");
  fwrite($myfile, $_POST['JAVASCRIPTcontext']);
  fwrite($myfile, "</script></body></html>");
  fclose($myfile);

  header('Location: '.$config["home"].'');

 ?>
