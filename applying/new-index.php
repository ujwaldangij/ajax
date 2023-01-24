<?php 

include ('./config.php');

$email = $_POST["email"];

$password = md5($_POST["password"]);

$q = "SELECT * FROM user WHERE user_email = '{$email}' AND user_password = '{$password}';";

$r = mysqli_query($con,$q);

$out = "";

if (mysqli_num_rows($r)>0) {
    # code...
    $out.=1;
    while ($row = mysqli_fetch_assoc($r)) {
        # code...
        session_start();
        $_SESSION["user_name"] = $row['user_name'];
        $_SESSION["id"] = $row['id'];
    }

}else{
    $out.=0;
}
echo $out;


?>