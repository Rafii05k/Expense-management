<?php

require_once 'CategoryModel.php';

class CategoryController {
    private $categoryModel;

    public function __construct($host, $username, $password, $database) {
        $this->categoryModel = new CategoryModel($host, $username, $password, $database);
    }

    // Category-related actions

    public function addCategoryAction($name) {
        // Validation and sanitation (not shown here)
        $this->categoryModel->createCategory($name);
        // Redirect or render appropriate view
    }

    public function editCategoryAction($id, $name) {
        // Validation and sanitation (not shown here)
        $this->categoryModel->updateCategory($id, $name);
        // Redirect or render appropriate view
    }

    public function deleteCategoryAction($id) {
        // Validation and sanitation (not shown here)
        $this->categoryModel->deleteCategory($id);
        // Redirect or render appropriate view
    }

    public function viewCategoriesAction() {
        $categories = $this->categoryModel->getAllCategories();
        // Render view to display categories
    }
}

?>
