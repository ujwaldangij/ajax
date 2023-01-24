<?php 

// include __DIR__.'./config.php';

include ('./config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Upcomming_table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body::-webkit-scrollbar{
            width: 10px;
            background-color: gray;
        }
        body::-webkit-scrollbar-track{
            width: 10px;

            background-color: white;
        }
        body::-webkit-scrollbar-thumb{
            width: 10px;
            border-radius: 10px;
            background-color: #17A2B8;
        }
        
        
    </style>
    </head>

<body>
    <div id="head">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="text-center py-3 text-white bg-info rounded rounded-pill"> All record and upcomming
                        webinars</h2>
                    <div class="main">
                        <table class="table table-hover table-inverse ">
                            <thead class="thead-inverse">
                                <tr>
                                <th class="table-success">today</th>
                                </tr>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Platform</th>
                                    <th>Topic</th>
                                    <th>Team</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Created By</th>
                                    <th>BD Name</th>
                                </tr>
                            </thead>
                            <?php 
                            
                            $q = "SELECT * FROM webinar WHERE date = CURRENT_DATE() ;";
                            $r = mysqli_query($con ,$q);
                            
                            ?>
                            <tbody>
                                <?php 
                                //!################### for today
                                if (mysqli_num_rows($r)>0) {
                            while ($row = mysqli_fetch_assoc($r)) {
                            # code...
                            ?>
                                <!-- table content -->
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td>
                                        <div class='user_icon'>
                                            <?php 
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
                                        ?>
                                            <img src='../img/<?php echo $img?>' alt='' width="70px">
                                        </div>
                                    </td>
                                    <td><?php echo $row['topic'];?></td>
                                    <td><?php echo $row['team'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td><?php echo $row['time']?></td>
                                    <!-- <td><span class='status'>Active</span></td> -->
                                    <td><?php echo $row['create_by']?></td>
                                    <td><?php echo $row['bd_name']?></td>
                                </tr>
                                <!-- end here -->
                                <?php 
                                    }
                                }else{
                                    //!################### for today
                                    echo "<div class='alert alert-success' role='alert'>
                                    No Webinar today!!
                                  </div>";
                                }
                                ?>
                            </tbody>
                            <thead class="thead-inverse">
                                <tr>
                                <th class="table-success">Tomorrow</th>
                                </tr>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Platform</th>
                                    <th>Topic</th>
                                    <th>Team</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Created By</th>
                                    <th>BD Name</th>
                                </tr>
                            </thead>
                            <?php 
                            
                            $q = "SELECT * FROM webinar WHERE date = CURRENT_DATE() + 1 ORDER BY time;";
                            $r = mysqli_query($con ,$q);
                            
                            ?>
                            <tbody>
                                <?php 
                                //!################### for tomorrow
                                if (mysqli_num_rows($r)>0) {
                            while ($row = mysqli_fetch_assoc($r)) {
                            # code...
                            ?>
                                <!-- table content -->
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td>
                                        <div class='user_icon'>
                                            <?php 
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
                                        ?>
                                            <img src='../img/<?php echo $img?>' alt='' width="70px">
                                        </div>
                                    </td>
                                    <td><?php echo $row['topic'];?></td>
                                    <td><?php echo $row['team'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td><?php echo $row['time']?></td>
                                    <!-- <td><span class='status'>Active</span></td> -->
                                    <td><?php echo $row['create_by']?></td>
                                    <td><?php echo $row['bd_name']?></td>
                                </tr>
                                <!-- end here -->
                                <?php 
                                    }
                                }else{
                                    //!################### for tomorrow
                                    echo "<div class='alert alert-success' role='alert'>
                                    No Webinar tomorrow!!
                                  </div>";
                                }
                                ?>
                                <thead class="thead-inverse">
                                <tr>
                                <th class="table-success">day after tommorrow</th>
                                </tr>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Platform</th>
                                    <th>Topic</th>
                                    <th>Team</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Created By</th>
                                    <th>BD Name</th>
                                </tr>
                            </thead>
                            </tbody>
                            <?php 
                            
                            $q = "SELECT * FROM webinar WHERE date = CURRENT_DATE() + 2 ORDER BY time ;";
                            $r = mysqli_query($con ,$q);
                            
                            ?>
                            <tbody>
                                <?php 
                                //!################### for day tomorrow
                                if (mysqli_num_rows($r)>0) {
                            while ($row = mysqli_fetch_assoc($r)) {
                            # code...
                            ?>
                                <!-- table content -->
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td>
                                        <div class='user_icon'>
                                            <?php 
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
                                        ?>
                                            <img src='../img/<?php echo $img?>' alt='' width="70px">
                                        </div>
                                    </td>
                                    <td><?php echo $row['topic'];?></td>
                                    <td><?php echo $row['team'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td><?php echo $row['time']?></td>
                                    <!-- <td><span class='status'>Active</span></td> -->
                                    <td><?php echo $row['create_by']?></td>
                                    <td><?php echo $row['bd_name']?></td>
                                </tr>
                                <!-- end here -->
                                <?php 
                                    }
                                }else{
                                    //!################### for day tomorrow
                                    echo "<div class='alert alert-success' role='alert'>
                                    No Webinar day after tomorrow!!
                                  </div>";
                                }
                                ?>
                            </tbody>
                            
                        </table>
                        <div class="alert alert-info text-center" role="alert">
                        All Record
                        </div>
                        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <table class="table table-hover table-inverse ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Platform</th>
                                    <th>Topic</th>
                                    <th>Team</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Created By</th>
                                    <th>BD Name</th>
                                </tr>
                            </thead>
                            <?php 
                            
                            $q = "SELECT * FROM webinar ORDER BY id DESC;";
                            $r = mysqli_query($con ,$q);
                            
                            ?>
                            <tbody>
                                <?php 
                                if (mysqli_num_rows($r)>0) {
                            while ($row = mysqli_fetch_assoc($r)) {
                            # code...
                            ?>
                                <!-- table content -->
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td>
                                        <div class='user_icon'>
                                            <?php 
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
                                        ?>
                                            <img src='../img/<?php echo $img?>' alt='' width="70px">
                                        </div>
                                    </td>
                                    <td><?php echo $row['topic'];?></td>
                                    <td><?php echo $row['team'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td><?php echo $row['time']?></td>
                                    <!-- <td><span class='status'>Active</span></td> -->
                                    <td><?php echo $row['create_by']?></td>
                                    <td><?php echo $row['bd_name']?></td>
                                </tr>
                                <!-- end here -->
                                <?php 
                                    }
                                }else{
                                   "";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>