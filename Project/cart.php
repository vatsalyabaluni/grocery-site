<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>CART</title>
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
            <a href=""><img src="https://project-shopping-with-recomend.herokuapp.com/images/cart.png" alt="cart" width="30px"></a>
        </div>
    </div>


<!-- cart -->
    <div class="cart">
        <h1>My Cart</h1>
    </div>
    <div class="cart">
        <table class="GeneratedTable">
        <thead>
            <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sum =0;
            if(isset($_SESSION['cart']))
            {
                
                foreach($_SESSION['cart'] as $key => $value)
                {   
                    $total = $value['quantity'] * $value['price'] ;
                    $sum +=$total;
                    echo"
                    <tr>
                        <td>$value[name]</td>
                        <td>&#8377;$value[price]</td>
                        <td>$value[quantity]</td>
                        <td>&#8377;$total</td>
                        <td>
                        <form action='https://project-shopping-with-recomend.herokuapp.com/manage_cart.php' method='POST'>
                            <button class='btn1' name='Remove_item'>remove</button>
                            <input type='hidden' name='Item_Name' value='$value[name]'></input>
                        </form>
                        </td>
                    </tr>
                        "; 
                }
            }
            if(isset($_SESSION['deduce']))
            {   $sup = $sum;
                $sum -= $_SESSION['deduce'];
                if($sum<0)
                {
                    unset($_SESSION['deduce']);
                    $sum = $sup;
                }
            }
            ?>
            
        </tbody>
        </table>
        
    </div>

<!-- Recomended Products -->
    <?php
    if(isset($_SESSION['cart']))
    {
    $last = $_SESSION['count'];
    if($last >=0)
    {
    $product_id =  $_SESSION['cart'][$last]['code'];
    include('login_cred.php');
    if(!$conn)
        die("Error in Connection : ".mysqli_connect_error());
            
    ?>
    <div class="another-container">
        <div class="offer">
            <h2>Recomended Products</h2>
        </div>
        <?php
        
            $records = mysqli_query($conn,"SELECT * from product_details where product_id in (select product_id from product_category where category_id in (SELECT category_id from product_category where product_id=$product_id));");
            $count = 0;
            while($data = mysqli_fetch_array($records) and $count<4)
            {
                if($data['product_id']==$product_id)
                    continue;
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
        <?php $count +=1; } } }?>    
    </div>
    <div class="total_price">
            <h2 class="right">Total Sum is : &#8377;<?php echo $sum;?></h2><br><br>
            <form action="https://project-shopping-with-recomend.herokuapp.com/manage_cart.php" method="post">
                <h4>Have a Coupon?</h4>
                <input type="text" placeholder="coupon" name='coupon' required autocomplete="off">
                <input type="hidden" name='pricep' value="<?php echo $sum?>">
                <input type="submit" class="btn" name="submit1">
            </form>
            <button class='btn2'>Proceed For Payment</button>
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