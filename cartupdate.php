<?php
include('connection.php');
 
  $quantity = $_GET['quantity']; 
  $id = $_GET['id'];
    $sql = "update cart set quantity='$quantity'  where id='$id'";
  $result = mysqli_query($con, $sql);
 
   if (!$result = mysqli_query($con, $sql)) 
   {
       echo "<script>alert('Try Again..');</script>";
      
   } else {

       echo "<script>alert('Successfully Updated');</script>";
       echo '<script>window.location.href="cart.php"</script>';

    }
?>