<?php
    if(isset($_GET['delete_user'])){
        $delete_id = intval($_GET['delete_user']);
        $delete_user = "DELETE FROM users WHERE user_id = $delete_id";
        $result_user = mysqli_query($con, $delete_user);
        if($result_user){
            echo "<script>alert('Deletion successful')</script>";
            echo "<script>window.open('index.php?all_users.php','_self')</script>";
        }
    }
?>