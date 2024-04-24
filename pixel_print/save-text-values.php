<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_ajax";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the incoming data, including the design ID
$tshirtType = $_POST['type'];
$tshirtColor = $_POST['color'];
$tshirtLocation = $_POST['location'];
$tshirtPrice = $_POST['price'];
$canvasData = json_decode($_POST['canvasData'], true);
$designId = $_POST['designId']; // Retrieve the design ID

// Check if the design ID already exists in the database
$checkSql = "SELECT COUNT(*) as count FROM tshirt WHERE d_id = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("i", $designId);
$checkStmt->execute();
$result = $checkStmt->get_result();
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count > 0) {
    // Design ID exists, update the existing record
    $updateSql = "UPDATE tshirt SET type = ?, color = ?, location = ?, price = ? WHERE d_id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssi", $tshirtType, $tshirtColor, $tshirtLocation, $tshirtPrice, $designId);
    $updateSuccess = $updateStmt->execute();

    if ($updateSuccess) {
        echo "T-Shirt design updated successfully with Design ID: " . $designId;
    } else {
        echo "Error updating design: " . $updateStmt->error;
    }
} else {
    // Design ID does not exist, insert a new record
    $insertSql = "INSERT INTO tshirt (type, color, location, price, d_id) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("ssssi", $tshirtType, $tshirtColor, $tshirtLocation, $tshirtPrice, $designId);
    $insertSuccess = $insertStmt->execute();

    if ($insertSuccess) {
        echo "T-Shirt design saved successfully with Design ID: " . $designId;
    } else {
        echo "Error saving design: " . $insertStmt->error;
    }
}

// Close the database connections
$checkStmt->close();
$updateStmt->close();
$insertStmt->close();
$conn->close();
?>
