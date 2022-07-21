<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;0,900;1,500&display=swap" rel="stylesheet">
    <title>All Products-Grocery Bag</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="https://project-shopping-with-recomend.herokuapp.com/images/logo.png" alt="logo" width="100px">
            </div>
            <nav>
                <ul>
                    <li><a href="https://project-shopping-with-recomend.herokuapp.com/index.php">Home</a></li>
                    <li><a href="https://project-shopping-with-recomend.herokuapp.com/all_product.php">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li>
                    <button  class='btn1'><a href="https://project-shopping-with-recomend.herokuapp.com/logout.php">Logout</a></button>
                    </li>
                </ul>
            </nav>
            <a href="https://project-shopping-with-recomend.herokuapp.com/cart.php"><img src="https://project-shopping-with-recomend.herokuapp.com/images/cart.png" alt="cart" width="30px"></a>
        </div>
    </div>


<!-- Featured categories -->
<div class="deals">
    <div>
        <h2 class="h">Best Deals In </h2>
    </div>
    
    <div class="small-container">
        <?php
        include('login_cred.php');
        if(!$conn)
            echo "Not connected";
        $records = mysqli_query($conn,"select * from category");
        $count = 0;
        while($data = mysqli_fetch_array($records) and $count<3)
        {
        ?>
        <div class="images">
            <!-- <a href=""><img src="<?php //echo $data['category_image'];?>" alt="image"></a> -->
            <form action="https://project-shopping-with-recomend.herokuapp.com/category_feed.php" method="post">
            <input type="hidden" value="<?php echo $data['category_id'] ?>" name ="product_id">
            <input type="image" src="<?php echo $data['category_image'];?>" alt="submit" width='250px'>
            </form>
        <div>
        <br>
        <figcaption class="caption"><?php echo $data['category_name']; ?></figcaption>
    </div>
</div>
<?php
$count+=1;
}
?>
</div>
</div>

 


<!-- products -->
<div class="another-container">
    <div class="offer">
        <h2>Products</h2>
    </div>
    <?php
    
        $records = mysqli_query($conn,"select * from product_details");
        $count = 0;
        while($data = mysqli_fetch_array($records) and $count<100)
        {
    ?>
    <div class="row">
        <div class="col-4">
            <!-- <a href="http://localhost/project/product_det.php"> <img src="<?php //echo $data['product_image'];?>"  alt="image"></a> -->
            <form action="https://project-shopping-with-recomend.herokuapp.com/product_det.php" method="post">
            <input type="hidden" value="<?php echo $data['product_id'] ?>" name ="product_id">
            <input type="image" src="<?php echo $data['product_image'];?>" alt="submit" width="250">
            </form>
            <figcaption class="name"><?php echo $data['product_name'];?></figcaption>
            <figcaption class="price"><p> &#8377;<?php echo $data['product_price'];?></p></figcaption>
        </div>
    </div>
    <?php $count +=1; } ?>    
</div>





<!-- Footer Section -->


<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>It is availabe in Play Store/App store</p>
            </div>
            <div class="footer-col-2">
                <img src="https://project-shopping-with-recomend.herokuapp.com/images/logo.png" alt="image">
                <p>Our Purpose is to deliver the best deals in groceries quickly</p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>About Us</li>
                    <li>Track Shipment</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>