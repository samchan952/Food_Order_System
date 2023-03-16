<?php 

include_once('db.php');
$_SESSION['table'] = $_GET['id'];
$offset = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ORDER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
    <h2>Menu</h2>
    <?php
    while (true) {
      $result = $conn->query("SELECT * FROM `menu` LIMIT 5 OFFSET $offset");
      if ($result->num_rows > 0) {
        // output data of each row
        echo '<div class="col-sm-4">';
        echo "<table>";
        while($row = $result->fetch_assoc()) {
            echo "<td>";
            echo "<button type='button' style='width:150px; height:200px;' class='btn btn-light btn-lg' onclick='window.location.href=\"detail.php?id={$row['id']}\"'>";
            echo "<img src='uploads/" . $row['image'] . "' style='width='200' height='100''>";
            echo $row['name'];
            echo "<br>";
            echo 'RM' .$row['price'];
            echo "</button>";
            echo "</td>";
        }
        echo "</table>";
        $offset += 3;
        
      } else {
        break;
      }
    }
    echo "</div>";
  
    ?>
    </div>
    <div class="col-sm-4">
      
    </div>

    <div class="col-sm-4">
    <p>Order List</p>
    <table class="table">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Order Time</th>
      </tr>
    </thead>
    <?php

    $order_list = "SELECT * FROM `order` INNER JOIN `menu` ON `order`.`menu_id` = `menu`.`id` WHERE `table_number` = '".$_SESSION['table']."' AND `status`='PENDING'";
    $result1 = mysqli_query($conn,$order_list);
    
    ?>
    <tbody>
    <?php while($row = mysqli_fetch_array($result1)) {?>
      <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['quantity']?></td>
        <td><?=$row['order_time']?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
 
  <button type='button' style='float: right; width:150px; height:150px;' class='btn btn-light btn-lg' onclick='window.location.href="log_out.php"'>Exit </button>
  <button type='button' style='float: right; width:150px; height:150px;' class='btn btn-light btn-lg' onclick='window.location.href="pay.php"'> Payment</button>
    </div>
  </div>
</div>

</body>
</html>
