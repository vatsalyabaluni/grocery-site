<?php
    session_start();
    include('login_cred.php');

    $name = $_POST['user'];
    $password = $_POST['password'];

    $records = mysqli_query($conn,"select * from admin where admin_id = '$name' && password = '$password'");

    $num =mysqli_num_rows($records);

    if($num == 1)
    {   
        $_SESSION['admin_user'] = $name;
        header('location: https://project-shopping-with-recomend.herokuapp.com/product.php');
    }
    else{
        echo "
            <script>
            alert('Wrong Username or Password');
            window.location.href='https://project-shopping-with-recomend.herokuapp.com/admin login.html';
            </script>";
    }

?>