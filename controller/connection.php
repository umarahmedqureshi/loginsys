<?php
  include '../model/_dbconnect.php';

  if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['register'])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $mailID = $_POST["mailID"];
            $phn = $_POST["phn"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"]; 
            $pic = $_FILES["img"]["name"];
            
            $tmp_loc=$_FILES["img"]["tmp_name"];
            $folder="../image/".$pic;
            move_uploaded_file($tmp_loc,$folder);

            $rgtr= new connection();
            $xyz=$rgtr->register($fname,$lname,$mailID,$phn,$password,$cpassword,$folder);

        }
     
        if(isset($_POST['lsubmit'])){
                    
            $mailID = $_POST["mailID"];
            $password = $_POST["password"]; 

            $lgn= new connection();
            $xya=$lgn->login($mailID,$password);
                
        }

        if(isset($_POST['edit'])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $password = $_POST["password"];
            $phn = $_POST["phn"];

            $edt= new connection();
            $xye=$edt->edit($fname,$lname,$phn);
        }

        if(isset($_POST['edit_pic'])){
            $showError = false;
            $pic = $_FILES["img"]["name"];
            if(!empty($pic)){
                $tmp_loc=$_FILES["img"]["tmp_name"];
                $folder="../image/".$pic;
                move_uploaded_file($tmp_loc,$folder);
            
                $epc= new connection();
                $xyp=$epc->edit_pic($folder);
            }
            else{
                $tmp_loc=$_FILES["img"]["tmp_name"];
                $folder="../image/pic1.png";
                move_uploaded_file($tmp_loc,$folder);
              
                $depc= new connection();
                $dxyp=$depc->edit_picd($folder);
            }       
        }

        if(isset($_POST['c_pass'])) {
            $pass = $_POST["pass"];
            $npass = $_POST["npass"];
            

            $cps= new connection();
            $xyps=$cps->edit_pass($pass,$npass);
        }
    }

?>
    