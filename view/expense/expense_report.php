<!-- expense_report.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Report</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Expense Report</h1>
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expenseReport as $categoryTotal): ?>
                <tr>
                    <td><?php echo $categoryTotal['category_name']; ?></td>
                    <td><?php echo $categoryTotal['total_amount']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
