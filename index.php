<?php
session_start(); 
require_once('component.php');
require_once('includes/dbh.inc.php');


if (isset($_POST['add'])){
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");

      if(in_array($_POST['product_id'], $item_array_id)){
          echo "<script>alert('Product is already added in the cart..!')</script>";
          echo "<script>window.location = 'index.php'</script>";
      }else{

          $count = count($_SESSION['cart']);
          $item_array = array(
              'product_id' => $_POST['product_id']
          );

          $_SESSION['cart'][$count] = $item_array;
      }

  }else{

      $item_array = array(
              'product_id' => $_POST['product_id']
      );

      $_SESSION['cart'][0] = $item_array;
      
  }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> HomeBurger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <!-- External Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/9328819f42.js" crossorigin="anonymous"></script>

    <!-- Custom links -->
    <link rel="icon" href="images/Burger.ico" />
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
    <section id="title">
        <div class="container-fluid text-dark">
            <?php include 'nav.php';?>
            <?php include 'hbody.php';?>

        </div>
    </section>

    <div id="menu">
        <div class="row  text-center  p-5 rounded-3 menupadd  ">
            <?php
               $sql = "SELECT * FROM productdb; ";
               $result = mysqli_query($con,$sql);
               $resultChecker = mysqli_num_rows($result);
               if($resultChecker > 0){
                while ($row = mysqli_fetch_assoc($result)){
                  component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
               }
              }
            ?>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>