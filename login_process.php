<?php
session_start();
require_once 'Database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input (you can add more validation as needed)
    if (empty($email) || empty($password)) {
        echo 'Please enter both email and password.';
    } else {
        // Check user credentials in the database
        $query = "SELECT id, user_name, user_pass, user_role FROM user_tbl WHERE user_email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['user_pass'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_role'] = $user['user_role'];

                // Redirect to dashboard or another page
                header('Location: index.php');
                exit(); // Make sure to exit after the redirection
            } else {
                echo 'Incorrect password.';
            }
        } else {
            echo 'User not found.';
        }

        $stmt->close();
    }
} else {
    echo 'Invalid request method.';
}
?>
