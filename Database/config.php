<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CSIT314";

try{
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);

}
catch (mysqli_sql_exception $e){
    // Check connection
     die("Connection failed: " . mysqli_connect_error());
}
// Create users table
$sql_usertbl = "CREATE TABLE IF NOT EXISTS user_tbl (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    user_role VARCHAR(20) NOT NULL 
)";
mysqli_query($conn, $sql_usertbl);

// Create property table
$sql_property_tbl = "CREATE TABLE IF NOT EXISTS property_tbl (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prop_adress VARCHAR(30) NOT NULL,
    prop_desc TEXT NOT NULL,
    prop_status VARCHAR(15) NOT NULL,
    prop_cost DECIMAL(5,2) NOT NULL DEFAULT 0,
    prop_image VARCHAR(120) NOT NULL
)";
mysqli_query($conn, $sql_property_tbl);

// Create review table
$sql_review_tbl = "CREATE TABLE IF NOT EXISTS review_tbl (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    agent_id INT(6) NOT NULL,
    review_dateTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id) REFERENCES user_tbl(id),
    FOREIGN KEY (id) REFERENCES user_tbl(id)
)";
mysqli_query($conn, $sql_review_tbl);


?>