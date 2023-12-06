<!-- add_expense.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Add New Expense</h1>
    <form method="post" action="index.php?action=addExpense">
        <label for="amount">Amount:</label>
        <input type="text" name="amount" required>
        <label for="date">Date:</label>
        <input type="date" name="date" required>
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Add Expense</button>
    </form>
</body>
</html>
