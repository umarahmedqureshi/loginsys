<?php    
    class connection{
        function conn(){
            $server = "localhost";
            $name = "Umar";
            $password = "password";
            $database = "users";

            $conn = mysqli_connect($server, $name, $password, $database);
            if (!$conn){
                die("Error". mysqli_connect_error());
            }
            return $conn;
        }

        function login($mailID,$password){
            $conn=$this->conn();

            $login = false;
            $showError = false;

            $sql = "SELECT * FROM `users` WHERE `mailID`='$mailID' ";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1){
                while($row=mysqli_fetch_assoc($result)){
                    if ($password == $row["password"]) {
                        $login = true;
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['mailID'] = $mailID;
                        $_SESSION['fname'] = $row['fname'];
                        $_SESSION['lname'] = $row['lname'];
                        $_SESSION['phn'] = $row['phn'];
                        $_SESSION['password'] = $password;
                        $_SESSION['pic'] =$row['pic'];

                        header("location: ../view/home.php");
                    }
                    else{
                        $showError = "Invalid Credentials";
                        
                    }
                }
            }
            else{
                $showError = "Invalid Credentials";
            }

            if($login){
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You are logged in
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
            }
            if($showError){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showError.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
            }
        }

        function register($fname,$lname,$mailID,$phn,$password,$cpassword,$folder)
        {
            $conn=$this->conn();


            $showAlert = false;
            $showError = false;

            // Check whether this mailID exists
            $existSql = "SELECT * FROM `users` WHERE `mailID` = '$mailID'";
            $result = mysqli_query($conn, $existSql);
            $numExistRows = mysqli_num_rows($result);
            if($numExistRows > 0){
                // $exists = true;
                $showError =
                "MailID Already Exists";
            }
            else{
                // $exists = false;
                if(($password == $cpassword)){
                    // $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `users` (`fname`,`lname`,`mailID`,`phn`, `password`,`pic`) VALUES ('$fname','$lname','$mailID','$phn', '$password','$folder')";
                    $result = mysqli_query($conn, $sql);
                    header("location: ../view/login.php");

                }
                else{
                    $showError =
                    "Passwords do not match";
                }
            }

            if($showAlert){
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your account is now created and you can login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';
            }
            if($showError){
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> '. $showError.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';
            }
        }

    
        function edit($fname,$lname,$phn)
        {
            $conn=$this->conn();
            session_start();
            $mailID=$_SESSION['mailID'];
            $password=$_SESSION['password'];
            $sql = "UPDATE `users` SET `fname` = '$fname', `lname` = '$lname' ,`phn`='$phn' WHERE `users`.`mailID` = '$mailID'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your record updated.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                 </div> ';
                 $call=$this->login($mailID,$password);
            }

        }
        
        function edit_pic($folder)
        {
            $conn=$this->conn();
            session_start();
            $mailID=$_SESSION['mailID'];
            $password=$_SESSION['password'];

            $sql = "UPDATE `users` SET `pic` = '$folder' WHERE `users`.`mailID` = '$mailID'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your record updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div> ';
                $call=$this->login($mailID,$password);
            }
            
        }

        function edit_picd($folder)
        {
            $conn=$this->conn();
            session_start();
            $mailID=$_SESSION['mailID'];
            $password=$_SESSION['password'];

            $sql = "UPDATE `users` SET `pic` = '$folder' WHERE `users`.`mailID` = '$mailID'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your record updated to default.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div> ';
                $call=$this->login($mailID,$password);
            }
            
        }

        function edit_pass($pass,$npass)
        {
            $conn=$this->conn();
            $showError = false;
            session_start();
            $mailID=$_SESSION['mailID'];
            $password=$_SESSION['password'];
            if($pass == $_SESSION['password']){
                $showError ="Existing Password";
            }
            
            else{
                if($pass == $npass){
                    $sql = "UPDATE `users` SET `password` = '$pass' WHERE `users`.`mailID` = '$mailID'";
                    $result = mysqli_query($conn, $sql);
                    if ($result){
                        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Password Changed.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> ';
                    }
                }
                else{
                    $showError =
                    "Passwords do not match";
                }
                  header("location: ../view/login.php");   
            }
            if($showError){
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showError.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div> ';
            }        
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>