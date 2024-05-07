<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prop_id']) && isset($_POST['user_id'])) {
        // Include database configuration
        require_once 'Database/config.php';
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get property ID and user ID from POST data
        $propertyId = $_POST['prop_id'];
        $userId = $_POST['user_id'];

        // Check if the property is already saved by the user
        $checkDuplicateSql = "SELECT * FROM favourite_tbl WHERE user_id = $userId AND prop_id = $propertyId";
        $result = $conn->query($checkDuplicateSql);

        if ($result && $result->num_rows > 0) {
            echo 'Property already saved by the user.';
        } else {
            // Insert into favourite_tbl
            $insertSql = "INSERT INTO favourite_tbl (user_id, prop_id) VALUES ($userId, $propertyId)";
            if ($conn->query($insertSql) === TRUE) {
                echo 'Property saved successfully.';
            } else {
                echo 'Error saving property: ' . $conn->error;
            }
        }

        $conn->close();
        exit; // Stop further execution
    }
}
?>
