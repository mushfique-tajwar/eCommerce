<h3 class="text-center text-dark">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
    <?php
        $get_users="SELECT * FROM `users`";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<h2 class='text-center text-danger mt-5'>No users yet</h2>";
        }else{
        echo "<tr>
        <th>User ID</th>
        <th>User Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>User image</th>
        <th>Address</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-light text-dark'>";
            $number = 0;
            while($row_data=mysqli_fetch_assoc($result)){
                $user_id=$row_data['user_id'];
                $user_full_name=$row_data['user_full_name'];
                $user_name=$row_data['user_name'];
                $user_email=$row_data['user_email'];
                $user_phone=$row_data['user_phone'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_ip=$row_data['user_ip'];
                $number++;
                echo "  <tr>
                    <td>$user_id</td>
                    <td>$user_full_name</td>
                    <td>$user_name</td>
                    <td>$user_email</td>
                    <td>$user_phone</td>
                    <td><img src='../Users/Profile_pictures/$user_image' alt='$user_name' class='product_img'/></td>
                    <td>$user_address</td>
                    <td><a href=\"index.php?delete_user=$user_id\" class='text-dark'><i class='fa-solid fa-trash'></i></a></td></tr>";
            }
        }
    ?>
    </tbody>
</table>