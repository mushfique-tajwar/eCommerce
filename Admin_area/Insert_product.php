<?php
include('../Includes/connect.php');
if(isset($_POST['insert_prodcut'])){
    $Product_name=$_POST['Product_name'];
    $Product_description=$_POST['Product_description'];
    $Product_keyword=$_POST['Product_keyword'];
    $Product_categories=$_POST['Product_categories'];
    //accessing image
    $Product_image=$_FILES['Product_image']['name'];
    //accessing image temp name
    $Temp_image=$_FILES['Product_image']['tmp_name'];
    $Product_price=$_POST['Product_price'];
    $Product_status='true';
    //cheching empty condition
    if($Product_name=="" or $Product_description=="" or $Product_keyword=="" or $Product_categories=="" or $Product_image=="" or $Product_price==""){
        echo "<script>('Please fill the empty fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($Temp_image,"./Product_Images/$Product_image");
        //insert query
        $insert_product="INSERT INTO products (product_name,product_description,product_keyword,category_id,product_image,product_price,status) VALUES ('$Product_name','$Product_description','$Product_keyword','$Product_categories','$Product_image','$Product_price','$Product_status')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query)
        {
            echo "<script>('Product Insertion Success')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <!-- Navbar -->
        <div class="container-fluid p-0">
        <!-- Top -->
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="container-fluid">
                    <img src="../images/Logo.png" alt="" class="Logo">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link fw-bold">Go Back</a>
                            </li>
                        </ul>
                    </nav>
                </div>  
            </nav>
        </div>
    <div class="container mt-3">
        <h1 class="text-center m-5 p-3">Add a Product</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Name -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Product_name" class="form-label">Name</label>
                    <input type="text" name="Product_name" id="Product_name" class="form-control" placeholder="Enter Product Name" autocomplete="off" required="required">
                </div>
            <!-- Description -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Product_description" class="form-label">Description</label>
                    <input type="text" name="Product_description" id="Product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div>
            <!-- Keyword -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Product_keyword" class="form-label">Keyword</label>
                    <input type="text" name="Product_keyword" id="Product_keyword" class="form-control" placeholder="Enter Product keyword" autocomplete="off" required="required">
                </div>
            <!-- Categories -->
                <div class="form-outline mb-4 m-auto">
                <label for="Product_categories" class="form-label">Category</label>
                    <select name="Product_categories" class="form-select">
                        <option value="">Select a category</option>
                            <?php
                                $select_query="SELECT * FROM categories";
                                $result_query=mysqli_query($con,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $category_title=$row['category_name'];
                                    $category_id=$row['category_id'];
                                    echo "<option value='$category_id'>$category_title</option>";
                                }
                            ?>
                    </select>
                </div>
            <!-- Image -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Product_image" class="form-label">Picture</label>
                    <input type="file" name="Product_image" id="Product_image" class="form-control" required="required">
                </div>
            <!-- Price -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Product_price" class="form-label">Price</label>
                    <input type="text" name="Product_price" id="Product_price" class="form-control" placeholder="Enter Product price" autocomplete="off" required="required">
                </div>
            <!-- Insert -->
                <div class="form-outline mb-4 m-auto">
                    <input type="submit" name="insert_prodcut" class="btn btn-warning mb-3 p-3" value="Insert Product">
                </div>
        </form>
    </div>
</body>
</html>