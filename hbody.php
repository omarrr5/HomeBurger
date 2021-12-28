<!-- Title -->


<section class="usSec">
    <?php
        if(isset($_SESSION["useruid"])) {
            echo "<p>Hello ". $_SESSION["useruid"]."</p>";
        }
    ?>
</section>

<div class="display row">
    <div class="xx col-lg-6 col-sm-12">
        <h1 class="ad">
            Order Tasty & <br />
            fresh food <br />
            <span class="pink"> anytime </span>
        </h1>
        <p>
            Wanna Try new Burger in Cyberjaya, Visit us Now !
        </p>

        <button onclick="location.href='signup.php'" type=" button" class="btn btn-dark btn-lg "> Join
            us</button>
        <button onclick="location.href='#menu'" type="button" class="btn btn-outline-dark btn-lg">Menu</button>
    </div>
    <div class="col-lg-6 col-sm-12">
        <img class="picture" src="images/burger-special.png" alt="" />
    </div>
</div>