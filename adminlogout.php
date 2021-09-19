<?php 

    include('db1.php');

    session_destroy();

    header('location:'.SITEURL.'adminlogin.php');

?>