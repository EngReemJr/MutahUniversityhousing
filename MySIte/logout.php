<?php
session_start();
session_destroy();

unset($_SESSION['userID']);

unset($_SESSION['role']);


     unset($_SESSION['name'] );
    unset( $_SESSION['gender'] );
          



header("location: index.php");
?>