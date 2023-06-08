<?php 
session_start();

/* 
*   example for this
*
*   // $server = "server621.iseencloud.com";
*   // $user   = "jomjomco";
*    // $pass   = "W7#02YJpcAz1#v";
*   // $data   = "jomjomco_food_order"; 
*
*/

// $server = "sql110.epizy.com";
// $user   = "epiz_33710871";
// $pass   = "NwBb4M5tWlsO";
// $data   = "epiz_33710871_food_order";

// $server = "localhost";
// $user   = "root";
// $pass   = "886488";
// $data   = "food_order";

$conn = mysqli_connect($server,$user,$pass,$data);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
?>