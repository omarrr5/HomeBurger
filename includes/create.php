<?php
  include 'dbh.inc.php';

  $product_name = $_POST["product_name"];
  $product_price = $_POST["product_price"];
  $product_image = $_POST["product_image"];
  $sql = "insert into productdb (product_name,product_price,product_image) values ('$product_name', '$product_price', '$product_image')";
  $con->query($sql);
  $con->close();
  header("location: crud.php?id=");
?>
