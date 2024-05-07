<?php
class User {
    public $conn;

    // public function __construct($conn) {
    //     $this->conn = $conn->getConnection();
    // }
    public function connectDb($conn){
        $this->conn = $conn;
    }

    public function get_userId($userId) {
        $userData = [];

        $sql_get_userId = ("SELECT * FROM user_tbl WHERE id = '$userId' ");
        $result =  mysqli_query($this->conn, $sql_get_userId);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
                $userData[] = $row;
      }

      return $userData;
    }

    public function get_userbyName($userName) {
        $userDatabyName = [];
    
        $sql_get_userbyName = "SELECT * FROM user_tbl WHERE user_name LIKE '%$userName%'";
        $result = mysqli_query($this->conn, $sql_get_userbyName);
    
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $userDatabyName[] = $row;
            }
        } else {
            // Handle the case where the query fails
            // For example, you can log an error or return an empty array
            error_log("Error executing SQL: " . mysqli_error($this->conn));
        }
    
        return $userDatabyName;
    }

    public function updateUserRole($userId, $newRole) {
        $sql_update_role = "UPDATE user_tbl SET user_role = '$newRole' WHERE id = '$userId'";
        mysqli_query($this->conn, $sql_update_role);
    }

    public function get_user($searchName = null) {
        $userData = [];
        $sql_get_user = "SELECT * FROM user_tbl";
    
        // Add a WHERE clause if a search name is provided
        if ($searchName !== null) {
            $sql_get_user .= " WHERE user_name LIKE '%$searchName%'";
        }
    
        $result = mysqli_query($this->conn, $sql_get_user);
    
        while ($row = mysqli_fetch_assoc($result)) {
            $userData[] = $row;
        }
    
        return $userData;
    }
    

  }

?>