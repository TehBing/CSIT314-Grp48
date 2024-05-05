<?php
// Include the Property class file
require_once 'Class/Property.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CSIT314";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create a new Property object
$property = new Property();

// Set database connection for Property object
$property->connectDb($connection); // Add this line to set the database connection

// Check if property ID is set in the request
if (isset($_POST['delete']) && isset($_POST['prop_id'])) {
    // Set the property ID using setter method
    $property->setId($_POST['prop_id']);

    // Call the deletePropertyById method
    $deleted = $property->deletePropertyById($_POST['prop_id']);

    if ($deleted) {
        echo '<script>alert("Property deleted successfully!")</script>';
    } else {
        echo '<script>alert("Error deleting property!")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Delete Property</h2>
        <form action="delete_property.php" method="POST">
            <div class="form-group">
                <label for="prop_id">Enter Property ID to Delete:</label>
                <input type="text" id="prop_id" name="prop_id" class="form-control" required>
            </div>
            <button type="submit" name="delete" class="btn btn-danger">Delete Property</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</body>
</html>
