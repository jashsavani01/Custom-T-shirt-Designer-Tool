<?php
$conn = mysqli_connect("localhost", "root", "", "pixel_print");

if(isset($_POST["email"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $sql_check = "select * from sign_up where email = '$email' ";
    $result = mysqli_query($conn,$sql_check);
        if(mysqli_num_rows($result)>0){
            echo 0;
        }else{
            $sql = "INSERT INTO sign_up(name,email,password) VALUES ('$name','$email','$pass')";
            if(mysqli_query($conn,$sql)){
                echo 1;
            }else{
                echo 0;
            }
        }
}
?>