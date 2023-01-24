<?php 
session_start();
if (!isset($_SESSION["user_name"])) {
    # code...
    header('location: ./index.php');
}

?>
<?php 

include ('./config.php');

if (isset($_POST["id"])) {
    # code...
    $id = $_POST["id"];
    $q = "DELETE FROM webinar where id = '{$id}';";
    $r = mysqli_query($con,$q);
    $out ="";
    if ($r) {
        # code...
        $out.=1;
    }else{
        $out.=0;
    }
    echo $out;
}




?>