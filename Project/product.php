<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Product Details</title>
</head>

<!-- <script type="text/javascript"> 
        document.getElementById("1").setAttribute('value',<?php echo $record?>);
</script>  -->
<body>
    <?php
    session_start();
    if(!isset($_SESSION['admin_user']))
    {
        echo "
            <script>
            alert('Access Denied! Login First.....');
            window.location.href='https://project-shopping-with-recomend.herokuapp.com/Admin login.html';
            </script>";
    }
    ?>
<div class="header">
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
                    <button  class='btn1'><a href="https://project-shopping-with-recomend.herokuapp.com/admin logout.php">Logout</a></button>
                    </li>
                </ul>
            </nav>
            <a href="https://project-shopping-with-recomend.herokuapp.com/cart.php"><img src="http://project-shopping-with-recomend.herokuapp.com/images/cart.png" alt="cart" width="30px"></a>
        </div>
    </div>

    <div class="outer">
        <div class="contain">
            <h1>Enter Details of the Product</h1>
            <form action="https://project-shopping-with-recomend.herokuapp.com/product details.php" method="post" enctype="multipart/form-data">
            <b>Product_Id</b><br>
            <input type="text" name="product_Id" id="1" readonly><br><br><br>
            1.Enter Product Name <br>
            <input type="text" name="product_name" id="2" placeholder="product_name" required> <br><br><br>
            2.Enter Product Price <br>
            <input type="text" name="product_price" id="3" placeholder="product_price" required><br><br><br>
            3.Enter details of the Product <br>
            <textarea name="product_details" id="4" cols="30" rows="10" placeholder="product_details" required></textarea><br><br><br>
            4.Select the image of the Product <br>
            <input type="file" name="product_image" id="5"> <br><br><br>
            
            <?php
            include('login_cred.php');
            if(!$conn)
                die("Error in Connection : ".mysqli_connect_error());
            $record = mysqli_query($conn,"select max(Sno) from product_details");
            // $data = mysqli_fetch_array($record);
            while($data = mysqli_fetch_array($record))
            {
            ?>
            
            <script type="text/javascript"> 
                document.getElementById("1").setAttribute('value',<?php echo $data['max(Sno)']+1; ?>);
            </script>
            <?php } ?>
            <br>

            <input type="submit" name="submit" id="6" value="Submit"><br>
            </form>
        </div>
    </div>
</div>
</body>
</html>