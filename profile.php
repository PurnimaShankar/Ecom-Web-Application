<?php
session_start();
if (isset($_SESSION['email'])) {
  include('connection.php');
  $logid = $_SESSION['email'];
  $res = mysqli_query($con, "select * from user where email='$logid'");
  $row = mysqli_fetch_assoc($res);
 
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
        <h2 class="head">User Dashboard</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </center>

    <div class="listing-section">
        <div class="container">
            <div class="row">
                 

                <div class="col-sm-12">
                    <h4>Order List</h4> 
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                 <th>Image</th>
                             </tr>
                            
                            <?php
                            include('connection.php');
                            
                            $sql = "select * from cart where email='$logid' and status='2' order by id desc";
                            $result11 = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result11)) {

                            $i = 1;
                            while ($rows11 = mysqli_fetch_assoc($result11)) {

                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $rows11['name'];?></td>
                                <td><?php echo $rows11['price'];?></td>
                                <td><details><?php echo $rows11['description'];?></details></td>
                                <td><?php echo $rows11['quantity'];?></td>
                                 <td><img src="images/<?php echo $rows11['image'];?>" style="height:100px;width:100px"></td>
 
                            </tr>
                            <?php $i++;}}?>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- <footer> -->
    <?php include('footer.php'); ?>
</body>

</html>

<?php
} else {
  header("location:login-register.php");
}
?>