<?php
require_once('connection.php');
if (isset($_POST['save'])) {
    $rand = (rand(111111, 999999));
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $imagee = $rand . $_FILES['file']['name'];
    $category = $_POST['category'];

    $sql = "insert into product (name,description,price,quantity,file,category)
         values('$name','$description','$price','$quantity','$imagee','$category')";

    if (move_uploaded_file($_FILES['file']['tmp_name'], 'images/' . $imagee))

        if (!$result = mysqli_query($con, $sql)) 
        {
            echo "<script>alert('Try Again..');</script>";
           
        } else {

            echo "<script>alert('Successfully Added');</script>";
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

<body>
    <?php include('header.php'); ?>

     <center>
        <h2 class="head">Administrator</h2>
        <a href="order.php" class="btn btn-primary">Order List</a>
    </center>

    <div class="listing-section">
        <div class="container">
            <div class="row">
                 

                <div class="col-sm-12">
                    <h4>Product List</h4> 
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                 <th>Image</th>
                                 <th>Setting</th>
                             </tr>
                            
                            <?php
                            include('connection.php');
                            $email = $_GET['order'];
                            $sql = "select * from cart where email='$email' and status='1' order by id desc";
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
                                <td><a href="finalorderupdateadmin.php?id=<?php echo $rows11['id'];?>&order=<?php echo $email?>"><button class="btn btn-danger">Click for receive order</button></a></td>
 
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