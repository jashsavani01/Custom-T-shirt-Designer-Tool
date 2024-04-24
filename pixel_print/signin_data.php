<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "pixel_print");

if(isset($_POST["email_l"])){

    $email = $_POST["email_l"];
    $pass = $_POST["pass_l"];

    $sql_check = "select * from sign_up where email = '$email'  ";
    $result = mysqli_query($conn,$sql_check);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                if($pass == $row['password']){
                    echo 1;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                }else{
                    echo 0;
                }
            }
        }else{
            echo 0;
        }
}
?>