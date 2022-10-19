
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
    <?php
 include('connection.php');
  $gid = $_REQUEST['update'];
  $memm = mysqli_query($con, "select * from product where id='$gid'");
  $brow = mysqli_fetch_assoc($memm);

  if (isset($_POST['save'])) {

 	  $name=$_POST['name'];
 	  $description=$_POST['description'];
	  $price=$_POST['price'];
       $quantity=$_POST['quantity'];
       $category=$_POST['category'];
 
    $sql = "update product set name='$name',description='$description',price='$price',quantity='$quantity',category='$category' where id='$gid'";
    if (!$result = mysqli_query($con, $sql)) 
        {
            echo "<script>alert('Try Again..');</script>";
           
        } else {

            echo "<script>alert('Successfully Updated');</script>";
            echo '<script>window.location.href="admin.php"</script>';

         }
    
  }

  if (isset($_POST['saveimg'])) {
    $rand=(rand(111111,999999));
    $imgname = $rand.$_FILES['file']['name'];

    $sql = "update product set file='$imgname'  where id='$gid'";
    $result = mysqli_query($con, $sql);
     if (move_uploaded_file($_FILES['file']['tmp_name'], 'images/' .$imgname))

     if (!$result = mysqli_query($con, $sql)) 
     {
         echo "<script>alert('Try Again..');</script>";
        
     } else {

         echo "<script>alert('Successfully Updated');</script>";
         echo '<script>window.location.href="admin.php"</script>';

      }
  }
?>
 
 <!DOCTYPE html>
<html>
<title>Dasboard</title>
<body>
    <?php require_once('header.php'); ?>
      
      <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Update Infomation</h4>
                <form method="POST" enctype="multipart/form-data">
                 
                <br><lavel>Name:</lavel>
                <input value="<?php echo $brow['name'];?>" type="text" name="name" class="form-control" required>

                <br><lavel>Description:</lavel>
                <textarea type="text" name="description" class="form-control" required> <?php echo $brow['description'];?></textarea>

                <br><lavel>Price:</lavel>
                <input value="<?php echo $brow['price'];?>" type="text"  onkeypress="return validateNumber(event)" name="price" class="form-control" required>
 
                <br><lavel>Quantity:</lavel>
                <input value="<?php echo $brow['quantity'];?>" type="text" name="quantity" class="form-control" required>

                <br><lavel>Category:</lavel>
                <input value="<?php echo $brow['category'];?>" type="text" name="category" class="form-control" required>
                
                <br>
                <button class="btn btn-primary" type="submit" name="save">Update</button> 
                </form>
             </div>

              <div class="col-sm-4">
                <h4>Update Image</h4>
                <form method="POST" enctype="multipart/form-data">
                <br><lavel>Image:</lavel>
                <input type="file" name="file" accept="image/*" class="form-control" required>
                <br>
                <button class="btn btn-primary" type="submit" name="saveimg">Update</button> 
                </form>
             </div>


             <div class="col-sm-2">
                <img src="images/<?php echo $brow['file'];?>" style="height:40%;width:100%"> 
             </div>

       </div>
    </div>
     <?php require_once('footer.php'); ?>
   </body>

</html>
 
    <!-- <footer> -->
    <?php include('footer.php'); ?>
</body>

</html>