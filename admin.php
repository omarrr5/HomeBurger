<?php include 'includes/dbh.inc.php';?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login Page</title>
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
    <form action="admin.php" method="post">
        <div class=" adminlogin">
            <div class="login-box container-fluid">
                <h1>Admin Login</h1>
                <div class="row">
                    <div class=" textbox col-sm-12 col-lg-6">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control" placeholder="Admin Name" name="adminname" value="">
                    </div>

                    <div class=" textbox col-sm-12 col-lg-6">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="">
                    </div>

                    <div class="col-sm-12 col-lg-6 pt-2">

                        <input class="button " type="submit" name="login" value="Sign In">

                    </div>
                </div>
            </div>
        </div>
        
    </form>
    <?php include 'footer.php';?>
 
</body>

</html>

<?php
function test_input($data) {
      
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    
  $adminname = test_input($_POST["adminname"]);
  $password = test_input($_POST["password"]);
  $stmt = $con->prepare("SELECT * FROM adminlogin");
  $stmt->execute();
  $users = $stmt->get_result();
  $result = $users->fetch_all();
  
  foreach($users as $user) {
        
      if(($user['adminname'] == $adminname) && 
          ($user['password'] == $password)) {
              header("Location: includes/crud.php?id=");
      }
      else {
          echo "<script language='javascript'>";
          echo "alert('WRONG INFORMATION')";
          echo "</script>";
          die();
      }
  }
}

?>