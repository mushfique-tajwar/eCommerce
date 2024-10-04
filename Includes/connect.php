<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();}
    $con=mysqli_connect('localhost','root','','ecommerce');
    if(!$con){
        die(mysqlierror($con));
    }
?>