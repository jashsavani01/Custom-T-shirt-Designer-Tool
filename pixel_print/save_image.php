<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pixel_print";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if either selectedImages or images are set
    if (isset($_FILES['images']) || isset($_POST['selectedImages'])) {
        // Initialize variables for selectedImages and uploadedImages
        $selectedImages = "";
        $uploadedImages = array();

        if(isset($_POST['design_id']) || isset($_POST['user_id'])){
            $designid = $_POST['design_id'];
            $type = $_POST['type'];
            $color = $_POST['color'];
            $location = $_POST['locations'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $canvas_front = $_POST['canvas_front'];
            $canvas_back = $_POST['canvas_back'];
            $userid = $_POST['user_id'];
        }
        // Check if selectedImages were sent
        if (!empty($_POST['selectedImages'])) {
            $selectedImages = $_POST['selectedImages'];

            // Split the comma-separated URLs
            $imageURLs = explode(',', $selectedImages);

            // Process each image URL
            foreach ($imageURLs as $imageURL) {
                $imageContents = file_get_contents($imageURL);

                if ($imageContents !== false) {
                    // Specify the directory to save the image
                    $uploadDirectory = 'uploads/';

                    // Extract the filename from the URL
                    $filename = pathinfo($imageURL, PATHINFO_BASENAME);

                    // Save the image to the "uploads" folder
                    $targetPath = $uploadDirectory . $filename;

                    if (file_put_contents($targetPath, $imageContents) !== false) {
                        $uploadedImages[] = $filename;
                    } else {
                        echo "Error saving image: $filename";
                    }
                } else {
                    echo "Failed to retrieve image from URL: $imageURL";
                }
            }
        }
        $sql_check = "SELECT * FROM custom_tshirts WHERE design_id = '$designid'";
        $result = $conn->query($sql_check);


        // Handle image upload if images were sent
        if (isset($_FILES['images'])) {
            $uploadedImages = array_merge($uploadedImages, handleImageUpload($_FILES['images']));
        }

        // Combine uploaded image filenames into a single string
        $imageString = implode(',', $uploadedImages);

        if ($result->num_rows > 0) {
            // Design_id exists, so delete the existing data
            $sql_delete = "DELETE FROM custom_tshirts WHERE design_id = '$designid'";
            $conn->query($sql_delete);
        }
        // Insert the combined image string into the database
        $sql = "INSERT INTO custom_tshirts (design_id,type,color,location,quantity,price,image,canvas_front,canvas_back,user_id) VALUES ('$designid','$type','$color','$location','$quantity','$price','$imageString','$canvas_front','$canvas_back','$userid')";
        if ($conn->query($sql) === TRUE) {
            echo "Images saved and database updated successfully";
        } else {
            echo "Images saved and database updated Unsuccessfully.";
        }

        // Send a JSON response indicating success
        $response = array(
            'success' => true,
            'selectedImages' => $selectedImages,
            'uploadedImages' => $uploadedImages,
        );
       
    } else {
        // Handle the case where neither selectedImages nor images are set
        $response = array('success' => false, 'error' => 'No data received');
    }
} else {
    // Handle the case where it's not a POST request
    $response = array('success' => false, 'error' => 'Invalid request method');
}

function handleImageUpload($images) {
    $uploadedImages = array();

    // Specify the directory to upload images
    $uploadDirectory = 'uploads/';

    foreach ($images['name'] as $key => $name) {
        $tempName = $images['tmp_name'][$key];
        $newName = $uploadDirectory . $name;

        if (move_uploaded_file($tempName, $newName)) {
            $uploadedImages[] = $name; // Store only the filename without the "uploads/" prefix
        }
    }

    return $uploadedImages;
}

// Close the database connection
$conn->close();
?>
