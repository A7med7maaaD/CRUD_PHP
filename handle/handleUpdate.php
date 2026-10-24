<?php
require_once "../conn.php";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitUpdate"])){
    // extrect
        $firstName   =    $_POST["firstName"] ;
        $lastName    =    $_POST["lastName"]  ;
        $email       =    $_POST["email"]     ;
        $gender      =    $_POST["gender"]    ;
        $country     =    $_POST["country"]   ;
        $city        =    $_POST["city"]      ;

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $id = $_GET["id"];
    // connection
    $query = "update customers set `firstName` = '$firstName' ,`lastName`='$lastName',`email`='$email',`gender`='$gender',`country`='$country',`city`='$city' where customerId = $id"  ;
    $result = mysqli_query($connect , $query);
    if($result){
        header("location:../index.php");
        exit();
    }
}else{
    header("location:../index.php");
    exit();
}