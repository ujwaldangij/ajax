<?php 

include_once __DIR__.'./config.php';

$q = "SELECT * FROM student;";

$r = mysqli_query($con,$q);


if (mysqli_num_rows($r)>0) {
    # code...
    $out = mysqli_fetch_all($r,MYSQLI_ASSOC);
    $data =['val' => $out, 'status' => true];
    $send = json_encode($data);
    echo $send;
}else{
    $data = ['val' => 'noting' , 'status' => false];
    $send = json_encode($data);
    echo $send;
}




// echo $send;
?>