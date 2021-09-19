<?php

    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-messsage'] = "<div class='error'>Please Login To Access</div>";
        header('location:'.SITEURL.'login.php');
    }

?>