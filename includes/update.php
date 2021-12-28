<?php
  include 'dbh.inc.php';
  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $sql = "update productdb set product_name='$product_name', product_price='$product_price' where id=$id";
  $result = $con->query($sql);
  $con->close();
  header("location: crud.php?id=");
?>