<?php
include('connection.php');
session_start();
if (isset($_SESSION['email'])) {
$logid = $_SESSION['email'];
    
}
   
  $sql = "update cart set status='1'  where email='$logid'";
  $result = mysqli_query($con, $sql);
 
   if (!$result = mysqli_query($con, $sql)) 
   {
       echo "<script>alert('Try Again..');</script>";
      
   } else {

       echo "<script>alert('Successfully Order Placed');</script>";
       echo '<script>window.location.href="success.php"</script>';

    }
?>