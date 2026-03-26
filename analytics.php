<?php
include "db.php";
<link rel="stylesheet" href="css/style.css">
$query = "
SELECT categories.category_name,
SUM(expenses.amount) as total
FROM expenses
JOIN categories
ON expenses.category_id = categories.id
GROUP BY category_id
";

$result = $conn->query($query);

$category=[];
$total=[];

while($row=$result->fetch_assoc()){
$category[]=$row['category_name'];
$total[]=$row['total'];
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h2>Expense Analytics</h2>

<canvas id="myChart"></canvas>

<script>

var ctx=document.getElementById('myChart');

new Chart(ctx,{
type:'bar',

data:{
labels: <?php echo json_encode($category); ?>,

datasets:[{
label:'Expense Amount',
data: <?php echo json_encode($total); ?>
}]
}

});

</script>