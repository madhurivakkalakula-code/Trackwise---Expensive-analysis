<?php
include "db.php";
<link rel="stylesheet" href="css/style.css">

if(isset($_POST['submit'])){

$amount = $_POST['amount'];
$category = $_POST['category'];
$payment = $_POST['payment'];
$desc = $_POST['description'];
$date = $_POST['date'];

$sql = "INSERT INTO expenses(amount,category_id,payment_method,description,date)
VALUES('$amount','$category','$payment','$desc','$date')";

$conn->query($sql);

header("Location:index.php");
}
?>

<h2>Add Expense</h2>

<form method="POST">

Amount
<input type="number" name="amount" required>

<br><br>

Category
<select name="category">

<?php

$res = $conn->query("SELECT * FROM categories");

while($row=$res->fetch_assoc()){
echo "<option value=".$row['id'].">".$row['category_name']."</option>";
}
?>

</select>

<br><br>

Payment Method
<select name="payment">
<option>Cash</option>
<option>UPI</option>
<option>Card</option>
</select>

<br><br>

Description
<input type="text" name="description">

<br><br>

Date
<input type="date" name="date">

<br><br>

<button name="submit">Add Expense</button>

</form>