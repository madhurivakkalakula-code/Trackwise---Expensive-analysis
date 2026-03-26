<h2>Add Expense</h2>

<form method="POST">

<label>Amount</label><br>
<input type="number" name="amount" required>
<br><br>

<label>Category</label><br>
<select name="category">

<?php
$res = $conn->query("SELECT * FROM categories");

while($row=$res->fetch_assoc()){
echo "<option value=".$row['id'].">".$row['category_name']."</option>";
}
?>

</select>

<br><br>

<label>Payment Method</label><br>
<select name="payment">
<option>Cash</option>
<option>UPI</option>
<option>Card</option>
</select>

<br><br>

<label>Description</label><br>
<input type="text" name="description">

<br><br>

<label>Date</label><br>
<input type="date" name="date">

<br><br>

<button name="submit">Add Expense</button>

</form>