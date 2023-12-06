<?php
// index.php

// Include necessary files
require_once 'models/ExpenseModel.php';
require_once 'models/CategoryModel.php';
require_once 'controllers/ExpenseController.php';
require_once 'controllers/CategoryController.php';

// Create instances of models
$expenseModel = new ExpenseModel();
$categoryModel = new CategoryModel();

// Create instances of controllers
$expenseController = new ExpenseController($expenseModel, $categoryModel);
$categoryController = new CategoryController($categoryModel);

// Define available actions
$validActions = [
    'add_expense', 'edit_expense', 'expense_list', 'expense_report',
    'addCategory', 'editCategory', 'viewCategories' // Include category-related actions
];

// Get the requested action from the URL
$action = isset($_GET['action']) ? $_GET['action'] : 'viewExpenses';

// Check if the requested action is valid
if (!in_array($action, $validActions)) {
    // Handle invalid action, maybe display an error page
    echo 'Invalid action requested.';
    exit;
}

// Dispatch the request to the appropriate controller method
switch ($action) {
    case 'addExpense':
        $expenseController->addExpenseAction();
        break;
    case 'editExpense':
        $expenseController->editExpenseAction($_GET['id']);
        break;
    case 'viewExpenses':
        $expenseController->viewExpensesAction();
        break;
    case 'generateExpenseReport':
        $expenseController->generateExpenseReportAction();
        break;
    case 'addCategory':
        $categoryController->addCategoryAction();
        break;
    case 'editCategory':
        $categoryController->editCategoryAction($_GET['id']);
        break;
    // Add more cases for other actions if needed
    default:
        // Handle default action, maybe redirect to a specific page
        echo 'Default action.';
        break;
}
?>
