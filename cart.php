<?php
session_start();
if (isset($_SESSION['email'])) {
    include('connection.php');
    $logid = $_SESSION['email'];
    
}
error_reporting(0);
ini_set('display_errors', 0);

if (isset($_POST['order']))
 {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $zip = $_POST['zip'];
     $landmark = $_POST['landmark'];
     $address = $_POST['address'];
     
 
         $sql = "insert into customerorder (name,email,phone,zip,landmark,address,cemail)
         values('$name','$email','$phone','$zip','$landmark','$address','$logid')";
 
        if (!$result = mysqli_query($con, $sql)) 
        
        {
            echo "<script>alert('Try Again..');</script>";
        } 
        
        else
         {
          echo '<script>window.location.href="orderupdate.php"</script>';
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
         <h4 class="modal-title">Checkout Your Order!</h4>
      </div>
      <div class="modal-body">
       <form method="POST">
       <label>Name</label>
       <input type="text" class="form-control" Required name="name">
       
       <label>Email</label>
       <input type="email" class="form-control" Required name="email">
       
       <label>Phone</label>
       <input type="number" class="form-control" Required name="phone">
       
       <label>Zip</label>
       <input type="number" class="form-control" Required name="zip">
       
       <label>Land Mark</label>
       <input type="text" class="form-control" Required name="landmark">

       <label>Address</label>
       <input type="text" class="form-control" Required name="address">
       <br><button type="submit" class="btn btn-success" style="width:100%" name="order">Submit</button>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<body>
    <?php include('header.php'); ?>
     
    <center>
        <h2 class="head">Shopping Cart</h2>
    </center>
    <div class="listing-section">

        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="overflow-x:auto;">
                     <table id="table" class="table">
                      <tr>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Name</th>
                        <th>Total</th>
                        <th>Delete</th>
                      </tr>

                      <?php
                      include('connection.php');
                      $sql = "select * from cart where email='$logid' and status='0'  order by id desc";
                      $result11 = mysqli_query($con, $sql);

                      if (mysqli_num_rows($result11)) {

                      $i = 1;
                      while ($rows11 = mysqli_fetch_assoc($result11)) 
                      {
                        $q=$rows11['quantity'];
                        $p=$rows11['price'];
                        $final += $p*$q;
                        
                      ?>
                      <tr>
                        <td><img style="height:150px;width:200px" src="images/<?php echo $rows11['image'];?>"></td>
                        <td>$<?php echo $rows11['price'];?></td>
                        <form method="GET" action="cartupdate.php">
                        <input type="hidden" value="<?php echo $rows11['id'];?>" class="form-control" name="id">
                        <td><input type="number" value="<?php echo $rows11['quantity'];?>" class="form-control" name="quantity"></td>
                        <td><?php echo $rows11['name'];?></th>
                        <td><?php $q= $rows11['quantity']; $p= $rows11['price'];  echo $total= $q*$p;?></td>
                        <td><button class="btn btn-success" type="submit">Update Cart</button></form> <des title="Delete item"><a class="btn btn-danger" onclick="deleteRecord(<?php echo $rows11['id']; ?>)" href="javascript:void(0)"><i class="fa fa-times"></i></a></des> </td>
                     </tr>
                     <?php
                  } }
                  else {
                    $button = 'disabled';
                  ?>
                    <div style=" padding:15px; margin-top:10px;">

                      <h4 style="text-align:center;color:red;"><b>Sorry ! Cart is empty..!</b></h4>
                      <a href="index.php">Continue Shopping</a>
                    </div>
                  <?php
                  }
                  ?>
                     </table>
            </div>
        </div>
    </div>

    <div class="container">
            <div class="row">
            <div class="col-sm-8"></div>

            <div class="col-sm-4">
            <button  class="btn btn-success">Total: $<?php  echo $final;?></button> <button data-toggle="modal" data-target="#myModal" class="btn btn-warning" <?php echo $button;?>>Checkout</button>
            </div>
           </div></div>
            </div>

    <!-- <footer> -->
<footer>
<div class="container-fluid" style="background-color:black;color:white;padding-top:20px">
<div class="row">
<div class="col-sm-12">
<center><p>My Store All rights reserved @2022</p></center>
</div>
</div>
</div>
 </footer>
 <script>
    function deleteRecord(id) {
      var x = confirm("do you want to Delete?")
      if (x == true) {
        window.location = "cartitemdelete.php?id=" + id;
      }

    }
  </script>
 </body>

</html>