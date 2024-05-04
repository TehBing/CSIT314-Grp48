<?php
require_once 'Database/config.php';
include 'Class/Agent.php';

$agent = new Agent();
$agent-> connectDb($conn);

if (isset($_GET['id'])) {
    $agentId = $_GET['id'];

    $agentdata = $agent-> get_agentId($agentId);

    // Check if agent data is found
   if (count($agentdata) > 0) {
            foreach ($agentdata as $agent) {
        // HTML structure to display agent details
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $agent["user_name"] ?> Details</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                                <a class="nav-link" href="index.php">Home</a>
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

            <!-- Navbar -->
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <!-- <img src="data:image/jpeg;base64,<?php echo $agentImage; ?>" class="card-img-top" alt="Agent Image">
                            <div class="card-body"> -->
                                <h5 class="card-title"><?php echo $agent["user_name"] ?></h5>
                                <p class="card-text">Email: <?php echo $agent['user_email']; ?></p>
                                <p class="card-text">Role: <?php echo $agent['user_role']; ?></p>
                                
                                <!-- Reviews -->
                              <!-- <div class="card-body">
                                  <h5 class="card-title">Reviews</h5>
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>User</th>
                                              <th>Rating</th>
                                              <th>Comment</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          // Assuming $reviews contains reviews data
                                          foreach ($reviews as $review) {
                                              ?>
                                              <tr>
                                                  <td><?php echo $review['user']; ?></td>
                                                  <td><?php echo $review['rating']; ?></td>
                                                  <td><?php echo $review['comment']; ?></td>
                                              </tr>
                                              <?php
                                          }
                                          ?>
                                      </tbody>
                                  </table>
                              </div>
                            </div> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        <?php
    } 
  }
} else {
    // If no ID is provided in the URL
    echo "Agent ID not provided";
}






  

