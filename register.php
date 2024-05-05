<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css"> <!-- Include custom.css or your own styles -->
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
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="register.php">Register</a>
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Register
                    </div>
                    <div class="card-body">
                    <form action="register_process.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select id="role" name="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="buyer">Buyer</option>
                                    <option value="seller">Seller</option>
                                    <option value="agent">Agent</option>
                                </select>
                            </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
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
