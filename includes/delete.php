<?php
  include 'dbh.inc.php';
  $id = $_GET['id'];
  $sql = "delete from productdb where id=$id";
  $con->query($sql);
  $con->close();
  header("location: crud.php?id=");
?>