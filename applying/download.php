
<?php 
session_start();
include ('./config.php');
// include_once __DIR__.'./link.php';
// if (isset($_POST["a"])) {
//     $limit = 5;
//     $offset = ($_POST["a"]-1)*$limit;
//     $q = "SELECT * FROM webinar ORDER BY id DESC limit {$offset},{$limit}  ;";
//     # code...
// }else {
//     # code...
//     $limit = 5;
//     $offset = 0;
//     $q = "SELECT * FROM webinar  ORDER BY id DESC limit {$offset},{$limit} ;";
// }

$q = "SELECT * FROM webinar ORDER BY date ;";

$r = mysqli_query($con ,$q);

$out = "";

if (mysqli_num_rows($r)>0) {
    # code...
    $out.="<table border='1|0'>
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>platform</th>
            <th>Topic</th>
            <th>Team</th>
            <th>Date</th>
            <th>Time</th>
            <th>Created By</th>
            <th>BD Name</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = mysqli_fetch_assoc($r)) {
        # code...
    

    $out.="
        <!-- table content -->

        <tr>
            <td>{$row['id']}</td>
            <td>{$row['platform']}</td>
            <td>{$row['topic']}</td>
            <td>{$row['team']}</td>
            <td>{$row['date']}</td>
            <td>{$row['time']}</td>
            <!-- <td><span class='status'>Active</span></td> -->
            <td>{$row['create_by']}</td>
            <td>{$row['bd_name']}</td>
        </tr>
        <!-- end here -->
        ";
    }
        $out.="
    </tbody>
</table>";
//     $q2 = "SELECT * FROM webinar;";
//     $r2 = mysqli_query($con ,$q2);
//     $tr = mysqli_num_rows($r2);
//     $limit = 5;
//     $tp = ceil($tr/$limit);
//     $tp;
//     $out.="<div class='panel-footer'>
//     <div class='row'>
//         <!-- <div class='col col-sm-6 col-xs-8'>Showing <b>5</b> out of <b>25</b> entries</div> -->
//         <div class='col-sm-12'>
//             <nav aria-label='Page navigation'>
//                 <ul class='pagination justify-content-center pagination-lg'>";
//                 for ($j=1; $j <=$tp ; $j++) { 
//                     # code...
//                     if (isset($_POST["a"])) {
//                         # code...
//                         $a = $_POST["a"];
//                         $c= $a-$j;
//                     }else{
//                         $c =1;
//                     }
//                     $out.="<li class='page-item ' >
//                         <a class='page-link' href='#' data-id='{$c}' aria-label='Previous'>
//                             <span aria-hidden='true'>&laquo;</span>
//                             <span class='sr-only'>Previous</span>
//                         </a>
//                     </li>";
//                     break;
//                 }
//                     for ($i=1; $i <=$tp ; $i++) { 
//                         # code...

//                         if (isset($_POST["a"])) {

//                             if ($_POST["a"] == $i) {
//                                 # code...
//                                 $active = "active";
//                             }else{
//                                 $active = "";
//                             }
//                             # code...
//                         }else {
//                             # code...
//                             $active = "";
//                         }
//                     $out.="<li class='page-item {$active}'><a class='page-link' href='#' data-id='{$i}'>{$i}</a></li>";
//                     }
                    
//                     for ($u=1; $u <=$tp ; $u++) { 
//                         $show = "";
//                         # code...
//                         if (isset($_POST["a"])) {
//                             # code...
//                             $x = $_POST["a"];
//                             $q= $x+$u;
//                             if ($q > $tp) {
//                                 # code..
//                                 $show = "disabled";
//                             }else {
//                                 $show = "";
//                             }
//                         }else{
//                             $q = 1;
//                         }
//                         $out.="<li class='page-item {$show}' >
//                             <a class='page-link' href='#' data-id='{$q}' aria-label='Previous'>
//                                 <span aria-hidden='true'>&raquo;</span>
//                                 <span class='sr-only'>Previous</span>
//                             </a>
//                         </li>";
//                         break;
//                     }
//                 $out.="</ul>
//             </nav>
//         </div>
//     </div>
// </div>";
}else {
    # code...
    $out.= "no data found";
}
// echo $out;

header('Content-Type:application/xls');
header('Content-disposition:attachment;filename=report.xls');
echo $out;




?>
