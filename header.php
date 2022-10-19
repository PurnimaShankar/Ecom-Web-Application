<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['email'])) {
    include('connection.php');
    $logid = $_SESSION['email'];
    $result = mysqli_query($con, "SELECT count(*) as cart  from cart where status = '0' and email='$logid'");
    $booking = mysqli_fetch_assoc($result);
}

error_reporting(0);
ini_set('display_errors', 0);
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/javascript.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" style="width:250px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="margin-top: -25px;">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    include('connection.php');
                    $sql = "select * from product order by id desc";
                    $result11 = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result11)) {

                        $i = 1;
                        while ($rows11 = mysqli_fetch_assoc($result11)) {

                    ?>
                            <a class="dropdown-item" href="search.php?name=<?php echo $rows11['category'];?>"><?php echo $rows11['category'];?></a>
                    <?php $i++;
                        }
                    } ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> Cart <sup><?php echo $booking['cart']; ?></sup></a>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<a href="profile.php" class="nav-link">Profile</a>';
                } else { //if login in session is not set
                    echo '<a href="login-register.php" class="nav-link"><i class="fa fa-user"></i> User</a>';
                }
                ?>

            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="name">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>