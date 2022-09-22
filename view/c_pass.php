<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Change Password</title>
    <style>
        .error{
            color:red
        }
    </style>
</head>

<body class="bg-secondary">
    <?php require 'partials/_nav.php' ?>
    <?php include '../controller/message.php' ?>
   
    <div class="container my-4 ">
        <div class="row-md-4 mt-5">
        <h1 class="text-center">Change Password</h1>
        <div class="col-md-8 offset-md-2 mt-3">
            <form action="../controller/connection.php" method="post" id="password">
                <div class="form-group">
                    <label for="pass">New Password</label>
                    <input type="password" class="form-control" id="pass" name="pass">

                </div>
                <div class="form-group">
                    <label for="npass">Confirm new password</label>
                    <input type="password" class="form-control" id="npass" name="npass">
                    <small id="npass" class="form-text text-muted">Make sure to type the same password</small>
                </div>


                <button type="submit" name="c_pass" class="btn btn-primary">Change Password</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="../jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#password").validate({
            rules: {
                pass: {
                    required: true,
                    minlength: 3,
                },
                npass: {
                    required: true,
                    minlength: 3,
                    equalTo: ("#pass"),
                }
            },
            messages: {
                cpassword: {
                required: "Please enter same password", 
                }
            },        
        });
    });
    </script>
</body>

</html>