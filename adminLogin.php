<?php include('../config/connection.php'); ?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>

        <div class="login">
            <h1>Login</h1>
            <br>

            <?php 
                 if(isset($_SESSION['login']))
                 {
                   echo $_SESSION['login']; //display msg
                   unset($_SESSION['login']); //remove msg
                 }

                 if(isset($_SESSION['no-login-messsage']))
                 {
                   echo $_SESSION['no-login-messsage']; //display msg
                   unset($_SESSION['no-login-messsage']); //remove msg
                 }


            ?>
            <br>


            <form action="" method="POST">
            
            Username: 
            <input type="text" name="username" placeholder="Enter Username"> <br><br>
            Password: 
            <input type="password" name="password" placeholder="Enter Password"> <br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">

            
            </form> 
            <br>

            <p>Created By : <a href="#">Koussay Abdelkader</a></p>
        
        </div>

    </body>

</html>     



<?php 

        if(isset($_POST['submit']))
        {
             $username = $_POST['username'];
             $password = ($_POST['password']);

             $sql = " SELECT * FROM tbl_admin WHERE username='$username' AND password = '$password' ";

             $res = mysqli_query($con,$sql);

             $count = mysqli_num_rows($res);

             if($count == 1)
             {
                $_SESSION['login'] = "<div class='success'>Login Successfully</div>";
                $_SESSION['user'] = $username; // to check user is logged in
                header("location:".SITEURL.'admin/');
             }
             else
             {
                $_SESSION['login'] = "<div class='error'>Login Failed</div>";
                header('location:'.SITEURL.'adminlogin.php');

             }


        }


?>