<?php 

$name = $_POST["name"];

$email = $_POST["name"];

$city = $_POST["city"];

$out = "";

if (!empty($name) && !empty($email) && !empty($city) ) {

    # code...
    $old_data = file_get_contents('./test.json');
    // echo $out.=$old_data;
    // die();

    $a = json_decode($old_data,true);//associative array
    
    $o = ['name' => $name,'email' => $email,'city' => $city];

    $a[] = $o;
    $k = json_encode($a,JSON_PRETTY_PRINT);//associative to json
    if (file_put_contents('./test.json',$k)) {
        # code...
       
    }
    $out.= ['message' => 'done', 'status' => true];

}else{

    $arr = ['message' => 'filed are empty', 'status' => false];
    $out.= json_encode($arr);

}
echo $out;



?>