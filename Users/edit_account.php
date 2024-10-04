<?php
    if(isset($_GET['edit_account'])){
        $user_session_name=$_SESSION['user_name'];
        $select_query="SELECT * FROM users WHERE user_name='$user_session_name'";
        $result_query=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['user_id'];
        $user_name=$row_fetch['user_name'];
        $user_full_name=$row_fetch['user_full_name'];
        $user_email=$row_fetch['user_email'];
        $user_phone=$row_fetch['user_phone'];
        $user_address=$row_fetch['user_address'];
        if(isset($_POST['user_update'])){
            $update_id=$user_id;
            $user_full_name=$_POST['user_full_name'];
            $user_email=$_POST['user_email'];
            $user_phone=$_POST['user_phone'];
            $user_address=$_POST['user_address'];

            // Update Query
            $update_date="UPDATE users SET user_full_name='$user_full_name',user_email='$user_email',user_phone='$user_phone',user_address='$user_address' WHERE user_id='$update_id'";
            $result_query_update=mysqli_query($con,$update_date);
            if($result_query_update){
                echo "<script>alert('Data updated succesfully')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .editpic {
            width:80px;
            height:80px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h3 class="text-center text-dark m-4">Edit Account</h3>
    <form action="" method='post' enctype='multipart/form-data' class='text-center'>
        <div class="form-outline mb-2">
            <h5 class='m-2 p-3'>Username - <span class='fw-bold'><?php echo $user_name ?></span></h5>
        <div class="form-outline mb-2">
            <p>Full Name</p>
            <input type="text" value="<?php echo $user_full_name ?>" class="form-control w-50 m-auto" name='user_full_name'>
        </div>
        <div class="form-outline mb-2">
            <p>Email</p>
            <input type="email" value="<?php echo $user_email ?>" class="form-control w-50 m-auto" name='user_email'>
        </div>
        <div class="form-outline mb-2">
            <p>Phone</p>
            <input type="text" value="<?php echo $user_phone ?>" class="form-control w-50 m-auto" name='user_phone'>
        </div>
        <div class="form-outline mb-2">
            <p>Address</p>
            <input type="text" value="<?php echo $user_address ?>" class="form-control w-50 m-auto" name='user_address'>
        </div>
        <input type="submit" value="Update" class="bg-warning p-3 rounded border-0 mb-2" name='user_update'>
    </form>
</body>
</html>