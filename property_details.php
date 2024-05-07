<?php
require_once 'Database/config.php';
require_once 'Class/Property.php';

session_start();
// check if the session got get properly
// var_dump($_SESSION);
if (isset($_SESSION['user_id'])) {
    // User is logged in, display the dashboard or property listings
    $userName = $_SESSION['user_name']; 
    $userRole = $_SESSION['user_role']; 
    $userId = $_SESSION['user_id']; 
    $userEmail = $_SESSION['user_email'];
}

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
                                <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
								<?php 
                                if (!empty($_SESSION['user_id'])) {
                                    if ($userRole === 'buyer') {
                                        echo '<button id="saveListingBtn" class="btn btn-primary mt-3">Save Listing</button>';
                                    } 
                                }
                                ?>
								<?php include "mortgageCalc/divLoad.php"; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Bootstrap JS and dependencies -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <!-- Inside your HTML body, after the button -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#saveListingBtn').on('click', function() {
                    $.ajax({
                        type: 'POST',
                        url: 'saved_listings.php', // PHP script to handle saving
                        data: {
                            prop_id: <?php echo $propertyId; ?>, // Pass the property ID
                            user_id: <?php echo $userId; ?> // Pass the user ID
                        },
                        success: function(response) {
                            alert(response); // Show success message or handle response
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); // Log any errors
                        }
                    });
                });
            });
            </script>
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
