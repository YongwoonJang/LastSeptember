<?php
function db_init($host, $duser, $dpw, $dname, $dport){
  $conn = mysqli_connect($host, $duser, $dpw, $dname, $dport) or die("connection fail");
    return $conn;
}

function add_element($conn, $javascriptcontents, $csscontents, $htmlcontents, $name){
  $javascriptcontents=str_replace('"','\"',$javascriptcontents);
  $csscontents=str_replace('"','\"',$csscontents);
  $htmlcontents=str_replace('"','\"',$htmlcontents);
  $javascriptcontents=str_replace("'","\'",$javascriptcontents);
  $csscontents=str_replace("'","\'",$csscontents);
  $htmlcontents=str_replace("'","\'",$htmlcontents);

  $result = mysqli_query($conn, 'INSERT INTO content (javascriptcontents, csscontents, htmlcontents, title) VALUES ("'.$javascriptcontents.'","'.$csscontents.'","'.$htmlcontents.'","'.$name.'")');
  return $result;
}

function delete_element($conn, $id){
  $reulst = mysqli_query($conn, 'DELETE FROM content WHERE id="'.$id.'"');
  return $result;
}

function modify_element($conn, $id, $javascriptcontents, $csscontents, $htmlcontents, $name){

  $result = mysqli_query($conn, 'UPDATE content SET javascriptcontents="'.$javascriptcontents.'", csscontents="'.$csscontents.'", htmlcontents="'.$htmlcontents.'", title="'.$name.'" WHERE id="'.$id.'"');
  return $result;
}

function search_element($conn, $column_name, $search_value){

  $result = mysqli_query($conn, 'SELECT * FROM content WHERE '.$column_name.' LIKE "%'.$search_value.'%"');
  return $result;
}

?>
