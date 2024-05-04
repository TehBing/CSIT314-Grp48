<?php
class Property {
    private $conn;

    public function connectDb($conn){
        $this->conn = $conn;
    }

    public function getProperties($filters = [], $searchKeyword = '') {
        $sql = "SELECT * FROM property_tbl";
        $conditions = [];
    
        // Handle other filters
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $conditions[] = "$key = ?";
            }
        }
    
        // Add search condition if search keyword is provided
        if (!empty($searchKeyword)) {
            $conditions[] = "prop_name LIKE ?";
            // Assuming you want to search in the 'prop_name' column
        }
    
        // Check if there are conditions to add to the WHERE clause
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
    
        $sql .= " LIMIT 16";
    
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameters for filters
        $types = str_repeat('s', count($filters));
        $bindParams = array_values($filters);
    
        // Bind parameter for search (if provided)
        if (!empty($searchKeyword)) {
            $types .= 's';
            $bindParams[] = '%' . $searchKeyword . '%';
        }
    
        if (!empty($filters) || !empty($searchKeyword)) {
            $stmt->bind_param($types, ...$bindParams);
        }
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    

    public function getPropertyById($id) {
        $query = "SELECT * FROM property_tbl WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $property = $result->fetch_assoc();

        return $property; // Return property details
    }

    // Insert new property
    public function insertProperty($propName, $propLocation, $propPrice, $propStatus, $propImage) {
        if (!isset($this->conn)) {
            die("Database connection is not set.");
        }

        // Prepare the SQL statement
        $query = "INSERT INTO property_tbl (prop_name, prop_location, prop_price, prop_status, prop_image) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Error preparing SQL statement: " . $this->conn->error);
        }

        // Bind parameters and execute the statement
        $stmt->bind_param('ssdss', $propName, $propLocation, $propPrice, $propStatus, $propImage);
        $result = $stmt->execute();

        if (!$result) {
            die("Error executing SQL statement: " . $stmt->error);
        }

        return $result;
    }

    // Update property
    public function updateProperty($propId, $propName, $propLocation, $propPrice, $propStatus) {
        $query = "UPDATE property_tbl SET prop_name=?, prop_location=?, prop_price=?, prop_status=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssdsi', $propName, $propLocation, $propPrice, $propStatus, $propId);

        return $stmt->execute();
    }

    // Delete property
    public function deleteProperty($propId) {
        $query = "DELETE FROM property_tbl WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $propId);

        return $stmt->execute();
    }
}
?>
