<?php
session_start();
require_once "db1.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: overview.html");
}
if (isset($_POST['login'])) {
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if(strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}  
$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . $password . "'");
if ($row = mysqli_fetch_array($result)) {
$_SESSION['user_id'] = $row['uid'];
$_SESSION['user_name'] = $row['name'];
$_SESSION['user_mobile'] = $row['mobile'];
$_SESSION['user_email'] = $row['email'];
header("Location: overview.html");
} else {
$error_message = "Incorrect Email or Password!!!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <style>

* {
    margin: 0px;
    padding: 0px;
  }
  body {
    font-size: 120%;
    background: url(ID-Serafina-Hotel-ICRAVE-Puerto-Rico-Alex_Herrera_SBH_Public_03.jpg) no-repeat ;
    background-size: cover;
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
  <p style="font-style: italic">Welcome to RS Hotel</p>
  <h1>Login And Discover</h1>
</div>
<div class="container">
<div class="row">
<div class="col-lg-10">
<div class="page-header">
<br>
</div>
<span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group ">
<label style="color:#404040"><b>Email</b></label>
<input type="email" name="email" class="form-control" value="" maxlength="40" required="">
<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
</div>
<div class="form-group">
<label style="color:#404040"><b>Password</b></label>
<input type="password" name="password" class="form-control" value="" maxlength="20" required="">
<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
</div>  
<input type="submit" class="btn btn-primary" name="login" value="Submit" onClick="Javascript:window.location.href = 'overview.php';" >
<form action="submit" Method="GET"> 
            <a href="overview.html" class="btn"> </a>
        </form>
<br>
<b >You don't have account?</b><br>
<p> <a href="registration.php" class="mt-3"  > Become a member&nbsp;</a> just in one click!</p>
</form>
</div>
</div>     
</div>
</body>
</html>