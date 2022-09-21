<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    

    <div class="container my-4">
     <h1 class="text-center">Register to our website</h1>
     <form action="../controller/connection.php" method="post" enctype="multipart/form-data">
     <div class="row  mt-5">
     <div class="form-group col-md-6">
            <label for="fname">First Name</label>
            <input type="text" maxlength="11" class="form-control " id="fname" name="fname" required>
            
        </div> 
        <div class="form-group col-md-6 ">
        <label for="lname" >Last Name</label>
            <input type="text" maxlength="11" class="form-control " id="lname" name="lname" required>
            
        </div></div>
        <div class="form-group">
            <label for="mailID">Email Address</label>
            <input type="email" maxlength="25" class="form-control" id="mailID" name="mailID" required>
            
        </div>
        <div class="form-group">
            <label for="phn">Phone No.</label>
            <input type="text" maxlength="10" class="form-control" id="phn" name="phn" required >
            
        </div>
        <div class="form-group">
            <label for="img">Photo</label>
            <input type="file"  class="form-control" id="img" name="img" required >
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" maxlength="20" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required>

        </div>
         
        <button type="submit" name="register" class="btn btn-primary">Register</button>
     </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>