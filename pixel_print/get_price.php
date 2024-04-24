<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "pixel_print";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(isset($_POST['product'])){
$type = $_POST['product'];
$sql = "select price from tshirt_info where tshirt_type = '${type}'";
$result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
            echo $row['price'];
          }
    }else{
        echo 600;
    }
}
?>