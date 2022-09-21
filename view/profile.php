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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome -
      <?php echo $_SESSION['fname']?>
    </title>
  </head>

  <body>
    <?php require 'partials/_nav.php' ?>

    <div class="container py-5">
      <div class="row mt-3">
        <div class="col-md-12">
          <h1 class="text-center">User Profile</h1>
        </div>
      </div>
      <div class="row mt-4">

        <div class="col-md-6 offset-3">
          <div class="card">
            <div class="card-body">
              <img src="<?php echo $_SESSION['pic'];?>" alt="" style="width:100%">
              <h1 class="card-title">Profile</h1>
              <p class="card-text">
              <H3>Email ID:-
                <?php echo $_SESSION['mailID'].'<br>'?>
              </H3>
              <H3>Full Name:-
                <?php echo $_SESSION['fname'].' '.$_SESSION['lname'].'<br>'?>
              </H3>
              <H3>Phone No.:-
                <?php echo $_SESSION['phn'].'<br>'?>
              </H3>
              </p>
            </div>
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
  </body>

</html>