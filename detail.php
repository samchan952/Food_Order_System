

<?php 

include_once('db.php');
echo $_SESSION['table'];

$sql = "SELECT * FROM `menu` WHERE id ='".$_GET['id']."'";
$qry = mysqli_query($conn,$sql);
date_default_timezone_set("Asia/Kuala_Lumpur");
if(isset($_POST['submit'])){
    $table_id= $_SESSION['table'];
    $order_time = date("h:i:sa");
    $total_price = $_POST['price'] * $_POST['qty'];
    $request=$_POST['request'];
    $menu_id = $_GET['id'];
    $quantity = $_POST['qty'];

    echo $order = "INSERT INTO `order` (`table_number`,`order_time`,`total_price`,`request`,`status`,`menu_id`,`quantity`) VALUES ('$table_id','$order_time','$total_price','$request','PENDING','$menu_id','$quantity')";
    if(mysqli_query($conn,$order)){
        echo "<script> window.location.href='order.php?id=".$_SESSION['table']."';</script>";
    }else{
        echo "Fail";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>ITEM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

input[type=button], input[type=submit]{
    width:150px;
    height:200px;
}

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
                background-color: blue;
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
</head>
<body class="w3-content" style="max-width:1200px">
<div class="w3-display-container w3-container">
    <form name='form1' action="detail.php?id=<?=$_GET['id']?>" method='post'>
         <?php while($row = mysqli_fetch_array($qry)) {?>
            <table>
                <tr>
                <th rowspan="4"><img src="uploads/<?=$row['image']?>" style="width:50%;height: 50%;" ></th>
                    <input type="hidden" id="price" name='price' value="<?=$row['price']?>" readonly>
                    <input type="hidden" id="max" value="999" readonly>
                    <td><h2><?=$row['name']?></h2></td>
                </tr>
                <tr>
                    <td><ul class="btn-numbox">
            		<li><span class="number"></span></li>
            		<li>
                		<ul class="count" >
                    		<li><span style='height:35px;' id="num-sub" class="num-jian">-</span></li>
                    		<li><input type="text"  style='height:35px;' name="qty" class="input-num" id="input-num" value="1" readonly/></li>
                    		<li><span style='height:35px;' id="num-add" class="num-jia">+</span></li>
                		</ul>
            		</li>
            		<li><span class="kucun"></span></li>
　　　  			</ul></td>
                    <tr>
                        <td><span id="demo"></span></p>
                            <span>RM <?=$row['price']?> per unit</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="margin: 10px!important;"><textarea readonly name="request" rows="4" cols="50" id="request"></textarea>
                        <br>
                        <input type = "button" value = "More Ice" onclick = "form1.request.value += 'More Ice ' ">  
                        <input type = "button" value = "Less Ice" onclick = "form1.request.value += 'Less Ice ' ">  
                        <input type = "button" value = "No Ice" onclick = "form1.request.value += 'No Ice ' ">  
                        <input type = "button" value = "More Sugar" onclick = "form1.request.value += 'More Sugar ' "> 
                        <input type = "button" value = "Less Sugar" onclick = "form1.request.value += 'Less Sugar ' "> 
                        <input type = "button" value = "No Sugar" onclick = "form1.request.value += 'No Sugar ' "> 
                        </td> 
                        <td><input type = "button" value = "Clear All" onclick = "form1.request.value = ' ' " id= "clear" >  </td>

                    </tr>
                    
                    <tr>
                       
                        <td>
                            <?php
                                echo '<input type="submit" name="submit" value="Confrim">';
                                echo '<input type="button" value="Cancel" onclick="window.location.href=\'order.php?id='.$_SESSION['table'].'\'">';
                            ?>
                            
                        </td>
                    </tr>
                    
                </tr>
        <?php }?>
</a>

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

        
</script>
