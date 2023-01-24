<?php 

$server_name ="localhost";
$user_name = "root";
$password ="";
$data_base = "webinar";


$con = mysqli_connect($server_name,$user_name,$password,$data_base) or die ('Error in Query of connection');

if (mysqli_connect_errno()) {
    # code...
    echo "<h1>Error in Query of connection</h1>".mysqli_connect_error();
}


?>