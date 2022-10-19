<?php
include('connection.php');
$id= $_GET['product'];
$sql = "select * from product where id = '$id' order by id desc";
$result11 = mysqli_query($con, $sql);
$rows = mysqli_fetch_assoc($result11);

session_start();
if (isset($_SESSION['email'])) {
    include('connection.php');
    $logid = $_SESSION['email'];
    
} 

if (isset($_POST['save']))
 {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $price = $_POST['price'];
	 $description = $_POST['description'];
	 $image = $_POST['image'];
	 $quantity = $_POST['quantity'];
 
	 $result=mysqli_query($con,"SELECT count(*) as cart  from cart where status = '0' and name = '$name' and email='$email'");
	 $booking=mysqli_fetch_assoc($result);
     $item = $booking['cart']+1;
     if($item>1)
	 {
		echo "<script>alert('Already Added');</script>";
	 }

	 else{
 
         $sql = "insert into cart (name,email,price,description,image,quantity)
         values('$name','$email','$price','$description','$image','$quantity')";
 
        if (!$result = mysqli_query($con, $sql)) 
        
        {
            echo "<script>alert('Try Again..');</script>";
        } 
        
        else
         {
            echo "<script>alert('Successfully Added');</script>";
         }
}}
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
    <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"><div class="pd-wrap">
		<div class="container">
	        <div class="heading-section">
	            <h2>Product Details</h2>
	        </div>
	        <div class="row">
	        	<div class="col-md-6">
	        		<div id="slider" class="">
						<div class="item">
						  	<img style="width:100%;border-radius:5px" src="images/<?php echo $rows['file'];?>" />
						</div>
						 
					</div>
					
	        	</div>
	        	<div class="col-md-6">
	        		<div class="product-dtl">
        				<div class="product-info">
		        			<div class="product-name"><?php echo $rows['name'];?></div>
		        			<div class="reviews-counter">
								<div class="rate">
								    <input type="radio" id="star5" name="rate" value="5" checked />
								    <label for="star5" title="text">5 stars</label>
								    <input type="radio" id="star4" name="rate" value="4" checked />
								    <label for="star4" title="text">4 stars</label>
								    <input type="radio" id="star3" name="rate" value="3" checked />
								    <label for="star3" title="text">3 stars</label>
								    <input type="radio" id="star2" name="rate" value="2" />
								    <label for="star2" title="text">2 stars</label>
								    <input type="radio" id="star1" name="rate" value="1" />
								    <label for="star1" title="text">1 star</label>
								  </div>
								<span>3 Reviews</span>
							</div>
		        			<div class="product-price-discount"><span>$<?php echo $rows['price'];?>.00/-</span>
							<!-- <span class="line-through">$29.00</span> -->
						</div>
		        		</div>
	        			<p><?php echo $rows['description'];?></p>
	        			<div class="row">
	        			 
	        				<div class="col-md-6">
	        					<label for="color">Quantity</label>
								<form method="POST">
								<input type="hidden" name="name" value="<?php echo $rows['name'];?>">
								<input type="hidden" name="price" value="<?php echo $rows['price'];?>">
								<input type="hidden" name="description" value="<?php echo $rows['description'];?>">
								<input type="hidden" name="image" value="<?php echo $rows['file'];?>">
								<input type="hidden" name="email" value="<?php echo $logid;?>">
								<input type="number" min="1" value="1" id="color" name="quantity" class="form-control">
						    </div>
                            
                            <div class="col-md-6">
                               <?php
								if(isset($_SESSION['email']))
								{ 
								echo '<br><button class="btn btn-primary" type="submit" name="save" >Add to cart</button></form>';
								}
                                 
								else
								{ //if login in session is not set
								echo '<a href="login-register.php" class="btn btn-primary">Add to cart</a>';
								}
                                 ?>
                           
                            </div>
	        			</div>
	        			 
	        		</div>
	        	</div>
	        </div>
	        <div class="product-info-tabs">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
					  <?php echo $rows['description'];?>				  	</div>
				  	<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				  		<div class="review-heading">REVIEWS</div>
				  		<p class="mb-20">There are no reviews yet.</p>
				  		<form class="review-form">
		        			<div class="form-group">
			        			<label>Your rating</label>
			        			<div class="reviews-counter">
									<div class="rate">
									    <input type="radio" id="star5" name="rate" value="5" />
									    <label for="star5" title="text">5 stars</label>
									    <input type="radio" id="star4" name="rate" value="4" />
									    <label for="star4" title="text">4 stars</label>
									    <input type="radio" id="star3" name="rate" value="3" />
									    <label for="star3" title="text">3 stars</label>
									    <input type="radio" id="star2" name="rate" value="2" />
									    <label for="star2" title="text">2 stars</label>
									    <input type="radio" id="star1" name="rate" value="1" />
									    <label for="star1" title="text">1 star</label>
									</div>
								</div>
							</div>
		        			<div class="form-group">
			        			<label>Your message</label>
			        			<textarea class="form-control" rows="10"></textarea>
			        		</div>
			        		<div class="row">
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Name*">
					        		</div>
					        	</div>
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Email Id*">
					        		</div>
					        	</div>
					        </div>
					        <button class="round-black-btn">Submit Review</button>
			        	</form>
				  	</div>
				</div>
			</div>
			
 		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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