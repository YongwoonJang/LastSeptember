<?php
function db_init($host, $duser, $dpw, $dname, $dport){
  $conn = mysqli_connect($host, $duser, $dpw, $dname, $dport) or die("connection fail");
    return $conn;
}

function add_element($conn, $contents, $name){
  $result = mysqli_query($conn, 'INSERT INTO content (contents, title) VALUES ("'.$contents.'","'.$name.'")');
  return $result;
}

function delete_element($conn, $id){
  $reulst = mysqli_query($conn, 'DELETE FROM content WHERE id="'.$id.'"');
  return $result;
}

function modify_element($conn, $id, $content, $name){

  $result = mysqli_query($conn, 'UPDATE content SET contents="'.$content.'", title="'.$name.'" WHERE id="'.$id.'"');
  return $result;
}

function search_element($conn, $column_name, $search_value){

  $result = mysqli_query($conn, 'SELECT * FROM content WHERE '.$column_name.' LIKE "%'.$search_value.'%"');
  return $result;
}


?>
