<?php

include_once('db.php');

if(isset($_GET['id'])){

    $tableNumber = $_SESSION['table'];

    $s = "update `order` set status = 'PAID' where table_number = $tableNumber and status = 'UNPAID'" ;
    if ($conn->query($s) === TRUE) {
        echo"<script>window.location.href='log_out.php;alert('DONE PAID');'</script>";
        session_destroy();
        header("location:index.php");
        exit;
      } else {
        echo"error"."<script>alert('wrong')</script>";
      }

}
    


?>