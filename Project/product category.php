
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Product Category</title>
</head>
<body>
    <?php 
    session_start();
    $y = $_SESSION['image'];
    $x = $_SESSION['id'];
    ?>
    <img src="<?php echo $y?>" >
    <br>
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
                    <button  class='btn1'><a href="https://project-shopping-with-recomend.herokuapp.com/logout.php">Logout</a></button>
                    </li>
                </ul>
            </nav>
            <a href="https://project-shopping-with-recomend.herokuapp.com/cart.php"><img src="images/cart.png" alt="cart" width="30px"></a>
        </div>
    </div>
    <div class="outer">
      <div class="contain">
      <form action="https://project-shopping-with-recomend.herokuapp.com/finally add.php" method="post" enctype="multipart/form-data">
      <h4>Product_Id</h4>
        <input type="text" name="product_Id" id="01" placeholder="product_Id" readonly><br>
        <script type="text/javascript"> 
            document.getElementById("01").setAttribute('value',<?php echo $x?>);
        </script>
        <br>
       <h4>Enter the Product Category If present in the Category Table. </h4> 
        <input type="text" name="category_name" id="02" placeholder="category"><br><br><br>
        <h4>Enter the category-ID mentioned in the table against category. </h4>
        <input type="text" name="category_id" id="04" placeholder="ID"> <br>
        <br>
        <input type="submit" name="submit_product" id="05">
    </form>
    <br> <br> <br>
      <form action="https://project-shopping-with-recomend.herokuapp.com/add .php">
          <h2>Not able to find the category? Add the category</h2> <br>
          <input type="submit" name="submit" id="03" value="ADD">
      </form>
      <br><br>
    <h2><b>Categories Available in Database</b></h2> <br>
      <table class='GeneratedTable'>
      <thead>
            <tr>
            <td>Category_Id</td>
            <td>Category_Name</td>
            </tr>
        </thead>
    <?php
      include('login_cred.php');
      if(!$conn)
          die("Error in Connection : ".mysqli_connect_error());
      $sql = "SELECT * FROM category";
      $records = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($records))
      {
    ?>
    <tr>
      <td><?php echo $data['category_id']; ?></td>
      <td><?php echo $data['category_name']; ?></td>
    </tr>
    <?php
      }
      ?>
    </div>
  </div>
  </div>  
    
</body>
</html>