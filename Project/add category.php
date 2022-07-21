<?php
include('login_cred.php');
if(!$conn)
    die("Error in Connection : ".mysqli_connect_error());
    
    if(isset($_POST['submit']))
    {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_image = $_FILES['category_image']['name'];
    $target = "https://project-shopping-with-recomend.herokuapp.com/category image/".basename($_FILES['category_image']['name']);
    if(move_uploaded_file($_FILES['category_image']['tmp_name'],$target))
    {
        echo "<br>Image moved<br>";
    }
    else
    echo "Image not moved";
    $sql = "INSERT INTO `category` (`category_id`, `category_name`,`category_image`) VALUES ('$category_id', '$category_name','$target');";
    if($conn-> query($sql)==TRUE)
        {
            header("Location: https://project-shopping-with-recomend.herokuapp.com/product category.php");
        }
        else
        echo "Somethimg Went Wrong ".mysqli_error($conn);

        $conn->close();
    }
    else    
    echo "something went wrong";
?>
