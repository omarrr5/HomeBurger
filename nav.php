<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-light me-auto">
    <a class="navbar-brand " href="index.php"><img class="logo1" src="images/logo1.png" alt="logo1" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#menu">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="locations.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>

            <?php

            if(isset($_SESSION["useruid"])){

              echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";

            }

          ?>


            <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
            <?php if(!isset($_SESSION["useruid"])): ?>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Sign in</a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="cart pink" href="cart.php"><i class="fa fa-shopping-cart" style="font-size: 36px"></i></a>
                <?php

            if (isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
            }else{
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
            }

            ?>
            </li>
        </ul>
    </div>
</nav>