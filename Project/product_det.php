<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
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
            <a href="https://project-shopping-with-recomend.herokuapp.com/cart.php"><img src="http://project-shopping-with-recomend.herokuapp.com/images/cart.png" alt="cart" width="30px"></a>
        </div>
    </div>

    <!-- Product -->

    <?php 
    include('login_cred.php');
    if(!$conn)
        die("Error in Connection : ".mysqli_connect_error());
    
        $product_id = $_POST['product_id'];
        $records = mysqli_query($conn,"select * from product_details where product_id =$product_id");
        $count = 0;
        
        while($data = mysqli_fetch_array($records) and $count<100)
        {
    ?>
    <div class="project">
        <div class="details">
            <img src="<?php echo $data['product_image'];?>" alt="image" width="400">
        </div>
        <div class="details">
            <h1 class ="a"><b><?php echo $data['product_name'];?></b></h1>
            <p class="b"><b> &#8377;<?php echo $data['product_price'];?></b></p>
            <p class="c"><?php echo $data['product_details'];?></p>
            <!-- <a href="http://localhost/project/all_product.php" class="btn">Add to Cart</a> -->
            <form action="https://project-shopping-with-recomend.herokuapp.com/manage_cart.php" method="post">
                <input type="number" name ="quantity"  value="1" class="d" min=1>
                <input type="hidden" value="<?php echo $data['product_id'] ?>" name ="product_id">
                <input type="submit" value="Add to Cart" class="btn" name="submit">
            </form>
        </div>
    </div>
    <?php
    $count++;
        }
    
    ?>
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