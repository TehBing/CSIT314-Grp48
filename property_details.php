<?php
require_once 'Database/config.php';
require_once 'Class/Property.php';

// Initialize the Property class and connect to the database
$property = new Property();
$property->connectDb($conn);

// Check if the property ID is provided in the URL
if (isset($_GET['id'])) {
    $propertyId = $_GET['id'];

    // Fetch the property details based on the ID
    $propertyDetails = $property->getPropertyById($propertyId);

    // Check if property details are found
    if ($propertyDetails) {
        // Display property details on the page
        $propertyName = $propertyDetails['prop_name'];
        $propertyLocation = $propertyDetails['prop_location'];
        $propertyPrice = $propertyDetails['prop_price'];
        $propertyStatus = $propertyDetails['prop_status'];
        $prop_img = $propertyDetails['prop_img_path'];
        // $base64Image = base64_encode($propertyDetails['prop_image']);

        // HTML structure to display property details
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $propertyName; ?> Details</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">

                            <!-- <img src="data:image/jpeg;base64,<?php echo $base64Image; ?>" class="card-img-top" alt="Property Image"> -->
                            <img src="<?php echo $prop_img; ?>" class="card-img-top" alt="Property Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $propertyName; ?></h5>
                                <p class="card-text">Location: <?php echo $propertyLocation; ?></p>
                                <p class="card-text">Price: $<?php echo $propertyPrice; ?></p>
                                <p class="card-text">Status: <?php echo $propertyStatus; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS and dependencies -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

        </html>
        <?php
    } else {
        // Property not found, display an error message or redirect
        echo 'Property not found.';
        // You can also redirect the user back to the property listing page or another page
        // header("Location: index.php");
        // exit();
    }
} else {
    // ID not provided in the URL, handle this case (redirect or display error)
    echo 'Property ID not provided.';
    // You can also redirect the user back to the property listing page or another page
    // header("Location: index.php");
    // exit();
}
?>
