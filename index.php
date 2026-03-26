<?php
include "db.php";
$totalQuery = "SELECT SUM(amount) as total_expense FROM expenses";
$totalResult = $conn->query($totalQuery);
$totalData = $totalResult->fetch_assoc();

$countQuery = "SELECT COUNT(*) as total_count FROM expenses";
$countResult = $conn->query($countQuery);
$countData = $countResult->fetch_assoc();
?>

<h2>Expense List</h2>
<h3>Dashboard Summary</h3>

<p><b>Total Expenses:</b> ₹ <?php echo $totalData['total_expense']; ?></p>

<p><b>Total Transactions:</b> <?php echo $countData['total_count']; ?></p>

<hr>

<a href="add_expense.php">Add Expense</a>

<table border="1">

<tr>
<th>Amount</th>
<th>Category</th>
<th>Payment</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php

$sql="SELECT expenses.*, categories.category_name
FROM expenses
JOIN categories ON expenses.category_id = categories.id";

$result=$conn->query($sql);

while($row=$result->fetch_assoc()){

echo "<tr>
<td>".$row['amount']."</td>
<td>".$row['category_name']."</td>
<td>".$row['payment_method']."</td>
<td>".$row['date']."</td>

<td>
<a href='delete_expense.php?id=".$row['id']."'>Delete</a>
</td>

</tr>";
}
?>

</table>

<br><br>

<a href="analytics.php">View Analytics</a>