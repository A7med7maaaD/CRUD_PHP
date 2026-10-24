<?php

require_once "../conn.php";
if($_GET["id"]){
    $id = $_GET["id"];
}else{
    header("location:../index.php");
    exit();
}
$query = "delete from customers where customerId = $id";
$result = mysqli_query($connect , $query);
if($result){
    header("location:../index.php");
    exit();
}