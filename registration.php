<?php
  require_once "db1.php";

    if (isset($_POST['signup'])) {
        $firstname = mysqli_real_escape_string($con, $_POST['fname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lname']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); 
        if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
            $fname_error = "Name must contain only alphabets and space";
        }
        if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
            $lname_error = "Name must contain only alphabets and space";
        }
        if (!preg_match("/^[a-zA-Z ]+$/",$address)) {
            $address_error = "address must contain only alphabets and space";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }       
        if(strlen($phone) < 10) {
            $mobile_error = "Mobile number must be minimum of 10 characters";
        }
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
        }
        if (!$error) {
            if(mysqli_query($con, "INSERT INTO client(firstname, lastname,address, email, phone ,password) VALUES('" . $firstname . "', '" . $lastname . "', '" . $address . "','" . $email . "', '" . $phone . "', '" . $password . "')")){
             header("location: login.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($con);
            }
        }
        mysqli_close($con);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Registration </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>

* {
    margin: 0px;
    padding: 0px;
  }
  body {
    font-size: 100%;
    background: url(sign.jpg) no-repeat ;
    background-size:cover ;
    color:black;

   
  } 
  .header {
  padding: 7px;
  text-align: center;
  background-color: powderblue;;
  color: black;
  font-size: 30px;
  font-family: 'Times New Roman', Times, serif;
}
    </style>
    <div class="header">
  <h1 style="font-style: italic">Join Us</h1>
  <p> Please fill all fields in the form!</p>
</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                </div>
                <p></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                        <label> <b>First Name</b></label>
                        <input type="text" name="fname" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label> <b>Last Name</b></label>
                        <input type="text" name="lname" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label> <b>Address</b></label>
                        <input type="text" name="address" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($address_error)) echo $address_error; ?></span>
                    </div>
                    <div class="form-group ">
                        <label><b>Email</b></label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label><b>Mobile</b></label>
                        <input type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
                        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label><b>Password</b></label>
                        <input type="password" name="password" class="form-control" value="" maxlength="20" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  

                    <div class="form-group">
                        <label><b>Confirm Password</b></label>
                        <input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" name="signup" value="submit"><br>
                    <h3>Already have a account? return to &nbsp;<a href="login.php" class="btn btn-default" style="color: blue; font-size: 20px"><b><u>Login Page</u></b></a></h3>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>
