<?php
include("config.php");

$id = $_GET['id'];
$sql = "delete from images where id = {$id} ";
if(mysqli_query($conn,$sql)){
    header("location:images.php");
 }else{
    echo 0;
 }

?>