<?php

// ExpenseController.php

class ExpenseController {
    private $expenseModel;
    private $categoryModel;

    public function __construct($expenseModel, $categoryModel) {
        $this->expenseModel = $expenseModel;
        $this->categoryModel = $categoryModel;
    }

    public function addExpenseAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'] ?? null;
            $date = $_POST['date'] ?? null;
            $category_id = $_POST['category_id'] ?? null;

            if ($this->validateExpenseData($amount, $date, $category_id)) {
                $result = $this->expenseModel->createExpense($amount, $date, $category_id);

                if ($result) {
                    $this->displaySuccessMessage("Expense added successfully!");
                } else {
                    $this->displayErrorMessage("Failed to add expense. Please try again.");
                }
            } else {
                $this->displayErrorMessage("Invalid input data. Please check your entries.");
            }
        }

        // Get categories for dropdown
        $categories = $this->categoryModel->getAllCategories();

        // Render the add expense form view
        require_once 'views/add_expense.php';
    }

    public function editExpenseAction($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'] ?? null;
            $date = $_POST['date'] ?? null;
            $category_id = $_POST['category_id'] ?? null;

            if ($this->validateExpenseData($amount, $date, $category_id)) {
                $result = $this->expenseModel->updateExpense($id, $amount, $date, $category_id);

                if ($result) {
                    $this->displaySuccessMessage("Expense updated successfully!");
                } else {
                    $this->displayErrorMessage("Failed to update expense. Please try again.");
                }
            } else {
                $this->displayErrorMessage("Invalid input data. Please check your entries.");
            }
        }

        // Get expense data for pre-filling the form
        $expense = $this->expenseModel->getExpenseById($id);

        // Get categories for dropdown
        $categories = $this->categoryModel->getAllCategories();

        // Render the edit expense form view
        require_once 'views/edit_expense.php';
    }

    

    private function validateExpenseData($amount, $date, $category_id) {
        // Presence Check
        if (empty($amount) || empty($date) || empty($category_id)) {
            return false;
        }

        // Numeric Check for Amount
        if (!is_numeric($amount)) {
            return false;
        }

        // Date Format Check (Assuming 'Y-m-d' format)
        $dateObj = DateTime::createFromFormat('Y-m-d', $date);
        if (!$dateObj || $dateObj->format('Y-m-d') !== $date) {
            return false;
        }

        // Category ID Check (Assuming $categoryModel has a method getCategoryById)
        $category = $this->categoryModel->getCategoryById($category_id);
        if (!$category) {
            return false;
        }

        return true;
    }

    


    
    


    

    private function displayErrorMessage($message) {
         echo '<p style="color: red;">' . $message . '</p>';
    }


    private function displaySuccessMessage($message) {
          echo '<p style="color: green;">' . $message . '</p>';
    }
}

?>
