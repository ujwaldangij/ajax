<?php 
session_start();
if (!isset($_SESSION["user_name"])) {
    # code...
    header('location: ./index.php');
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body>div>div>div {
            box-shadow: 3px 3px 3px black;
        }
        body > div > div > div > div > div.panel-heading > div > div.col-sm-7.col-12.text-right > div > button > a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-5 col-12">
                                <h4 class="title">Webinar <span>Details</span></h4>
                            </div>
                            <div class="col-sm-7 col-12 text-right">
                                <div class="btn_group">
                                    <span class="label label-danger">Filter:</span>
                                    <button type="button" class="btn btn-danger" title="Logout"><a href="logout.php"><i
                                                class="fas fa-sign-out-alt"></i>logout</a></button>
                                    <button type="button" class="btn btn-success upcomming" title="Active"><i
                                            class="fa fa-check-square"><a href="king.php">Upcomming</a></i></button>
                                    <button type="button" class="btn btn-warning  download" title="Active"><i class="fa fa-download" aria-hidden="true">
                                        <a href="download.php">Download</a>
                                    </i></button>
                                </div>
                                <a href="./add-record.php" class="btn add-new"><i class="fa fa-plus-circle"></i>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive" id="content">

                        <!-- end -->
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
        <script src="../js/jquery.js"></script>
        <script>
            $(document).ready(function () {
                var load = (a) => {
                    $.ajax({
                        type: "post",
                        url: "new-dashboard.php",
                        data: {
                            a: a
                        },
                        success: function (response) {
                            $('#content').html(response);
                        }
                    });
                }
                load();
                $(document).on("click", "#content > div > div > div > nav > ul > li > a", function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    console.log(id);
                    if (id > 0) {
                        load(id);
                    } else {
                        load();
                    }
                });
                // $(".upcomming").on("click", function () {
                //     var king = () => {
                //         $.ajax({
                //             type: "post",
                //             url: "king.php",
                //             success: function (response) {
                //                 console.log(response);
                //             }
                //         });
                //     }
                // });
                $(document).on("click", ".ni", function (e) {
                    e.preventDefault();
                    var id = $(this).data('eid');
                    console.log(id);
                    $.ajax({
                        type: "post",
                        url: "delete.php",
                        data: {id:id},
                        success: function (response) {
                            if (response == 1) {
                                load();
                            }else if (response == 0) {
                                console.log(response);
                            }
                        }
                    });
                    $('.download').on("click", function (e) {
                        e.preventDefault();
                    });
                })
                // $(document).on("click", ".ki", function (e) {
                //     e.preventDefault();
                //     var id = $(this).data('eid');
                //     console.log(id);
                //     $.ajax({
                //         type: "post",
                //         url: "edit.php",
                //         data: {id:id},
                //         success: function (response) {
                //             if (response == 1) {
                //                 load();
                //             }else if (response == 0) {
                //                 console.log(response);
                //             }
                //         }
                //     });
                // })
            });
        </script>
</body>

</html>