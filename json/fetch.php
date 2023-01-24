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
    <style>
        #head>div>div>div>div {
            display: none;
            /* display: block; */
        }
    </style>
</head>

<body>
    <div id="head">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center py-3 text-white bg-primary ">fetch data</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>body</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td scope="row">1</td>
                                <td>name</td>
                                <td>Lorem ipsum dolor sit.</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="alert alert-danger text-center" role="alert">
                        <strong></strong>
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
        $(document).ready(function () {
            // $.ajax({
            //     type: "get",
            //     url: "https://jsonplaceholder.typicode.com/posts",
            //     success: function (response) {
            //         console.log(response);
            //         $.each(response, function (indexInArray, valueOfElement) {
            //             $('#tbody').append(
            //                 `<tr><td>${valueOfElement.id}</td><td>${valueOfElement.title}</td><td>${valueOfElement.body}</td></tr>`
            //             );
            //         });
            //     }
            // });
            $.ajax({
                type: "post",
                url: "./all-record.php",
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    if (response.status == false) {
                        $('#head > div > div > div > div ').slideDown();
                            $('#head > div > div > div > div > strong').append(
                                'No record found').fadeIn().css('display', 'block');
                        setTimeout(() => {
                            $('#head > div > div > div > div ').slideUp();
                            $('#head > div > div > div > div > strong').append(
                                'No record found').fadeOut().css('display', 'none');

                        }, 3000);
                    } else {
                        console.log(response.val);
                        $.each(response.val, function (indexInArray, valueOfElement) {
                            $('#tbody').append(
                                `<tr><td>${valueOfElement.id}</td><td>${valueOfElement.name}</td><td>${valueOfElement.last_name}</td></tr>`
                            );
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>