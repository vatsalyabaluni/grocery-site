<?php
    session_start();
    include('login_cred.php');
    $name = $_POST['user'];
    $password = $_POST['password'];

    $records = mysqli_query($conn,"select * from users where user_id = '$name'");

    $num =mysqli_num_rows($records);

    if($num == 1)
    {
        echo "
            <script>
            alert('Username already exists');
            window.location.href='https://project-shopping-with-recomend.herokuapp.com/login.html';
            </script>
        ";
    }
    else{
        mysqli_query($conn,"insert into users(user_id,password) values ('$name','$password')");
        echo "
            <script>
            alert('User Added...Now Login');
            window.location.href='https://project-shopping-with-recomend.herokuapp.com/login.html';
            </script>";
    }

?>