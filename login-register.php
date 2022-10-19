<?php
include('connection.php');
session_start();
if (isset($_POST['save'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password =  mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "select * from user  where email='$email' and password='$password'");
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);

		$_SESSION['email'] = $row['email'];
		header("Location:index.php");
	} 
    
     else {
		echo "<script>alert('wrong credentials');</script>";
	}
}

if(isset($_SESSION['email']))
{ //if login in session is not set
    header("Location: index.php");
}

else{
    
}

if (isset($_POST['register']))
 {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
 
         $sql = "insert into user (name,email,password)
         values('$name','$email','$password')";
 
        if (!$result = mysqli_query($con, $sql)) 
        
        {
            echo "<script>alert('Try Again..');</script>";
        } 
        
        else
         {
            echo "<script>alert('Successfully Register');</script>";
         }
}

error_reporting(0);
ini_set('display_errors', 0);
 
  if (isset($_POST['pass'])) {
 
   $pass = $_POST['password'];
   $email = $_POST['email'];
  
   $sql = "update user set password='$pass'  where email='$email'";
   $result = mysqli_query($con, $sql);
 
   if (!$result = mysqli_query($con, $sql)) 
   {
       echo "<script>alert('Try Again..');</script>";
      
   } else {

       echo "<script>alert('Successfully Updated Password');</script>";
       echo '<script>window.location.href="login-register.php"</script>';

    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Store</title>
</head>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Forgot Password </h4>
      </div>
      <div class="modal-body">
        <form method="POST">
        <label>Email</label>
        <input type="email" name="email" class="form-control">

        <label>New Password</label>
        <input type="text"   name="password" id="password" class="form-control" onkeyup='check();'>

        <label>Confirm Password</label>
        <input type="password"    class="form-control" name="confirm_password" id="confirm_password"  onkeyup='check();'>
        <span id='message'></span>

        <br><button type="submit" class="btn btn-primary" style="width: 100%;" name="pass">Confirm</button>
        </div>
     
     </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<body style="background-color:#e0e0e0;">
    <?php include('header.php'); ?>
   
    <center>
        <h2 class="head">Login | Register</h2>
    </center>
    <div class="listing-section">

        <div class="container">
            <div class="row">
                <div class="col-sm-5" style="background-color:blue ;padding-top:50px;padding-bottom:50px;border-radius:5px;color:white">
                 <form method="POST">
                <h2>Login Now</h2>  
                  <label>Username</label> 
                  <input type="text" class="form-control" name="email" required>

                  <label>Password</label> 
                  <input type="password" class="form-control" name="password" required>
                 
                  <br>
                  <input type="checkbox"> Remind Me
                 <br> <button style="width:100%" class="btn btn-primary" type="submit" name="save">Login</button>
                 </form>
                 <p><a style="color: white;" href="#" data-toggle="modal" data-target="#myModal">Forgot password ?</a></p>
            </div>

            <div class="col-sm-2"></div>

            <div class="col-sm-5" style="background-color:blue ;padding-top:50px;padding-bottom:50px;border-radius:5px;color:white">
                 <form method="POST">
                <h2>Register</h2>  
                  <label>Name</label> 
                  <input type="text" class="form-control" required name="name">

                  <label>Email</label> 
                  <input type="email" class="form-control" required name="email">

                  <label>Password</label> 
                  <input type="password" class="form-control" required name="password">

                 <br> <button style="width:100%" class="btn btn-primary" type="submit" name="register">Register</button>
                 </form>
            </div>
        </div>
    </div> 
    </div> 

    <!-- <footer> -->
    <?php include('footer.php'); ?>
 </body>

</html>