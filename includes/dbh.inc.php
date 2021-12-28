<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "homeburgerdb";

$con = mysqli_connect ($serverName, $dbUsername, $dbPassword, $dbName);

if(!$con){
    die("connection failed: " . mysqli_connect_error());
}

 function getData(){
    $sql = "SELECT * FROM $this->tablename";

    $result = mysqli_query($this->con, $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}