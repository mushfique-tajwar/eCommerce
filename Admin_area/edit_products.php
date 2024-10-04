<?php
  if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="SELECT * FROM products WHERE product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_name'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];
    $select_category="select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_name=$row_category['category_name'];
  }
?>

<div class="container mt-5">
  <h1 class="text-center">Editing Product</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outine w-50 m-auto mb-4">
      <label for="product_title" class="form-label">Product Title</label>
      <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">
    </div>
    <div class="form-outine w-50 m-auto mb-4">
      <label for="product_desc" class="form-label">Product Description</label>
      <input type="text" id="product_desc" value="<?php echo $product_description ?>" name="product_desc" class="form-control" required="required">
    </div>
    <div class="form-outine w-50 m-auto mb-4">
      <label for="product_keywords" class="form-label">Product Keywords</label>
      <input type="text" id="product_keywords" value="<?php echo $product_keyword ?>" name="product_keywords" class="form-control" required="required">
    </div>
    <div class="form-outine w-50 m-auto mb-4">
    <label for="product_category" class="form-label">Product Categories</label> 
      <select name="product_category" class="form-select">
        <option value="<?php echo $category_name?>"><?php echo $category_name?></option>
        <?php
          $select_category_all="SELECT * FROM categories";
          $result_category_all=mysqli_query($con,$select_category_all);
          while($row_category_all=mysqli_fetch_assoc($result_category_all)){
            $category_name=$row_category_all['category_name'];
            $category_id=$row_category_all['category_id'];
            echo " <option value='$category_id'>$category_name</option>";
          }; 
        ?>
      </select>
    </div>
    <div class="form-outine w-50 m-auto mb-4">
      <label for="product_price" class="form-label">Product Price</label>
      <input type="text" id="product_price" name="product_price" value="<?php echo $product_price ?>" class="form-control text-start" required="required">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_image" class="form-label">Product Image</label>
      <div class="d-flex">
      <input type="file" id="product_image" name="product_image" class="form-control w-90 m-auto" required="required">
      <img src="./product_images/<?php echo $product_image?>" alt="" class="product_img" required="required">
    </div>
    <div class="text-center">
      <input type="submit" name="edit_product" value="Update product" class="btn btn-warning px-3 mb-3">
    </div>
  </form>
</div>
<?php
  if(isset($_POST['edit_product'])){
    $product_name=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_image=$_FILES['product_image']['name'];

    $temp_image=$_FILES['product_image']['tmp_name'];

    if($product_name=="" or $product_desc=="" or $product_keywords=="" or $product_category=="" or $product_price=="" or $product_image==""){
      echo "<script>alert('Fill the boxees and then continue')</script>";
    }else{
      move_uploaded_file($temp_image,"./product_images/$product_image");

      $update_product="UPDATE `products` SET product_name='$product_name',
      product_description='$product_desc', product_keyword= '$product_keyword',
      category_id='$product_category', product_image='$product_image', product_price='$product_price' 
      WHERE product_id=$edit_id";
      
      $result_update=mysqli_query($con,$update_product);
      if($result_update){
        echo "<script>alert('Update successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }

    }
  }
?>