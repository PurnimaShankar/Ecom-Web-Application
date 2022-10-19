<?php
include('connection.php');
 
    $id = $_GET['id'];
    $email = $_GET['order'];
    $sql = "update cart set status='2'  where id='$id'";
    $result = mysqli_query($con, $sql);
 
   if (!$result = mysqli_query($con, $sql)) 
   {
       echo "<script>alert('Try Again..');</script>";
      
   } else {

       echo "<script>alert('Successfully Updated');</script>";
       echo '<script>window.location.href="orderitemlist.php?order='.$email.'"</script>';

    }
?>