<?php
require_once 'Database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role']; // Get selected role

    // Validate input (you can add more validation as needed)
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($role)) {
        // Handle empty fields
        echo 'Please fill in all fields.';
    } elseif ($password !== $confirm_password) {
        // Handle password mismatch
        echo 'Passwords do not match.';
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $query = "INSERT INTO user_tbl (user_name, user_email, user_pass, user_role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $username, $email, $hashed_password, $role);
        
        if ($stmt->execute()) {
            echo 'Registration successful.';
            // Redirect to login page or any other page
            header('Location: login.php');
            exit();
        } else {
            echo 'Error inserting data: ' . $conn->error;
        }

        $stmt->close();
    }
} else {
    // Handle invalid request method
    echo 'Invalid request method.';
}
?>
