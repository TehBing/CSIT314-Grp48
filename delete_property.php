<?php
require_once 'Class/Property.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propertyId = $_POST['prop_id'];

    $property = new Property();
    if ($property->deleteProperty($propertyId)) {
        echo 'Property deleted successfully.';
    } else {
        echo 'Error deleting property.';
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
                <input type="hidden" name="prop_id" value="property_id_to_delete">
                <!-- Replace 'property_id_to_delete' with the actual property ID -->
                <button type="submit" class="btn btn-danger">Delete Property</button>
            </div>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</body>

</html>
