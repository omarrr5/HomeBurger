<?php

session_start();

require_once('includes/dbh.inc.php');
require_once ("component.php");

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
  
  
  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
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

    <link rel="stylesheet" href="styles.css">



    <?php
    require_once ('nav.php');
    
?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'],'product_id');
                    $sql = "SELECT * FROM productdb order by id asc ;";
                    $result = mysqli_query($con,$sql);
                    $resultChecker = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                        foreach($product_id as $id){
                            if($row['id']== $id){
                                cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
                                $total = $total + (int)$row['product_price'];
                            }
                        }
                    }


        
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 id="totalprice">RM<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6 id="totalamount">RM<?php
                            echo $total;
                            ?></h6>
                            <button class="GFG" onclick="window.location.href = 'checkout.php';">checkout</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php
require_once ("footer.php");
?>
    <script>
    const priceEls = Array.from(document.getElementsByClassName("price"));
    const quantityInputs = Array.from(document.getElementsByClassName("price-input"));
    const totalPriceEl = document.getElementById("totalprice");
    const totalAmountEl = document.getElementById("totalamount");

    const origPrices = priceEls.map((el) => +el.textContent.split(' ')[1]);

    quantityInputs.forEach((el, i) => {
        el.onchange = function(e) {
            const quantity = e.target.value;
            const [currency, price] = priceEls[i].textContent.split(' ')
            priceEls[i].textContent = `${currency} ${origPrices[i] * quantity}`;
            updateTotalPrice()
        };
    })

    function updateTotalPrice() {
        const total = priceEls.reduce((total, el) => {
                return total + +el.textContent.split(' ')[1];
            },
            0)
        totalPriceEl.textContent = 'RM' + total;
        totalAmountEl.textContent = 'RM' + total;
    }
    </script>
</body>

</html>