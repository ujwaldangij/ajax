<?php 
session_start();
include ('./config.php');

if (isset($_POST["a"])) {
    $limit = 5;
    $offset = ($_POST["a"]-1)*$limit;
    $q = "SELECT * FROM webinar ORDER BY id DESC limit {$offset},{$limit}  ;";
    # code...
}else {
    # code...
    $limit = 5;
    $offset = 0;
    $q = "SELECT * FROM webinar  ORDER BY id DESC limit {$offset},{$limit} ;";
}

// $q = "SELECT * FROM webinar;";

$r = mysqli_query($con ,$q);

$out = "";

if (mysqli_num_rows($r)>0) {
    # code...
    $out.="<table class='table table-hover table-striped'>
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>Platform</th>
            <th>Topic</th>
            <th>Team</th>
            <th>Date</th>
            <th>Time</th>
            <th>Created By</th>
            <th>BD Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = mysqli_fetch_assoc($r)) {
        # code...
    

    $out.="
        <!-- table content -->

        <tr>
            <td>{$row['id']}</td>
            <td>
                <div class='user_icon'>";
                if ($row['platform']==1) {
                    # code...
                    $img = "exicon.png";
                }else if ($row['platform']==2) {
                    # code...
                    $img = "zoom.png";
                }elseif ($row['platform']==3) {
                    # code...
                    $img = "signin.jpg";
                }
                
                    $out.="<img src='../img/{$img}' alt=''>
                </div>
            </td>
            <td>{$row['topic']}</td>
            <td>{$row['team']}</td>
            <td>{$row['date']}</td>
            <td>{$row['time']}</td>
            <!-- <td><span class='status'>Active</span></td> -->
            <td>{$row['create_by']}</td>
            <td>{$row['bd_name']}</td>
            <td>
                <ul class='action-list'>
                    <!-- <li><button type='button' class='btn btn-warning'><i
                                class='fa fa-ban' </i></button></li> -->
                    <li><a href='edit.php?id={$row['id']}' class='btn btn-primary ki' data-eid='{$row['id']}'><i class='fa fa-pencil-alt'></i></a>
                    </li>
                    <li><a href='#' class='btn btn-danger ni' data-eid='{$row['id']}'><i class='fa fa-trash'></i></a></li>
                </ul>
            </td>
        </tr>
        <!-- end here -->
        ";
    }
        $out.="
    </tbody>
</table>";
    $q2 = "SELECT * FROM webinar;";
    $r2 = mysqli_query($con ,$q2);
    $tr = mysqli_num_rows($r2);
    $limit = 5;
    $tp = ceil($tr/$limit);
    $tp;
    $out.="<div class='panel-footer'>
    <div class='row'>
        <!-- <div class='col col-sm-6 col-xs-8'>Showing <b>5</b> out of <b>25</b> entries</div> -->
        <div class='col-sm-12'>
            <nav aria-label='Page navigation'>
                <ul class='pagination justify-content-center pagination-lg'>";
                for ($j=1; $j <=$tp ; $j++) { 
                    # code...
                    if (isset($_POST["a"])) {
                        # code...
                        $a = $_POST["a"];
                        $c= $a-$j;
                    }else{
                        $c =1;
                    }
                    $out.="<li class='page-item ' >
                        <a class='page-link' href='#' data-id='{$c}' aria-label='Previous'>
                            <span aria-hidden='true'>&laquo;</span>
                            <span class='sr-only'>Previous</span>
                        </a>
                    </li>";
                    break;
                }
                    for ($i=1; $i <=$tp ; $i++) { 
                        # code...

                        if (isset($_POST["a"])) {

                            if ($_POST["a"] == $i) {
                                # code...
                                $active = "active";
                            }else{
                                $active = "";
                            }
                            # code...
                        }else if ($offset == 0) {
                            # code...
                            $active ="active";
                        }
                    $out.="<li class='page-item {$active}'><a class='page-link' href='#' data-id='{$i}'>{$i}</a></li>";
                    }
                    
                    for ($u=1; $u <=$tp ; $u++) { 
                        $show = "";
                        # code...
                        if (isset($_POST["a"])) {
                            # code...
                            $x = $_POST["a"];
                            $q= $x+$u;
                            if ($q > $tp) {
                                # code..
                                $show = "disabled";
                            }else {
                                $show = "";
                            }
                        }else{
                            $q = 1;
                        }
                        $out.="<li class='page-item {$show}' >
                            <a class='page-link' href='#' data-id='{$q}' aria-label='Previous'>
                                <span aria-hidden='true'>&raquo;</span>
                                <span class='sr-only'>Previous</span>
                            </a>
                        </li>";
                        break;
                    }
                $out.="</ul>
            </nav>
        </div>
    </div>
</div>";
}else {
    # code...
    $out.= "no data found";
}
echo $out;




?>
