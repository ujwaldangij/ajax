<?php 
session_start();
if (isset($_SESSION["user_name"])) {
    # code...
    header('location: ./dashboard.php');
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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div id="head">
        <!-- form code -->
        <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                        <div class="form-container">
                            <h3 class="title"><img src="../img/login.png" alt="loading" width="50px"></h3>
                            <form class="form-horizontal" id="king">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                                </div>
                                <!-- <div class="form-group">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check-label">Remember Me </span>
                                </div> -->
                                <button type="submit" class="btn btn-info"><a href="register.php"
                                        class="text-dectext-decoration-none">Register</a></button>
                                <button type="submit" class="btn btn-success"><a href=""
                                        class="text-dectext-decoration-none">Login</a></button>
                                <div class="alert alert-danger mt-3 d-none" role="alert">
                                    <strong></strong>
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
    <?php 
    if (isset($_COOKIE["email"])) {
        # code...
        $a = $_COOKIE["email"];
        echo "<script>
            $('#email').val('$a');
            </script>";
    }
    if (isset($_COOKIE["password"])) {
        # code...
        $b = $_COOKIE["password"];
        echo "<script>
            $('#password').val('$b');
            </script>";
    }
    
    ?>
    <script>
        $(document).ready(function () {
            $('#head > div > div > div > div > div > form > button.btn.btn-success').on("click", function (e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "./new-index.php",
                    data: $('#king').serialize(),
                    success: function (response) {
                        // console.log(response);
                        if (response ==1) {
                            window.location.href = "./dashboard.php";
                        }else if (response == 0) {
                            $('.alert').removeClass('d-none').append('Username and password not match');
                            setTimeout(() => {
                                $('.alert').addClass('d-none').append('Username and password not match').slideUp();
                            }, 6000);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
