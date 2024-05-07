<?php
class Property {
    private $conn;

    private $name;
    private $location;
    private $price;
    private $status;
    private $image; // Add this property to store image path

    // Getter and Setter for Property Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    // Getter and Setter for Property Location
    public function setLocation($location) {
        $this->location = $location;
    }

    public function getLocation() {
        return $this->location;
    }

    // Getter and Setter for Property Price
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    // Getter and Setter for Property Status
    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    // Getter and Setter for Property Image
    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    public function connectDb($conn){
        $this->conn = $conn;
    }

    public function setId($id) {
        $this->id = $id;
    }

     // Method to insert property into the database
    public function insertProperty($name, $location, $price, $status, $image) {
        // Assuming you have a database connection stored in a property called $conn
        // You can adjust this part according to your actual database setup

        $stmt = $this->conn->prepare("INSERT INTO property_tbl (prop_name, prop_location, prop_price, prop_status, prop_img_path) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdss", $name, $location, $price, $status, $image);
        
        // Execute the statement
        $result = $stmt->execute();
        
        // Close the statement
        $stmt->close();
        
        return $result;
    }

    public function updateProperty() {
        // Check if all necessary properties are set
        if (!isset($this->id) || !isset($this->name) || !isset($this->location) || !isset($this->price) || !isset($this->status) || !isset($this->image)) {
            return false;
        }
    
        // Check if file was uploaded without errors
        if (!isset($this->image['tmp_name']) || $this->image['error'] !== UPLOAD_ERR_OK) {
            return false;
        }
    
        // Define the directory where uploaded images will be stored
        $uploadDirectory = "uploads/";
    
        // Generate a unique name for the uploaded image
        $uniqueFilename = uniqid() . '_' . basename($this->image['name']);
    
        // Define the file path where the image will be stored
        $imagePath = $uploadDirectory . $uniqueFilename;
    
        // Move the uploaded file to the specified directory
        if (!move_uploaded_file($this->image['tmp_name'], $imagePath)) {
            return false; // Failed to move the uploaded file
        }
    
        // Prepare and execute the update query
        $stmt = $this->conn->prepare("UPDATE property_tbl SET prop_name = ?, prop_location = ?, prop_price = ?, prop_status = ?, prop_img_path = ? WHERE id = ?");
        $stmt->bind_param("ssdssi", $this->name, $this->location, $this->price, $this->status, $imagePath, $this->id);
        $result = $stmt->execute();
    
        // Close the statement
        $stmt->close();
    
        return $result;
    }
    

    public function deletePropertyById($id) {
        // Prepare and execute the delete query
        $stmt = $this->conn->prepare("DELETE FROM property_tbl WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        
        // Close the statement
        $stmt->close();
        
        return $result;
    }

    public function getLastInsertedId() {
        // Assuming $conn is your database connection object
        // Implement the appropriate method based on your database library
        return $this->conn->insert_id; // For MySQLi
        // return $this->conn->lastInsertId(); // For PDO
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
        // Assuming $conn is your database connection object
        $stmt = $this->conn->prepare("SELECT prop_name, prop_location, prop_price, prop_status, prop_img_path FROM property_tbl WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
      
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getSavedProperties($userId, $filters, $searchKeyword)
    {
        // Start building the query
        $query = "SELECT property_tbl.* FROM property_tbl 
                INNER JOIN favourite_tbl ON property_tbl.id = favourite_tbl.prop_id 
                WHERE favourite_tbl.user_id = ?";

        $params = [$userId]; // User ID as the first parameter

        // Add filters if they are present
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $query .= " AND property_tbl.$key = ?";
                $params[] = $value; // Add filter value to the parameters array
            }
        }

        // Add search keyword if it is present
        if (!empty($searchKeyword)) {
            $query .= " AND (property_tbl.prop_name LIKE ? 
                        OR property_tbl.prop_location LIKE ?)";
            $params[] = "%$searchKeyword%";
            $params[] = "%$searchKeyword%"; // Search keyword for both name and location
        }

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $types = str_repeat('s', count($params)); // Assuming all parameters are strings
        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    
}
?>
