<?php
    include('login_cred.php');
    if(!$conn)
        die("Error in Connection : ".mysqli_connect_error());
        if(isset($_POST['submit_product']))
        {
        $product_id = $_POST['product_Id'];
        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        $sql = "INSERT INTO `product_category` (`product_id`, `product_type`, `category_id`) VALUES ('$product_id', '$category_name', '$category_id');";

        if($conn-> query($sql)==TRUE)
        {
            header("Location: https://project-shopping-with-recomend.herokuapp.com/Exit.html");
        }   
        else
        echo "Somethimg Went Wrong ".mysqli_error($conn);

        $conn->close();
        }

?>
