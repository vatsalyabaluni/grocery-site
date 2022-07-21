<?php
    session_start();
    include('login_cred.php');
    

    $name = $_POST['user'];
    $password = $_POST['password'];

    $records = mysqli_query($conn,"select * from users where user_id = '$name' && password = '$password'");

    $num =mysqli_num_rows($records);

    if($num == 1)
    {   
        $_SESSION['user'] = $name;
        header('location: https://project-shopping-with-recomend.herokuapp.com/index.php');
    }
    else{
        echo "
            <script>
            alert('Wrong Username or Password');
            window.location.href='https://project-shopping-with-recomend.herokuapp.com/login.html';
            </script>";
    }

?>