<?php
session_start();

require_once 'Database/config.php';
include 'Class/User.php';

$user = new User();
$user-> connectDb($conn);

if (isset($_SESSION['user_id'])) {
    // User is logged in, display the dashboard or property listings
    $userName = $_SESSION['user_name']; 
    $userRole = $_SESSION['user_role']; 
    $userId = $_SESSION['user_id']; 
    $userEmail = $_SESSION['user_email'];
}

// Update user role
if(isset($_POST['submit_update_role'])){
    $updateUserId = $_POST['update_user_id'];
    $updateUserRole = $_POST['update_user_role'];
    $user->update_role($updateUserId, $updateUserRole);
}

// Check if form is submitted
if (isset($_POST['save_changes'])) {
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $userList = $user-> get_userById($userId);

    // Check if user data is found
   if (count($userList) > 0) {
        foreach ($userList as $user) {
        // HTML structure to display user profile
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $user["user_name"] ?> Profile</title>
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
                            <?php
                            // Additional options for agents
                            if (!empty($_SESSION['user_id'])) {

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
                                        <a class="nav-link" href="admin_page.php">Admin</a>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                                <?php
                            }else{
                                ?>            
                                    <li class="nav-item">
                                        <a class="nav-link" href="login.php">Login</a> <!-- Display Login link -->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="register.php">Register</a>
                                    </li>
                                <?php
                            }
                            ?>
                            
                            
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
            

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="img\agent_images\image.png" class="card-img-top" alt="Agent Image" style="max-width: 200px; max-height: 200px;">
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $user["user_name"] ?></h5>
                                        <p>User ID: <?php echo $user['id']; ?></p>
                                        <p>Email: <?php echo $user['user_email']; ?></p>
                                        <p>Role: <?php echo $user['user_role']; ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Roles -->
                            <div class="card-body">
                                <h5 class="card-title">Roles</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Current role</th>
                                            <th>Select new role</th>
                                            <th>Update role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($userList)) {
                                            foreach ($userList as $user) {
                                    ?>
                                    <form method="POST" action="user_profile.php?id=<?php echo $userId ?>">
                                        <tr>
                                            <td><?php echo $user["id"] ?></td>
                                            <td><?php echo $user["user_name"] ?></td>
                                            <td><?php echo $user["user_email"] ?></td>
                                            <td><?php echo $user["user_role"] ?></td>
                                            <td>
                                                <select name='update_user_role' id='update_user_role' value= "seller">
                                                <option value='admin'>admin</option>
                                                <option value='buyer'>buyer</option>
                                                <option value='seller'>seller</option>
                                                <option value='agent'>agent</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="update_user_id" value="<?php echo $user['id']; ?>">
                                                <button type="submit" class="btn btn-info btn-sm" name="submit_update_role">Update</button>                      
                                            </td>
                                        </tr>
                                        </form>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No results found</td></tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Roles -->

                            <!-- Permissions -->
                            <div class="card-body">
                                <h5 class="card-title">Permissions</h5><hr>
                                <?php
                                if ($user['user_role'] === 'admin'){
                                    $permissions = array(
                                        array('View', 'View all user accounts including roles and permissions'),
                                        array('Search', 'Search for user accounts using user id'),
                                        array('Update', 'Update user role for each user account'),
                                        array('Adjust', 'Adjust permissions for each user role')
                                    );
                                } elseif ($user['user_role'] === 'buyer'){
                                    $permissions = array(
                                        array('View', 'View property listings'),
                                        array('Search', 'Search for property listing using keywords'),
                                        array('Save', 'Save property Listings'),
                                        array('Add', 'Add reviews to property listing and/or agent in-charge'),
                                        array('Review', 'View reviews of property listing and assigned agent'),
                                    );
                                } elseif ($user['user_role'] === 'seller'){
                                    $permissions = array(
                                        array('Add', 'Add reviews to property listing and/or agent in-charge'),
                                        array('Review', 'View reviews of property listing and assigned agent'),
                                        array('Edit', 'Edit reviews and rating for agents'),
                                        array('Filter', 'Filter reviews by dates'),
                                    );
                                } else {
                                    $permissions = array(
                                        array('Create', 'Create new property listings'),
                                        array('Update', 'Update property listing details'),
                                        array('Mark', 'Mark properties that are sold'),
                                        array('Delete', 'Delete property listings'),
                                    );
                                }
                                ?>
                                <div class="form-group">
                                    <label class="card-text font-weight-bold">View Permissions for <?php echo $user['user_role']; ?></label><br>
                                    <div class="card-body">
                                        <form method="POST" id="checkboxForm" action="user_profile.php?id=<?php echo $userId ?>; ?>">
                                            <?php foreach ($permissions as $permission):                                                 
                                                $permissionName = $permission[0];
                                                $permissionDescription = $permission[1];
                                                $checkboxId = str_replace(' ', '_', strtolower($permissionName)); // Generate unique ID for each checkbox
                                                $isChecked = isset($_POST[$checkboxId]) ? 'checked' : ''; // Check if checkbox was previously checked
                                                ?>
                                                <label type="text" id="<?php echo $checkboxId; ?>" name="<?php echo $checkboxId; ?>" value="<?php echo $permissionName; ?>" <?php echo $isChecked; ?>></label>
                                                <label for="<?php echo $checkboxId; ?>"><?php echo $permissionDescription; ?></label><br>
                                            <?php endforeach; ?>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <?php
        } 
    }
} else {
    // If no ID is provided in the URL
    echo "User ID not provided";
}

?>








  

