<?php
class Property {
    public $conn;

    // public function __construct($conn) {
    //     $this->conn = $conn->getConnection();
    // }
    public function connectDb($conn){
        $this->conn = $conn;
    }

    public function getProperties($filters = []) {
        $sql = "SELECT * FROM property_tbl";
        if (!empty($filters)) {
            $conditions = [];
            foreach ($filters as $key => $value) {
                $conditions[] = "$key = '$value'";
            }
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        $sql .= " LIMIT 16";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
