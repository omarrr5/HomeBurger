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
        </div>
    </section>


    <section class="login-form">
        <div class=" login container-fluid">
            <form action="includes/login.inc.php" method="post">
                <h2>Sign In Now!</h2>

                <form>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-6 ">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="text" name="uid" class="form-control" id="inputEmail4"
                                placeholder="*******@gmail.com">
                        </div>

                        <div class="col-md-6 col-lg-6 ">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" name="pwd" class="form-control" id="inputPassword4"
                                placeholder="*********">
                        </div>

                        <div class="col-md-6 pb-5">
                            <button type="submit " name="submit" class="btn btnsignUp btn-primary btn-lg">Sign
                                in</button>
                        </div>
                </form>
        </div>
        </div>
    </section>






    <?php
if(isset($_GET["error"])){
    if($_GET["error"] == "empltyinput"){
        echo"<p>Fill in all Fields</p>";
    }
    else if($_GET["error"] == "wronglogin"){
        echo"<p>incorrect login information!</p>";
    }
  
}

?>
    <?php include 'footer.php';?>

</body>