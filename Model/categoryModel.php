<?php class CategoryModel {
    //connecting daabase to catagory model
    private $db;

    public function __construct($host, $username, $password, $database) {
        // Create a MySQLi connection
        $this->db = new mysqli($host, $username, $password, $database);

        // Check the connection
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // ... (other methods for CRUD operations)



    public function createCategory($name) {
        $query = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->close();
    }

    public function getCategoryById($id) {
        $query = "SELECT * FROM categories WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    public function getAllCategories() {
        $query = "SELECT * FROM categories";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
 ?>