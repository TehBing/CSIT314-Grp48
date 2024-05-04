<?php
require_once 'Class/Property.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propertyId = $_POST['prop_id'];
    $propertyName = $_POST['prop_name'];
    $propertyLocation = $_POST['prop_location'];
    $propertyPrice = $_POST['prop_price'];
    $propertyStatus = $_POST['prop_status'];

    $property = new Property();
    if ($property->updateProperty($propertyId, $propertyName, $propertyLocation, $propertyPrice, $propertyStatus)) {
        echo 'Property updated successfully.';
    } else {
        echo 'Error updating property.';
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
        <form action="update_property.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="prop_id" value="property_id_to_update">
                <!-- Replace 'property_id_to_update' with the actual property ID -->
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
            <button type="submit" class="btn btn-primary">Update Property</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</body>

</html>
