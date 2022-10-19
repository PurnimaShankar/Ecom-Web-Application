<?php
include('connection.php');
session_start();
if (isset($_POST['save'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password =  mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "select * from main  where email='$email' and password='$password'");
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);

		$_SESSION['email'] = $row['email'];
		header("Location:admin.php");
	} 
    
     else {
		echo "<script>alert('wrong credentials');</script>";
	}
}
 
error_reporting(0);
ini_set('display_errors', 0);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Store</title>
</head>

<body>
    <?php include('header.php'); ?>
   
    <center>
        <h2 class="head">Admin Login</h2>
    </center>
    <div class="listing-section">

        <div class="container">
            <div class="row">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                 <form method="POST">
                <h2>Login Now</h2>  
                  <label>Username</label> 
                  <input type="text" class="form-control" name="email" required>

                  <label>Password</label> 
                  <input type="password" class="form-control" name="password" required>

                 <br> <button class="btn btn-primary" type="submit" name="save">Login</button>
                 </form>
            </div>
            <div class="col-sm-4"></div>
            
        </div>
    </div> 
    </div> 

    <!-- <footer> -->
    <?php include('footer.php'); ?>
 </body>

</html>