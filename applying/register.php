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
    <style>
        #head {
            background-image: url('../img/signin.jpg');
            /* border-color: red; */
        }
    </style>
</head>

<body>
    <div id="head">
        <!-- form code -->
        <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                        <div class="form-container">
                            <h3 class="title">Create Account</h3>
                            <form class="form-horizontal" id="register">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    <span class="text-danger name"></span>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                        required>
                                    <span class="text-danger email"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                    <span class="text-danger password"></span>
                                </div>
                                <!-- <div class="form-group" id="remember">
                                    <input type="checkbox" name="remember" class="checkbox">
                                    <span class="check-label"><label for="Remember Me">Remember Me </label></span>
                                </div> -->
                                <div class="form-group" id="remember">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info"><a href=""
                                        class="text-dectext-decoration-none">Register</a></button>
                                <button type="submit" class="btn btn-success"><a href="index.php"
                                        class="text-dectext-decoration-none">Login</a></button>

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
    <script>
        // !stating
        $(document).ready(function () {
            $('.btn-info').on("click", function (e) {
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                // !checking field  data
                if (name == "") {
                    $('#name').css("border-color", 'red');
                    $('.name').append('Name Field is empty');
                    setTimeout(() => {
                        $('#name').css("border-color", 'blue');
                        $('.name').hide();
                    }, 3000);
                } else if (email == "") {
                    $('#email').css("border-color", 'red');
                    $('.email').append('email Field is empty');
                    setTimeout(() => {
                        $('#email').css("border-color", 'blue');
                        $('.email').hide();
                    }, 3000);
                } else if (password == "") {
                    $('#password').css("border-color", 'red');
                    $('.password').append('password Field is empty');
                    setTimeout(() => {
                        $('#password').css("border-color", 'blue');
                        $('.password').hide();
                    }, 3000);
                } else {
                    $.ajax({
                        type: "post",
                        url: "./new-register.php",
                        data: $('#register').serialize(),
                        success: function (response) {
                            console.log(response);
                            if (response == 1) {
                                window.location.href = "index.php";
                            } else if (response == 0) {
                                $('#email').css("border-color", 'red');
                                $('.email').append('email already taken');
                                setTimeout(() => {
                                    $('#email').css("border-color", 'blue');
                                    $('.email').hide();
                                }, 3000);
                            }
                        }
                    });
                }

            });
        });
    </script>
</body>

</html>

<?php 

// 71 => https://vimeo.com/user139969199/download/663628722/16fc8c6230

// 70 => https://vimeo.com/user132257990/download/660090035/1b641b0b80

// 69 => https://vimeo.com/user132257990/download/655608525/b7471e518f

// 68 => https://vimeo.com/user139969199/download/653159395/af3e238bef

// 67 => https://vimeo.com/user139969199/download/650596173/10d49eeec8

// 66 => https://vimeo.com/user139969199/download/647608357/6644d22d3d

// 65 => https://vimeo.com/user132257990/download/645501976/5fdfb2acf0

?>