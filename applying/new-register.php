<?php 

include ('./config.php');

$name = mysqli_real_escape_string($con,$_POST["name"]);
$email =mysqli_real_escape_string($con,$_POST["email"]);
$password =mysqli_real_escape_string($con,md5($_POST["password"]));
if (isset($_POST["remember"])) {
    # code...
    $remember =1;
    setcookie('email',$email,time() + (86400 *30 * 30),'/');
    setcookie('password',$_POST["password"],time() + (86400 *30 * 30),'/');
}else{
    $remember =0;
}
$out = "";
$q1 = "SELECT * FROM user WHERE user_email = '{$email}';";
$r1 = mysqli_query($con,$q1);

if (mysqli_num_rows($r1)>0) {

    // $s = ['message' => 'User Email Already taken','status' => false];
    $out.=0;
    # code...
}else{

    $q2 = "INSERT INTO user (user_name,user_email,user_password,remember) 
    VALUES('{$name}','{$email}','{$password}','{$remember}');";
    $r2 = mysqli_query($con,$q2);

    if ($q2) {
    
        // $s = ['message' => 'Record inserted Successfully','status' => true];
        $out.=1;
        # code...
    }

}
function mera($a)
{
    echo "<pre>";
    print_r($a);
    echo "</pre>";
    # code...
}

// mera($out);
echo $out;

?>