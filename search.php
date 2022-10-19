 
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
        <h2 class="head">Search Result</h2>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <select class="form-control" ONCHANGE="location = this.options[this.selectedIndex].value;" name="name">
                    <option>---Search by category---</option>
                    <?php
                    include('connection.php');
                    $sql = "select * from product order by id desc";
                    $result11 = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result11)) {

                    $i = 1;
                    while ($rows11 = mysqli_fetch_assoc($result11)) {

                    ?>
                    <option value="search.php?name=<?php echo $rows11['category'];?>"><?php echo $rows11['category'];?></option>
                    <?php $i++;}}?>

                    </select>
                    </div>

            
            <div class="col-sm-2">
            <form method="get" action="search2.php">
                <input type="number" placeholder="Min" min="1" class="form-control" name="min">
             </div>
                
                <div class="col-sm-2">
                <input type="number" placeholder="Max" min="1" class="form-control" name="max">
                </div>
                
                <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                </div>
              </form>

              
                <div class="col-sm-2">
                <form method="get" action="search.php"> 
                <input type="text" placeholder="Product name" name="name" class="form-control">
                </div>

                <div class="col-sm-1">
                <button class="btn btn-primary">Search</button>
                </div>
              </form>
            </div>
        </div>
    </div>

    <div class="listing-section">
        <div class="container">
            <div class="row">
                
            <?php
            include('connection.php');
            $name = $_GET['name'];
            // $min = $_GET['min'];
            // $max = $_GET['max'];
              if($name == 'a')
              {
                $dbb = '';
              }

              else
              {
                $dbb = "where name like '%$name%' or category='$name'";
              }

            
            $sql = "select * from product   $dbb  order by id desc";
            $result11 = mysqli_query($con, $sql);

            if (mysqli_num_rows($result11)) {

            $i = 1;
            while ($rows11 = mysqli_fetch_assoc($result11)) {

            ?>
            <div class="col-sm-4">
                    <div class="product">
                        <div class="image-box">
                            <br>
                            <div class="images" style="background-position: center; background-repeat: no-repeat; background-size: cover;background-image: url('images/<?php echo $rows11['file'];?>');"></div>
                        </div>
                        <div class="text-box">
                            <h2 class="item"><?php echo $rows11['name'];?></h2>
                            <h3 class="price">$<?php echo $rows11['price'];?>.00</h3>
                            <p class="description"><?php echo $rows11['description'];?></p>
                            <label for="item-1-quantity">Category: <?php echo $rows11['category'];?></label>
                             <a href="details.php?product=<?PHP echo $rows11['id'];?>">
                                <center><br><button type="button" name="item-1-button" class="btn btn-primary">Add to Cart</button></center>
                            </a>
                        </div>
                    </div>
                </div>
              <?php $i++;}}?>

              
            </div>
        </div>
    </div>

    <!-- <footer> -->
    <?php include('footer.php'); ?>
</body>
</html>