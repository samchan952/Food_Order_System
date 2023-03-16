<?php

include_once('db.php');




if(isset($_GET['id'] )){


   
    $done = "update `ordered_item` set status = 'Done' where order_id = '".$_SESSION['table']."'";
    $conn->query($done);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        /* .bor{
            width: 93rem;
            height: 38rem;
            border: 3px solid black;
        } */
       table{
        border: 1px solid black;
        width: 35rem;
        margin: 20px;
       }
        th,tr,td{
            
            border: 1px solid black;
        }
       
    </style>
    <h1>Kitchen order list</h1>

    <div class="bor">
    <?php 
    $sql = 'SELECT table_number FROM `table`';
    // Retrieve the table numbers
    $result = mysqli_query($conn, $sql);

// Loop through the table numbers

while($row = $result->fetch_array()) {
    $tableNumber = $row['table_number'];
    $sql1 = "SELECT o.id, i.name, o.quantity ,o.order_id FROM ordered_item o LEFT JOIN menu i ON o.menu_item_id = i.id WHERE o.order_id ='$tableNumber' and status = 'PENDING'";
    $orders = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($orders)>0){
        echo"<table>";
            echo"<thead>";
                echo"<tr>";
                    echo"<th>Table No".$tableNumber."</th>";
                    echo"<th>Quantity</th>";
                echo"</tr>";
            echo"</thead>";
            echo"<tbody>";
                while ($order = mysqli_fetch_assoc($orders)) {
                    echo '<tr>';
                    echo '<td>' . $order['name'] . '</td>';
                    echo '<td>' . $order['quantity'] . '</td>';
                    echo '</tr>';
                }
                echo '<tr>';
                echo "<button type='button' class='btn btn-light btn-lg' onclick='window.location.href=\"kitchen.php?id={$tableNumber}\"'>Done</button>";
                echo '</tr>';
            echo"</tbody>";
        echo"</table>";
    }
}
?>

    </div>


</body>
</html>