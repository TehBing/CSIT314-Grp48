<?php
require_once 'Database/config.php';
include 'Class/User.php';
session_start();

// Create User object and connect to db
$user = new User();
$user-> connectDb($conn);

if (isset($_SESSION['user_id'])) {
    // User is logged in, display the dashboard or property listings
    $userName = $_SESSION['user_name']; 
    $userRole = $_SESSION['user_role']; 
    $userId = $_SESSION['user_id']; 
    $userEmail = $_SESSION['user_email'];
}

if (isset($_POST['submit_search'])) {
        $userId = $_POST['searchUser'];
        $userList = $user-> get_userById($userId);
}else{
    $userList = $user-> get_users();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Include custom.css -->
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

  <div class="container mt-5">
      <h2>User Accounts</h2>
      <div class="row">
            <div class="col-md-6">
                <form method="POST" action="admin_page.php" class="form-inline mt-3">
                    <div class="input-group mb-3">
                        <input class="form-control" type="search" placeholder="Search User ID" aria-label="Search" name="searchUser">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit" name="submit_search">Search</button>
                        </div>
                    </div>
                </form>
            </div>          
      </div>
      <div class="row mt-3" id="userList">
        <div class="col-md-6">
          <table border="1">
            <div class="col-md-6"> <!-- New column for the table -->
              <div class="table-responsive"> <!-- Make the table responsive -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>User ID</th>  
                    <th>Name</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>User Profile</th>
                    </tr>
                </thead>
                <?php 
                if (count($userList) > 0) {
                    foreach ($userList as $user) {
                        echo "<tr>";
                        echo "<td>" . $user["id"] . "</td>";
                        echo "<td>" . $user["user_name"] . "</td>";
                        echo "<td>" . $user["user_email"] . "</td>";
                        echo "<td>" . $user["user_role"] . "</td>";
                        echo "<td><a href='user_profile.php?id=" . $user["id"] . "' class='btn btn-info btn-sm'>View</a></td>"; ; 
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No results found</td></tr>";
                }
                ?>       
              </form>
            </table>
          </div>
      </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
