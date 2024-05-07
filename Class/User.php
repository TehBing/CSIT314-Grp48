<?php
class User {
    public $conn;

    public function connectDb($conn){
        $this->conn = $conn;
    }
    public function get_users() {
        $users = [];

        $sql_get_users = ("SELECT * FROM user_tbl");
        $result =  mysqli_query($this->conn, $sql_get_users);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
      }

      return $users;
    }

    public function get_userById($userId) {
        $users = [];

        $sql_get_userById = ("SELECT * FROM user_tbl WHERE id = '$userId' ");
        $result =  mysqli_query($this->conn, $sql_get_userById);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
        }
        
      return $users;
    }

    public function update_role($updateUserId, $updateUserRole) {
      $updateUserId = mysqli_real_escape_string($this->conn, $updateUserId);
      $updateUserRole = mysqli_real_escape_string($this->conn, $updateUserRole);
  
      // Update user role in the database
      $sql_update_role = "UPDATE user_tbl 
                            SET user_role = '$updateUserRole' 
                            WHERE id = '$updateUserId'";
      
      $result = mysqli_query($this->conn, $sql_update_role);
    }
}
?>