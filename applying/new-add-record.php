<?php 

session_start();
include ('./config.php');

$topic = $_POST["topic"];
$bd_name = $_POST["bd_name"];
$platform = $_POST["platform"];
$team = $_POST["team"];
$date = $_POST["date"];
$time = $_POST["time"];
$created_by = $_SESSION["user_name"];

$out = '';



$q="INSERT INTO webinar (topic,bd_name,platform,date,time,create_by,team) VALUES ('{$topic}','{$bd_name}','{$platform}','{$date}','{$time}','{$created_by}','{$team}');";

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