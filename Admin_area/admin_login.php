<?php
    include('../Includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }
    </style>        
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../Images/adminreg.jpg" alt="Admin Login" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username"
                        placeholder="Enter your username" required="required" 
                        class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                        placeholder="Enter your password" required="required" 
                        class="form-control">
                    </div>

                    <!-- PHP for login functionality -->
                    <?php
                    if (isset($_POST['admin_Login'])) {
                        $adminname = $_POST['username'];
                        $admin_password = $_POST['password'];

                        // Debug: Display the query to check for syntax issues
                        $select_query = "SELECT * FROM admin WHERE admin_username='$adminname'";
                        $result = mysqli_query($con, $select_query);

                        // Check for query errors
                        if (!$result) {
                            // If the query fails, print the error message
                            die("Query failed: " . mysqli_error($con));
                        }

                        // Continue only if the query succeeded
                        $row_count = mysqli_num_rows($result);

                        if ($row_count > 0) {
                            $row_data = mysqli_fetch_assoc($result);

                            // Verify the password using password_verify
                            if ($admin_password === $row_data['admin_password']) {
                                $_SESSION['admin_username'] = $adminname;
                                echo "<script>alert('Successfully Logged In')</script>";
                                header("Location: index.php");
                            } else {
                                echo "<div class='text-danger fw-bold text-center'>
                                    <p>Invalid Credentials</p>
                                </div>";
                            }
                        } else {
                            echo "<div class='text-danger fw-bold text-center'>
                                <p>Invalid Credentials</p>
                            </div>";
                        }
                    }
                    ?>

                    <div>
                        <input type="submit" class="bg-warning fw-bold p-3 border-0 rounded"
                        name="admin_Login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
