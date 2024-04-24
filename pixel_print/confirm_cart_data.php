<?php
$conn = mysqli_connect("localhost", "root", "", "pixel_print");


if (isset($_POST['userid'])) {
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $designid = mysqli_real_escape_string($conn, $_POST['designid']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $material = mysqli_real_escape_string($conn, $_POST['material']);
    $totalprice = mysqli_real_escape_string($conn, $_POST['totalprice']);
    $locations = mysqli_real_escape_string($conn, $_POST['locations']);
    $front = mysqli_real_escape_string($conn, $_POST['fronturls']);
    $back = mysqli_real_escape_string($conn, $_POST['backurls']);
    $xs = mysqli_real_escape_string($conn, $_POST['xs']);
    $s = mysqli_real_escape_string($conn, $_POST['s']);
    $m = mysqli_real_escape_string($conn, $_POST['m']);
    $l = mysqli_real_escape_string($conn, $_POST['l']);
    $xl = mysqli_real_escape_string($conn, $_POST['xl']);
    $xxl = mysqli_real_escape_string($conn, $_POST['xxl']);

    $sql_check = "SELECT * FROM add_cart WHERE design_id = '$designid'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Design_id exists, so delete the existing data
        $sql_delete = "DELETE FROM add_cart WHERE design_id = '$designid'";
        $conn->query($sql_delete);
    }

    $sql = "INSERT INTO add_cart (user_id,design_id,type,color,material,location,total_price,quantity,front,back,xs,s,m,l,xl,xxl) 
            VALUES ('$userid', '$designid', '$type', '$color', '$material', '$locations', '$totalprice', '$quantity','$front','$back','$xs','$s','$m','$l','$xl','$xxl')";
    
    $result = mysqli_query($conn, $sql);

    if ($result === true) {
        echo "successfully insert";
    } else {
        echo "unsuccessfully insert";
    }
}

mysqli_close($conn); // Close the database connection when done.
?>
