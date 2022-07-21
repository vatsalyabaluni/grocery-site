<?php
    session_start();
    session_destroy();

    header('location:https://project-shopping-with-recomend.herokuapp.com/login.html');
?>