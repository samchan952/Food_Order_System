<?php
include_once('db.php');


if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='done'){
  $id = $_GET['id'];
 echo  $done = "UPDATE `order` SET status = 'DONE' WHERE id = '$id'";
  if(mysqli_query($conn,$done)){
      echo "<script> window.location.href='kitchen.php';</script>";
  }
}

    
    $table_numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    $stmt = $conn->prepare("SELECT `order`.*, menu.name FROM `order` INNER JOIN `menu` ON `order`.`menu_id` = `menu`.`id`  WHERE table_number = ? AND status = 'PENDING'");
    $stmt->bind_param("i", $table_number);
    $results = array();
 
    foreach($table_numbers as $table_number){
        $stmt->execute();
        $result = $stmt->get_result();
        $results[$table_number] = $result->fetch_all(MYSQLI_ASSOC);
    }
    $stmt->close();

    // echo json_encode($results[1]);


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>KITCHEN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <h1>Order List</h1>
      <table class="table">
      <thead>
        <tr>
          <h3>Table 1</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[1] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 2</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[2] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 3</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[3] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 4</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[4] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 5</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[5] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 6</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[6] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 7</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[7] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 8</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[8] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 9</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[9] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>
  <table class="table">
      <thead>
        <tr>
          <h3>Table 10</h3>
          <th>Item</th>
          <th>Quantity</th>
          <th>Order Time</th>
          <th>Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results[10] as $row) {?>
          
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['order_time']?></td>
            <td><?=$row['request']?></td>
            <td><button class="btn btn-outline-primary btn-lg" onclick="window.location.href='kitchen.php?id=<?=$row['id']?>&action=done'">Done</button></td>
          </tr>
    
          <?php }?>
      </tbody>
    </table>


  
  
     
    </div>
  </div>
</div>

    
  
     
    </div>
  </div>
</div>

</body>
</html>
