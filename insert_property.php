<?php
session_start();
require_once 'Database/config.php'; // Include your database configuration file
require_once 'Class/Property.php'; // Include your Property class file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $propName = $_POST['prop_name'];
    $propLocation = $_POST['prop_location'];
    $propPrice = $_POST['prop_price'];
    $propStatus = $_POST['prop_status'];

    // Check if file upload is successful
    if (isset($_FILES['prop_image']) && $_FILES['prop_image']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['prop_image']['name'];
        $fileTmpName = $_FILES['prop_image']['tmp_name'];
        $fileType = $_FILES['prop_image']['type'];
        $fileSize = $_FILES['prop_image']['size'];

        // Directory to upload files
        $uploadDirectory = 'uploads/';

        // Check if the directory exists, if not, create it
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true); // Create directory with full permissions
        }

        // Check file type and size
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
            $fileDestination = $uploadDirectory . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);

            // Instantiate Property class and connect to the database
            $property = new Property();
            $property->connectDb($conn); // Assuming $conn is your database connection object

            // Insert property with image
            $result = $property->insertProperty($propName, $propLocation, $propPrice, $propStatus, $fileDestination);

            if ($result) {
                echo 'Property inserted successfully.';
            } else {
                echo 'Error inserting property.';
            }
        } else {
            echo 'Sorry, your file is either not an image or too large.';
        }
    } else {
        echo 'Sorry, there was an error uploading your file.';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Insert Property</h2>
        <form action="insert_property.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prop_name">Property Name:</label>
                <input type="text" id="prop_name" name="prop_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prop_location">Property Location:</label>
                <input type="text" id="prop_location" name="prop_location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prop_price">Property Price:</label>
                <input type="number" id="prop_price" name="prop_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prop_status">Property Status:</label>
                <select id="prop_status" name="prop_status" class="form-control" required>
                    <option value="Available">Available</option>
                    <option value="Sold">Sold</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prop_image">Property Image:</label>
                <input type="file" id="prop_image" name="prop_image" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Property</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</body>

</html>
