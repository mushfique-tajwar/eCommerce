<?php
    include('../Includes/connect.php');
    if(isset($_POST["Insert_cat"])){
        $category_name=$_POST["Cat_name"];
        $select_query="SELECT * FROM categories WHERE category_name='$category_name'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('Category already present!')</script>";
        }
        else{
            $insert_query="INSERT INTO categories (category_name) VALUES ('$category_name')";
            $result=mysqli_query($con,$insert_query);
            if($result){
                echo "<script>alert('Category has been inserted succesfully')</script>";
            }
        }  
    }
?>

<h2 class="text-center m-4">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-warning" id="addon-wrapping"><i class="fa-solid fa-recceipt"></i></span>
        <input type="text" class="form-control" name="Cat_name" placeholder="Insert Categories" aria-label="Insert Categories" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group w-10 mb-2 mt-4 m-auto">
        <input type="submit" class="btn btn-warning mb-3 p-3" name="Insert_cat" Value="Add" placeholder="Insert Categories" aria-label="Insert Categories" aria-describedby="addon-wrapping">
    </div>
</form>