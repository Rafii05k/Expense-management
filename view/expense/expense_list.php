<!-- expense_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense List</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Expense List</h1>
    <ul>
        <?php foreach ($expenses as $expense): ?>
            <li>
                Amount: <?php echo $expense['amount']; ?>,
                Date: <?php echo $expense['date']; ?>,
                Category: <?php echo $expense['category_name']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
