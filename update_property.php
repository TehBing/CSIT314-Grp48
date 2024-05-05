<?php
// Include the Property class file
require_once 'Class/Property.php';

// Create a new Property object
$property = new Property();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CSIT314";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set database connection for Property object
$property->connectDb($connection); // Add this line to set the database connection

// Update property
if (isset($_POST['update'])) {
    // Set property ID using setter method
    $property->setId($_POST['id']);

    // Set other property details using setter methods
    $property->setName($_POST['name']);
    $property->setLocation($_POST['location']);
    $property->setPrice($_POST['price']);
    $property->setStatus($_POST['status']);
    //$property->setImage($_FILES['image']['tmp_name']); // Temporary path of uploaded image
    $property->setImage($_FILES['image']); // Temporary path of uploaded image

    // Update property in the database
    $result = $property->updateProperty();

    if ($result) {
        echo '<script>alert("Record updated successfully!")</script>';
    } else {
        echo '<script>alert("Error updating record!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Update Property</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">Property ID:</label>
                <input type="text" id="id" name="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Property Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="location">Property Location:</label>
                <input type="text" id="location" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Property Price:</label>
                <input type="number" id="price" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Property Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Available">Available</option>
                    <option value="Sold">Sold</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Property Image:</label>
                <input type="file" id="image" name="image" class="form-control-file" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Property</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</body>

</html>
