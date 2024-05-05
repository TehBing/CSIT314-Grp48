<?php
class Review {
    public $conn;

    // public function __construct($conn) {
    //     $this->conn = $conn->getConnection();
    // }
    public function connectDb($conn){
        $this->conn = $conn;
    }

    public function get_review($agentId) {
        $reviewData = [];

        $sql_get_review = ("SELECT * FROM review_tbl WHERE agent_id = '$agentId'");
        $result =  mysqli_query($this->conn, $sql_get_review);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
                $reviewData[] = $row;
      }

      return $reviewData;
    }

    public function get_stars($rating) {
    
    $stars = '';
    $integerRating = intval($rating);
    for ($i = 0; $i < $integerRating; $i++) {
        $stars .= '★'; // Add a star symbol for each integer rating
    }
    return $stars;
  }

  public function delete_reviewId($reviewId) {
        $reviewData = [];

        $sql_delete_review = ("DELETE FROM review_tbl WHERE id = '$reviewId'");
        $result =  mysqli_query($this->conn, $sql_delete_review);
  }

  public function insert_review($agentId, $userEmail, $reviewContent, $rating) {
        // Escape variables for security
        $agentId = mysqli_real_escape_string($this->conn, $agentId);
        $userEmail = mysqli_real_escape_string($this->conn, $userEmail);
        $reviewContent = mysqli_real_escape_string($this->conn, $reviewContent);
        $rating = mysqli_real_escape_string($this->conn, $rating);

        $currentDateTime = date('Y-m-d H:i:s');

        // Insert the review into the database
        $sql_insert_review = "INSERT INTO review_tbl (agent_id, user_email, review, rating , review_dateTime) 
                              VALUES ('$agentId', '$userEmail', '$reviewContent', '$rating' , '$currentDateTime')";
        
        $result =  mysqli_query($this->conn, $sql_insert_review);
  }

  public function update_review($reviewId, $reviewContent, $rating) {
    // Escape variables for security
    $reviewId = mysqli_real_escape_string($this->conn, $reviewId);
    $reviewContent = mysqli_real_escape_string($this->conn, $reviewContent);
    $rating = mysqli_real_escape_string($this->conn, $rating);

    // Update the review in the database
    $sql_update_review = "UPDATE review_tbl 
                          SET review = '$reviewContent', rating = '$rating' 
                          WHERE id = '$reviewId'";
    
    $result = mysqli_query($this->conn, $sql_update_review);
  }

  public function get_reviewbyUser($agentId, $userEmail) {
        $reviewData = [];

        $sql_get_reviewbyUser = ("SELECT * FROM review_tbl WHERE agent_id = '$agentId' AND user_email LIKE '%$userEmail%'");
        $result =  mysqli_query($this->conn, $sql_get_reviewbyUser);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
                $reviewData[] = $row;
      }

      return $reviewData;
    }


}
?>