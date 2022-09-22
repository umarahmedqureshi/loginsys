<?php
 session_start(); 
    if(isset($_SESSION['loggedin'])){
        header("location: home.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Login</title>
        <style>
            .error{
                color:red
            }
        </style>
    </head>

    <body class="bg-secondary text-light">
        <?php require 'partials/_nav.php' ?>
        <?php include '../controller/message.php' ?>

        <div class="container my-4 ">
            <h1 class="text-center">Login to our website</h1>
            <div>
                <form action="../controller/connection.php" method="post" id="login">
                    <div class="form-group">
                        <label for="mailID">Email Address</label>
                        <input type="email" class="form-control" id="mailID" name="mailID"  aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"  name="password">
                    </div>

                    <button type="submit" name="lsubmit" class="btn btn-success px-5 h1">Login</button>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
        <script src="jquery.validate.min.js"></script>
        <script >
            $("#login").validate({
                rules:{
                    mailID:'required',
                    password: 'required',     
                },
            });
        </script>
    </body>

</html>