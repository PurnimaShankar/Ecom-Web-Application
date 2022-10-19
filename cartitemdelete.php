<?php
require_once('connection.php');
$id = $_GET['id'];
$sql = mysqli_query($con,"delete from cart where id = '$id'");

if (!$result = mysqli_query($con, $sql)==1)
 {
    
    echo "<script>alert('Successfully Delete');</script>";
    echo '<script>window.location.href="cart.php"</script>';} 


else {

    echo "<script>alert('Try Again');</script>";
 }
?>