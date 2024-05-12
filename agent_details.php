<?php
session_start();

require_once 'Database/config.php';
include 'Class/Agent.php';
include 'Class/Review.php';

$agent = new Agent();
$agent-> connectDb($conn);

$review = new Review();
$review-> connectDb($conn);


if (isset($_SESSION['user_id'])) {
    // User is logged in, display the dashboard or property listings
    $userName = $_SESSION['user_name']; 
    $userRole = $_SESSION['user_role']; 
    $userId = $_SESSION['user_id']; 
    $userEmail = $_SESSION['user_email'];
}

if(isset($_POST['btn_del_review'])){
    $review-> delete_reviewId($_POST['review_id']);
}
if(isset($_POST['submit_review'])){
    $reviewContent = $_POST['review_content'];
    $rating = $_POST['rate_content'];
    $agentId = $_POST['agent_id'];

    $review-> insert_review($agentId, $userEmail, $reviewContent, $rating);
}
if(isset($_POST['submit_edit_review'])){
    $reviewId = $_POST['edit_review_id'];
    $reviewContent = $_POST['edit_review_content'];
    $rating = $_POST['edit_rating'];

    $review->update_review($reviewId, $reviewContent, $rating);
}

if (isset($_GET['id'])) {
    $agentId = $_GET['id'];
    $agentdata = $agent-> get_agentId($agentId);
    
    if (isset($_POST['submit_search'])) {
        $email = $_POST['searchEmail'];
        $agentId = $_POST['search_agent_id'];
        $reviewdata = $review->get_reviewbyUser($agentId, $email);
    }else{
        $reviewdata = $review-> get_review($agentId);

    }

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
                                        <h5 class="card-title"><?php echo $agent["user_name"] ?></h5>
                                        <p class="card-text font-weight-bold">Email: <?php echo $agent['user_email']; ?></p>
                                        <p class="card-text font-weight-bold">Role: <?php echo $agent['user_role']; ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="card-body">
                                <h5 class="card-title">Reviews</h5>
                                <!-- Search form -->
                                    <form method="POST" action="agent_details.php?id=<?php echo $agentId; ?>" class="form-inline mt-3">
                                        <input type="hidden" name="search_agent_id" value="<?php echo $agentId; ?>">
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="search" placeholder="Search by review email" aria-label="Search" name="searchEmail">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-success" type="submit" name="submit_search">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Reviewer</th>
                                            <th>Reviews</th>
                                            <th>Rating</th>
                                            <th>Date</th>
                                             <?php if ($userRole != 'agent') { 
                                                ?>
                                                    <th>Delete</th>
                                                    <th>Edit</th>
                                                <?php 
                                            } 
                                            ?>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Assuming $reviews contains reviews data
                                         if (isset($reviewdata)) {
                                            foreach ($reviewdata as $agentreview) {
                                                $reviewStar = $review->get_stars($agentreview['rating']);
                                            ?>
                                            <tr>
                                                    <td><?php echo $agentreview['user_email']; ?></td>
                                                    <td><?php echo $agentreview['review']; ?></td>
                                                    <td><?php echo $reviewStar; ?></td>
                                                    <td><?php echo $agentreview['review_dateTime']; ?></td>
                                                    
                                                   <?php if ($userRole != 'agent') { 
                                                    ?>
                                                        <td>
                                                            <form method="POST" action='agent_details.php?id=<?php echo $agentId ?>'>
                                                                <input type="hidden" name="review_id" value="<?php echo $agentreview['id']; ?>">
                                                                <button type="submit" class="btn btn-danger" name="btn_del_review" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary edit-review-btn" data-review-id="<?php echo $agentreview['id']; ?>" data-review-content="<?php echo htmlspecialchars($agentreview['review']); ?>" data-rating="<?php echo $agentreview['rating']; ?>">Edit</button>
                                                        </td>
                                                    <?php } 
                                                    ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <!-- Edit Review Modal -->
                                        <div class="modal fade" id="edit-review-modal" tabindex="-1" role="dialog" aria-labelledby="editReviewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editReviewModalLabel">Edit Review</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form method="POST" action='agent_details.php?id=<?php echo $agentId ?>'>
                                                            <input type="hidden" id="edit-review-id" name="edit_review_id">
                                                            <div class="form-group">
                                                                <label for="edit-review-content">Review Content</label>
                                                                <textarea class="form-control" id="edit-review-content" name="edit_review_content" rows="3" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="edit-rating">Rating (1-5)</label>
                                                                <input type="number" class="form-control" id="edit-rating" name="edit_rating" min="1" max="5" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary" name="submit_edit_review">Save Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Review Modal -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- Reviews -->

                            <!-- Review Form -->
                            <div class="card-body">
                                <h5 class="card-title">Add a Review</h5>
                                <form method="POST" action="agent_details.php?id=<?php echo $agentId; ?>">
                                <input type="hidden" name="agent_id" value="<?php echo $agentId; ?>">
                                    <div class="form-group">
                                        <label for="review_content">Your Review</label>
                                        <textarea class="form-control" id="review_content" name="review_content" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="rating">Rating (1-5)</label>
                                        <input type="number" class="form-control" id="rate_content" name="rate_content" min="1" max="5" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit_review">Submit</button>
                                </form>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script>
                $(document).ready(function() {
                // Handle click event of edit button
                $('.edit-review-btn').click(function() {
                    // Get review details from data attributes
                    var reviewId = $(this).data('review-id');
                    var reviewContent = $(this).data('review-content');
                    var rating = $(this).data('rating');
                    
                    // Populate the form fields in the modal
                    $('#edit-review-id').val(reviewId);
                    $('#edit-review-content').val(reviewContent);
                    $('#edit-rating').val(rating);
                    
                    // Show the modal
                    $('#edit-review-modal').modal('show');
                });
            });
            </script>
        <?php
    } 
  }
} else {
    // If no ID is provided in the URL
    echo "Agent ID not provided";
}

?>








  

