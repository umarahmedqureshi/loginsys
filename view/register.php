<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Register</title>
    <style>
        .error{
            color:red
        }
    </style>
  </head>
  <body class="bg-secondary text-light">
    <?php require 'partials/_nav.php' ?>
    <?php include '../controller/message.php' ?>

    <div class="container my-4">
     <h1 class="text-center">Register to our website</h1>
     <form action="../controller/connection.php" method="post" id="register" enctype="multipart/form-data">
     <div class="row  mt-5">
     <div class="form-group col-md-6">
            <label for="fname">First Name</label>
            <input type="text" class="form-control " id="fname" name="fname">
            
        </div> 
        <div class="form-group col-md-6 ">
        <label for="lname" >Last Name</label>
            <input type="text" class="form-control " id="lname" name="lname">
            
        </div></div>
        <div class="form-group">
            <label for="mailID">Email Address</label>
            <input type="email" class="form-control" id="mailID" name="mailID">
            
        </div>
        <div class="form-group">
            <label for="phn">Phone No.</label>
            <input type="text" maxlength="10" pattern="[0-9]{10}" class="form-control" id="phn" name="phn" >
            
        </div>
        <div class="form-group">
            <label for="img">Photo</label>
            <input type="file"  class="form-control" id="img" name="img">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" >

        </div>
         
        <button type="submit" name="register" class="btn btn-success px-5 h1">Register</button>
     </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#register").validate({
            rules: {
                fname: "required",
                mailID: {
                    required: true,
                    email: true
                },      
                phn: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                },
                password: {
                    required: true,
                    minlength: 3,
                },
                cpassword: {
                    required: true,
                    minlength: 3,
                    equalTo: ("#password"),
                }
            },
            messages: {
                fname: {
                required: "Please enter first name",
                },          
                phn: {
                required: "Please enter phone number",
                digits: "Please enter valid phone number",
                minlength: "Phone number field accept only 10 digits",
                maxlength: "Phone number field accept only 10 digits",
                },     
                mailID: {
                required: "Please enter email address",
                email: "Please enter a valid email address.",
                },
                cpassword: {
                required: "Please enter same password", 
                }
            },        
        });
    });
    </script>
        
  </body>
</html>

