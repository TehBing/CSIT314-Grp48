<?php
require_once 'Database/config.php';
require_once 'Class/Property.php';

// $db = new Database();
$property = new Property();
$property-> connectDb($conn);

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

// Get filtered properties
$properties = $property->getProperties($filters);
?>

<!-- Your HTML code goes here -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Include custom.css -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">
                <img src="img/Logo.png" width="100" height="100" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agent_page.php">Agents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
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
        <div class="col-lg-8">
            <form action="index.php" method="GET" class="form-inline">
                <div class="form-row align-items-center">
                    <div class="form-group col-md-3">
                        <label for="price">Price Range:</label>
                        <select id="price" name="price" class="form-control">
                            <option value="">Any Price</option>
                            <option value="0-100000">$0 - $100,000</option>
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
                            <option value="Jurong">Jurong</option>
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
</div>





<div class="container mt-3">
    <div class="row">
        <?php
        if (!empty($properties)) {
            foreach ($properties as $prop) {
                echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
                echo '<a href="property_details.php?id=' . $prop['id'] . '" class="text-decoration-none text-dark">';
                echo '<div class="card">';
                $base64Image = base64_encode($prop['prop_image']);
                echo '<img src="data:image/jpeg;base64,' . $base64Image . '" class="card-img-top" alt="Property Image">';
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


