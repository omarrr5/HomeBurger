<?php

///////////
function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
    $result;

    if(empty($name) ||  empty($email) || empty($username) ||  empty($pwd) || empty($pwdRepeat) ){
        $result = true;
    }

    else{
        $result = false;
        
    }

    return  $result;
}

/////////

function invalidUid($username){
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }

    else{
        $result = false;
    }
    return $result;
}

////////////

function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }

    else{
        $result = false;
    }
    return $result;
}

/////////

function pwdSame($pwd, $pwdRepeat){
    $result;

    if($pwd !== $pwdRepeat){
        $result = true;
    }

    else{
        $result = false;
    }
    return $result;
}


/////////


function UidExists($con, $username, $email){
    $sql = "SELECT * FROM users WHERE usersid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($con);
 
 
    if(!mysqli_stmt_prepare($stmt,$sql)){
     header("location: ../signup.php?error=stmtfailed");
     exit();
    }
 
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
 
    if($row = mysqli_fetch_assoc($resultData)){
         return $row;
    }
    else{
        $result =false;
        return $result;
    }
 
    mysqli_stmt_close($stmt);
 }



function createUser($con, $name, $email, $username, $pwd){
   $sql = "INSERT INTO users (usersName, usersEmail , usersUid, userspwd)  VALUES (?, ?, ?, ?) ;";
   $stmt = mysqli_stmt_init($con);

   if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ../signup.php?error=rrrr");
    exit();
   }
   $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
   mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashPwd);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../signup.php?error=none");
    exit();
}


    function emptyInputlogin($username,$pwd){
    $result;

    if( empty($username) ||  empty($pwd)){
        $result = true;
    }

    else{
        $result = false;
    }
    return  $result;
}



function loginUser($con, $username, $pwd){
    $uidExists = uidExists($con, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
                exit();
    }


    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
                exit();
    }

    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
                exit();
    }

    }

