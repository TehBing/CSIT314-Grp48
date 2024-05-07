<?php
require_once 'Database/config.php';
require_once 'Class/User.php';
session_start();


// Create an instance of the User class
$user = new User();
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Connect to the database
$user->connectDb($conn);

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, display the dashboard or property listings
    $userName = $_SESSION['user_name']; // Assuming 'user_name' is set in the session
    $userRole = $_SESSION['user_role']; // Assuming 'user_role' is set in the session
    $userId = $_SESSION['user_id']; 
    $userEmail = $_SESSION['user_email'];
    } 


// Check if form is submitted for role update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_role'])) {
    $userId = $_POST['user_id'];
    $newRole = $_POST['new_role'];

    // Call a method to update user role in the database
    $user->updateUserRole($userId, $newRole);
}

// Check if search query is present
if (isset($_GET['search_name'])) {
    $searchName = $_GET['search_name'];
    // Get users based on the search name
    $users = $user->get_user($searchName);
} else {
    // Get all users if no search query is present
    $users = $user->get_user();
}


// Display the users in a table format
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>List of Users</title>
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
                        if ($userRole === 'admin') {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="List_user.php">Users</a>
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
                <form class="form-inline my-2 my-lg-0" action="List_user.php" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search by Name" aria-label="Search" name="search_name">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <body>
    <div class="container">
        <h1 class="my-4">List of Users</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['user_name']; ?></td>
                        <td><?php echo $user['user_email']; ?></td>
                        <td><?php echo $user['user_role']; ?></td>
                        <td>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <select class="form-control" name="new_role">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="agent">Agent</option>
                                    <option value="seller">Seller</option>
                                </select>
                                <button type="submit" name="update_role" class="btn btn-primary mt-2">Update Role</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
