

<?php 
include_once('db.php');













?>

<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}



* {
                margin:;
                padding:;
                border:;
                outline: 0
            }
 
            ul,                                                                                                                                                                                                                          
            li {
                list-style: none;
            }
 
            a {
                text-decoration: none;
            }
 
            a:hover {
                cursor: pointer;
                text-decoration: none;
            }
 
            a:link {
                text-decoration: none;
            }
 
            img {
                vertical-align: middle;
            }
 
            .btn-numbox {
                overflow: hidden;
                margin-top: 20px;
            }
 
            .btn-numbox li {
                float: left;
            }
 
            .btn-numbox li .number,
            .kucun {
                display: inline-block;
                font-size: 12px;
                color: #808080;
                vertical-align: sub;
            }
 
            .btn-numbox .count {
                overflow: hidden;
                margin: 0 16px 0 -20px;
            }
 
            .btn-numbox .count .num-jian,
            .input-num,
            .num-jia {
                display: inline-block;
                width: 28px;
                height: 28px;
                line-height: 28px;
                text-align: center;
                font-size: 18px;
                color: #999;
                cursor: pointer;
                border: 1px solid #e6e6e6;
            }
            .btn-numbox .count .input-num {
                width: 58px;
                height: 26px;
                color: #333;
                border-left:;
                border-right:;
            }
</style>
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
</head>
<body class="w3-content" style="max-width:1200px">
<div class="w3-display-container w3-container">
   
<?php

$tableNumber = $_SESSION['table'];
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
       
}
$sql2 = "SELECT * from `order` where status = 'UNPAID' and table_number = '$tableNumber'" ;
$res = $conn->query($sql2);
$result = mysqli_fetch_array($res);
echo "<tr>";
echo "<td colspan='2'>Subtotal Rm".$result['total_price']."</td>";
echo"</tr>";
echo"</tbody>";
echo"</table>";

echo "<button type='button' style='width:150px; height:150px; float:right;' class='btn btn-light btn-lg' onclick='window.location.href=\"pay.php?id={$tableNumber}\";'>PAY";
?>

<button type='button' style='float: right; width:150px; height:150px;' class='btn btn-light btn-lg' onclick='window.location.href="log_out.php"'>Exit</button>
</div>
</body>
</html>
<script>
	　  var num_add = document.getElementById("num-add");
        var num_sub = document.getElementById("num-sub");
        var input_num = document.getElementById("input-num");
        var max = document.getElementById("max").value;
        var qty = parseInt(max);


        var x = document.getElementById('price').value;
        var y = document.getElementById('input-num').value;
        document.getElementById('demo').innerHTML ="Total Amount RM " + x * y;

 
        num_add.onclick = function() {
        	if(input_num.value >= qty) {
               input_num.value = qty;
            }else{
            	input_num.value = parseInt(input_num.value) + 1;
            	var x = document.getElementById('price').value;
        		var y = document.getElementById('input-num').value;
        		document.getElementById('demo').innerHTML ="Total Amount RM " + x * y;

            }
            
        }

        num_sub.onclick = function() {
 
            if(input_num.value <= 1) {
                input_num.value = 1;
            } else {
                input_num.value = parseInt(input_num.value) - 1;
                var x = document.getElementById('price').value;
        		var y = document.getElementById('input-num').value;
        		document.getElementById('demo').innerHTML ="Total Amount RM " + x * y;
					
            }
 
        }

if (true) {
    
}
        

</script>
