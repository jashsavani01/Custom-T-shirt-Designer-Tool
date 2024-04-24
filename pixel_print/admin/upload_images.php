<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle file uploads
    if (isset($_FILES['images']) && !empty($_FILES['images']['name'])) {
        $uploadDir = '../object_img/'; // Your target folder
        $uploadedFiles = array();

        // Create a database connection
        $conn = new mysqli("localhost", "root", "", "pixel_print");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute an SQL statement to insert the file details into the database
        $stmt = $conn->prepare("INSERT INTO images (image) VALUES (?)");

        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            $fileName = $_FILES['images']['name'][$key];
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($tmpName, $filePath)) {
                // Store file information in the database
                $stmt->bind_param("s", $fileName);
                $stmt->execute();

                $uploadedFiles[] = $filePath;
            }
        }

        $stmt->close();
        $conn->close();

        if (!empty($uploadedFiles)) {
            echo "Successfully";
        } else {
            echo "No files were uploaded or an error occurred.";
        }
    } else {
        echo "No files were uploaded.";
    }
}
?>
