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
    </center>

    <div class="listing-section">
        <div class="container">
            <div class="row">
            
                <div class="col-sm-12">
                    <h4>Order List</h4>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Zip</th>
                                <th>Landmark</th>
                                <th>Address</th>
                                <th>Order Time</th>
                                <th>Setting</th>
                            </tr>
                            
                            <?php
                            include('connection.php');
                            $sql = "select * from customerorder order by id desc";
                            $result11 = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result11)) {

                            $i = 1;
                            while ($rows11 = mysqli_fetch_assoc($result11)) {

                            ?>
                            <tr>
                                <td>00<?php echo $rows11['id'];;?></td>
                                <td><?php echo $rows11['name'];?></td>
                                <td><?php echo $rows11['email'];?></td>
                                <td><?php echo $rows11['phone'];?></td>
                                <td><?php echo $rows11['zip'];?></td>
                                <td><?php echo $rows11['landmark'];?></td>
                                <td><?php echo $rows11['address'];?></td>
                                <td><?php $date_variable= $rows11['creat'];  echo date('d-M-Y H:i:s',strtotime($date_variable));?></td>
                                <td><a href="orderdelete.php?id=<?php echo $rows11['id'];?>&email=id=<?php echo $rows11['email'];?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> <a href="orderitemlist.php?order=<?php echo $rows11['cemail'];?>"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a></td>

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