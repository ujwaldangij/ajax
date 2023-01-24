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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/add-record.css">
    <style>
        #daisy {
            width: 100vw;
            height: 100vh;
            position: relative;
            background-image: linear-gradient(to bottom left, #02aab0, #00cdac);
        }

        #child {
            width: 500px;
            height: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -250px;
            /* margin-right: auto;
        margin-left: 30%; */
        }

        @media screen and (max-width:768px) {

            #child {
                /* margin: 0 0; */
                font-size: 1rem;
            }

            #daisy {
                /* width: 100vw; */
                height: 120vh;
                /* position: relative; */
                /* background-color: antiquewhite; */
            }
        }

        @media screen and (max-width:500px) {

            #child {
                /* margin: 0 0; */
                width: 100%;
                height: 100%;
                margin: 0 0;
                /* font-size: 1rem; */
                top: 0;
                left: 0;
            }

            #daisy {
                /* width: 100vw; */
                height: 120vh;
                /* position: relative; */
                /* background-color: antiquewhite; */
                /* border-color: red; */
            }
        }
    </style>
</head>

<body>
    <div id="daisy"></div>
    <div id="child">
        <div class="form-bg">
            <div class="container">
                <div class="row justify-content-md-center ">
                    <div class="col-md-12">
                        <div class="alert alert-danger d-none" role="alert">
                            <strong>danger</strong>
                        </div>
                        <div class="form-container">
                            <h3 class="title">Add Record</h3>
                            <form class="form-horizontal" id="add_data">
                                <div class="form-group">
                                    <label>Topic</label>
                                    <input type="text" name="topic" id="topic" class="form-control" placeholder="Topic">
                                </div>
                                <div class="form-group">
                                    <label>BD Name</label>
                                    <input type="text" name="bd_name" id="bd_name" class="form-control"
                                        placeholder="Bd Name">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Platform</label>
                                    <select class="form-select" name="platform" id="platform">
                                        <option selected>Choose...</option>
                                        <option value="1">Exiweb</option>
                                        <option value="2">Zoom</option>
                                        <option value="3">other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="team">Team</label>
                                    <input type="text" class="form-control" name="team" id="team"
                                        aria-describedby="helpId" placeholder="Team">
                                </div>
                                <h4 class="sub-title">Date and Time</h4>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" id="date" class="form-control" placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="time" name="time" id="time" class="form-control" placeholder="Time">
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info" type="button" id="insert">Insert</button>
                                </div>
                            </form>
                            
                        </div>
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
    <script src="../js/jquery.js"></script>
    <script src="../js/daisy.js"></script>
    <script>
        $('#daisy').daisyjs({
            dotColor: 'rgb(0, 0, 102)',
            lineColor: 'rgb(0, 0, 204)'
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#insert').on("click", function (e) {
                e.preventDefault();
                console.log($('#add_data').serialize());
                var topic = $('#topic').val();
                var bd_name = $('#bd_name').val();
                var team = $('#team').val();
                var date = $('#date').val();
                var time = $('#time').val();
                if (topic == "") {
                    $('#topic').css('border-color', 'red');
                    setTimeout(() => {
                        $('#topic').css('border-color', 'blue');
                    }, 3000);
                } else if (bd_name == "") {
                    $('#bd_name').css('border-color', 'red');
                    setTimeout(() => {
                        $('#bd_name').css('border-color', 'blue');
                    }, 3000);
                }  else if (team == "") {
                    $('#team').css('border-color', 'red');
                    setTimeout(() => {
                        $('#team').css('border-color', 'blue');
                    }, 3000);
                }else if (date == "") {
                    $('#date').css('border-color', 'red');
                    setTimeout(() => {
                        $('#date').css('border-color', 'blue');
                    }, 3000);
                } else if (time == "") {
                    $('#time').css('border-color', 'red');
                    setTimeout(() => {
                        $('#time').css('border-color', 'blue');
                    }, 3000);
                } else {
                    $.ajax({
                        type: "post",
                        url: "new-add-record.php",
                        data: $('#add_data').serialize(),
                        success: function (response) {
                            // console.log(response);
                            if (response ==1) {
                                window.location.href = './dashboard.php';
                            } else if (response==0) {
                                $('.alert').append('Error in query').addClass('d-block');
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>