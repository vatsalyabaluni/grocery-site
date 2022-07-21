<?php
    
    include('login_cred.php');
    if(!$conn)
        die("Error in Connection : ".mysqli_connect_error());
    
    if(isset($_POST['submit']))
    {
        $product_id = $_POST['product_Id'];
        $product_details = $_POST['product_details'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_FILES['product_image']['name'];
        
        $target = "https://project-shopping-with-recomend.herokuapp.com/product_image/".basename($_FILES['product_image']['name']);
        session_start();
        $_SESSION['image'] = $target;
        $_SESSION['id'] = $product_id;
        if(move_uploaded_file($_FILES['product_image']['tmp_name'],$target))
        {
            echo "<br>Image moved<br>";
        }
        else
        echo "Image not moved";
        $sql = "INSERT INTO `product_details` (`product_id`, `product_name`, `product_price`, `product_details`, `product_image`) VALUES ('$product_id', '$product_name', '$product_price', '$product_details', '$target');";

        if($conn-> query($sql)==TRUE)
        {
            header("Location: https://project-shopping-with-recomend.herokuapp.com/product category.php");
        }
        else
        echo "Somethimg Went Wrong ".mysqli_error($conn);
    
        $conn->close();
    }
?>