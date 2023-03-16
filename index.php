<?php 

include_once('db.php');

$offset = 0;
echo "<div class='container mt-3'>";
echo"<h2>Table</h2>";
while (true) {
  $result = $conn->query("SELECT * FROM `table` LIMIT 5 OFFSET $offset");
  if ($result->num_rows > 0) {
    // output data of each row
    
    echo "<table>";
    while($row = $result->fetch_assoc()) {
        echo "<td>";
        echo "<button type='button' style='width:220px; height:220px; margin:15px;' class='btn btn btn-outline-success btn-lg' onclick='window.location.href=\"order.php?id={$row['id']}\"'>";
        echo $row['table_number'];
        echo "</button>";
        echo "</td>";
        
    }
  
    echo "</table>";
    $offset += 5;
    
  } else {
    break;
  }
}
echo "</div>";
$conn->close();




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
</body>
</html>
