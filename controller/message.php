<?php
if(isset($_SESSION['error'])) 
{
       echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Error!</strong> '. $_SESSION['error'] .'
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
       </div> ';
   unset($_SESSION['error']);
}

if(isset($_SESSION['alert'])) 
{ echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> '.$_SESSION['alert'].'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> ';
   unset($_SESSION['alert']);
}
?>