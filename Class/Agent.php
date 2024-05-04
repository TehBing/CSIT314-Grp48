<?php
class Agent {
    public $conn;

    // public function __construct($conn) {
    //     $this->conn = $conn->getConnection();
    // }
    public function connectDb($conn){
        $this->conn = $conn;
    }

    public function get_agent() {
        $agentData = [];

        $sql_get_agent = ("SELECT * FROM user_tbl WHERE user_role = 'agent'");
        $result =  mysqli_query($this->conn, $sql_get_agent);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
                $agentData[] = $row;
      }

      return $agentData;
    }

    public function get_agentId($agentId) {
        $agentData = [];

        $sql_get_agentId = ("SELECT * FROM user_tbl WHERE id = '$agentId' ");
        $result =  mysqli_query($this->conn, $sql_get_agentId);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
                $agentData[] = $row;
      }

      return $agentData;
    }


  }

?>