<?php
session_start();
if (isset($_SESSION['email'])) {
  include('connection.php');
  $logid = $_SESSION['email'];
  $res = mysqli_query($con, "select * from main where email='$logid'");
  $row = mysqli_fetch_assoc($res);

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
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </center>

    <div class="listing-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <form method="POST" enctype="multipart/form-data">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control">

                        <label>Price</label>
                        <input type="text" name="price" class="form-control">

                        <label>Description</label>
                        <input type="text" name="description" class="form-control">

                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control">

                        <label>Category</label>
                        <input type="text" name="category" class="form-control">

                        <label>Image</label>
                        <input type="file" name="file" accept="image/*" name="quantity" class="form-control">

                        <br><button class="btn btn-primary" name="save" type="submit">Submit</button>
                    </form>
                </div>

                <div class="col-sm-8">
                    <h4>Product List</h4> 
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Setting</th>
                            </tr>
                            
                            <?php
                            include('connection.php');
                            $sql = "select * from product order by id desc";
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
                                <td><?php echo $rows11['category'];?></td>
                                <td><img src="images/<?php echo $rows11['file'];?>" style="height:100px;width:100px"></td>
                                <td><a href="delete.php?id=<?php echo $rows11['id'];?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> <a href="update.php?update=<?php echo $rows11['id'];?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a></td>

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
  header("location:Login.php");
}
?>