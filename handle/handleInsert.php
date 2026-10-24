<?php

require_once "../conn.php";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submitInsert"])){
    // extrect
        $firstName   =    $_POST["firstName"] ;
        $lastName    =    $_POST["lastName"]  ;
        $email       =    $_POST["email"]     ;
        $gender      =    $_POST["gender"]    ;
        $country     =    $_POST["country"]   ;
        $city        =    $_POST["city"]      ;

    //connection
    $query = "insert into customers(`firstName`,`lastName`,`email`,`gender`,`country`,`city`) values('$firstName','$lastName','$email','$gender','$country','$city')";
    $result = mysqli_query($connect,$query);
    if($result){
        header("location:../index.php");
        exit();
    }
}else{
    header("Location: ../index.php");
    exit();
}