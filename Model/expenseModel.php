<?php 
    class ExpenseModel {
        // connecting database to the expense model
        private $db;
    
        public function __construct($host, $username, $password, $database) {
            // Create a MySQLi connection
            $this->db = new mysqli($host, $username, $password, $database);
    
            // Check the connection
            if ($this->db->connect_error) {
                die("Connection failed: " . $this->db->connect_error);
            }
        }
    
        
    


    public function createExpense($amount, $date, $categoryId) {
        $query = "INSERT INTO expenses (amount, date, category_id) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("dsi", $amount, $date, $categoryId);
        $stmt->execute();
        $stmt->close();
    }

    public function getExpenseById($id) {
        $query = "SELECT * FROM expenses WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    public function updateExpense($id, $amount, $date, $categoryId) {
        $query = "UPDATE expenses SET amount = ?, date = ?, category_id = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("dsii", $amount, $date, $categoryId, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteExpense($id) {
        $query = "DELETE FROM expenses WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllExpenses() {
        $query = "SELECT * FROM expenses";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
 }
?>