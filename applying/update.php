<?php 

session_start();
include ('./config.php');
$id = $_POST["id"];
$topic = $_POST["topic"];
$bd_name = $_POST["bd_name"];
$platform = $_POST["platform"];
$team = $_POST["team"];
$date = $_POST["date"];
$time = $_POST["time"];
$created_by = $_SESSION["user_name"];

$out = '';



$q="UPDATE  webinar SET topic = '{$topic}' , bd_name = '{$bd_name}' , platform = '{$platform}' , team = '{$team}' , date = '{$date}' , time = '{$time}',create_by = '{$created_by}' WHERE id = '{$id}';";

$r= mysqli_query($con,$q);

if ($r) {
    $out.= 1;
    # code...
}else {
    # code...
    $out.= 0;
}
echo $out;




?>