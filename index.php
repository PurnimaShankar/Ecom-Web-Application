<?php
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
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <a href="search.php?name=a">  <img class="d-block w-100" src="images/slider.png" alt="First slide"></a>
    </div>
      </div>
   </div>

    <center>
    <h2 class="head">Categories</h2>
    </center>

    <div class="container">
        <div class="row">
            <a href="search.php?name=Furniture"><div class="col-md-4 col-xs-12 cat">
                <p style="text-align:right"><button class="btn btn-primary">10 Product</button></p>
                <h2 style="color:white;margin-top:95px">Furniture</h2></a>
            </div>
            
            <a href="search.php?name=Electronics"><div class="col-md-3 col-xs-12 cat2">
                <p style="text-align:right"><button class="btn btn-primary">07 Product</button></p>
                <h2 style="color:white;margin-top:95px">Electronics</h2></a>
            </div>
             
            <a href="search.php?name=Books"><div class="col-md-4 col-xs-12 cat3">
                <p style="text-align:right"><button class="btn btn-primary">13 Product</button></p>
                <h2 style="color:white;margin-top:95px">Books</h2></a>
            </div>
        </div>
    </div>
    <center>
        <h2 class="head">Our Products</h2>
    </center>
    <div class="listing-section" style="background-color: #e0e0e0;"> 

        <div class="container">
            <div class="row">
            <?php
            include('connection.php');
            $sql = "select * from product order by id desc";
            $result11 = mysqli_query($con, $sql);

            if (mysqli_num_rows($result11)) {

            $i = 1;
            while ($rows11 = mysqli_fetch_assoc($result11)) {

            ?>
            <div class="col-sm-3" >
                    <div class="product" >
                        <div class="image-box">
                           <br> <div class="images" style="background-position: center;background-repeat: no-repeat;background-size: cover;background-image: url('images/<?php echo $rows11['file'];?>');"></div>
                        </div>
                        <div class="text-box">
                            <h2 class="item"><?php echo $rows11['name'];?></h2>
                            <h3 class="price">Price: $<?php echo $rows11['price'];?>.00</h3>
                            <label for="item-1-quantity">Available: <?php echo $rows11['quantity'];?></label>
                            <hr>
                            <p class="description"><?php echo $rows11['description'];?></p>
                            <!-- <input type="number" min="1" name="item-1-quantity" class="form-control" value="1"> -->
                          <a href="details.php?product=<?PHP echo $rows11['id'];?>">  <center><br><button type="button" name="item-1-button" class="btn btn-primary">Add to Cart</button></center></a>
                        </div>
                    </div>
                </div>
            <?php $i++;}}?>       
            </div>
        </div>
    </div>
    
    <!-- <footer> -->
<div class="container-fluid" style="background-color:black;color:white;padding-top:20px">
<div class="row">
<div class="col-sm-12">
<center><p>My Store All rights reserved @2022</p></center>
</div>
</div>
</div>
 </body>

</html>