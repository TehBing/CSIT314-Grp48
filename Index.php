<?php
session_start();

require_once 'Database/config.php';
require_once 'Class/Property.php';

$property = new Property();
$property->connectDb($conn);

// Handle form submission and filter data
$filters = [];
if (isset($_GET['price'])) {
    $filters['prop_price'] = $_GET['price'];
}
if (isset($_GET['status'])) {
    $filters['prop_status'] = $_GET['status'];
}
if (isset($_GET['location'])) {
    $filters['prop_location'] = $_GET['location'];
}

// Handle search query
$searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';


// Get filtered properties with search keyword
$properties = $property->getProperties($filters, $searchKeyword);


// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, display the dashboard or property listings
    $userName = $_SESSION['user_name']; // Assuming 'user_name' is set in the session
    $userRole = $_SESSION['user_role']; // Assuming 'user_role' is set in the session
    $userId = $_SESSION['user_id']; 
    $userEmail = $_SESSION['user_email'];
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Property Listing</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles/style.css">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand mx-auto" href="index.php">
                    <img src="img/Logo.png" width="100" height="100" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="agent_page.php">Agents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mortgageCalc/index.php">Mortgage Calculator</a>
                        </li>
                        <?php
                        // Additional options for agents
                        if ($userRole === 'agent') {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="insert_property.php">Add Property</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="update_property.php">Update Property</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="delete_property.php">Delete Property</a>
                            </li>
                            <?php
                        }

                        if ($userRole === 'admin') {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="users.php">Users</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Display User Information -->
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-info" role="alert">
                        Welcome back <?php echo $userName; ?> as <?php echo $userRole; ?> role
                        with <?php echo $userEmail; ?>.
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="container mt-4">
            <div class="row justify-content-center">
                <form action="index.php" method="GET" class="form-inline custom-form">
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-3">
                            <label for="price">Price:</label>
                            <select id="price" name="price" class="form-control">
                                <option value="">Any Price</option>
                                <option value="0-100000">$0 - $100,000</option>
                                <option value="0-100000">$100,000 - $200,000</option>
                                <option value="0-100000">$200,000 - $300,000</option>
                                <option value="0-100000">$300,000 - $400,000</option>
                                <!-- Add more price options if needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status:</label>
                            <select id="status" name="status" class="form-control">
                                <option value="">Any Status</option>
                                <option value="Sold">Sold</option>
                                <option value="Available">Available</option>
                                <!-- Add more status options if needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="location">Location:</label>
                            <select id="location" name="location" class="form-control">
                                <option value="">Any Location</option>
                                <option value="Location_A">Location A</option>
                                <option value="Location_B">Location B</option>
                                <option value="Location_C">Location C</option>
                                <option value="Location_D">Location D</option>
                                <!-- Add more location options if needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary btn-block">Apply Filters</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row justify-content-center">
            <?php
                if (!empty($properties)) {
                    foreach ($properties as $prop) {
                        echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
                        echo '<a href="property_details.php?id=' . $prop['id'] . '" class="text-decoration-none text-dark">';
                        echo '<div class="card">';
                        echo '<div class="image-container" style="height: 200px; overflow: hidden;">';
                        //$base64Image = base64_encode($prop['prop_image']);
                        //echo '<img src="data:image/jpeg;base64,' . $base64Image . '" class="card-img-top img-fluid" alt="Property Image">';
                        echo '<td>' ."<img src='" .$prop['prop_img_path']."' />" .'</td>';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $prop['prop_name'] . '</h5>';
                        echo '<p class="card-text">' . $prop['prop_location'] . '</p>';
                        echo '<p class="card-text">Price: $' . $prop['prop_price'] . '</p>';
                        echo '<p class="card-text">Status: ' . $prop['prop_status'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-12"><p>No properties found.</p></div>';
                }
                ?>
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
    // User is not logged in, display the login button
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Property Listing</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles/style.css"> <!-- Include custom.css -->
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand mx-auto" href="index.php">
                    <img src="img/Logo.png" width="100" height="100" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mortgageCalc/index.php">Mortgage Calculator</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a> <!-- Display Login link -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Filter Form -->
        <div class="container mt-4">
            <div class="row justify-content-center">
                <form action="index.php" method="GET" class="form-inline custom-form">
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-3">
                            <label for="price">Price:</label>
                            <select id="price" name="price" class="form-control">
                                <option value="">Any Price</option>
                                <option value="0-100000">$0 - $100,000</option>
                                <option value="0-100000">$100,000 - $200,000</option>
                                <option value="0-100000">$200,000 - $300,000</option>
                                <option value="0-100000">$300,000 - $400,000</option>
                                <!-- Add more price options if needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status:</label>
                            <select id="status" name="status" class="form-control">
                                <option value="">Any Status</option>
                                <option value="Sold">Sold</option>
                                <option value="Available">Available</option>
                                <!-- Add more status options if needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="location">Location:</label>
                            <select id="location" name="location" class="form-control">
                                <option value="">Any Location</option>
                                <option value="Location_A">Location A</option>
                                <option value="Location_B">Location B</option>
                                <option value="Location_C">Location C</option>
                                <option value="Location_D">Location D</option>
                                <!-- Add more location options if needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary btn-block">Apply Filters</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Property Listing Section -->
        <div class="container mt-4">
            <div class="row justify-content-center">
                <?php
                if (!empty($properties)) {
                    foreach ($properties as $prop) {
                        echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
                        echo '<a href="property_details.php?id=' . $prop['id'] . '" class="text-decoration-none text-dark">';
                        echo '<div class="card">';
                        echo '<div class="image-container" style="height: 200px; overflow: hidden;">';
                        //$base64Image = base64_encode($prop['prop_image']);
                        // echo '<img src="data:image/jpeg;base64,' . $base64Image . '" class="card-img-top img-fluid" alt="Property Image">';
                        echo '<td>' ."<img src='" .$prop['prop_img_path']."' />" .'</td>';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $prop['prop_name'] . '</h5>';
                        echo '<p class="card-text">' . $prop['prop_location'] . '</p>';
                        echo '<p class="card-text">Price: $' . $prop['prop_price'] . '</p>';
                        echo '<p class="card-text">Status: ' . $prop['prop_status'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-12"><p>No properties found.</p></div>';
                }
                ?>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>

    <?php
}
?>
