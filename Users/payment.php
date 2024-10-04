<?php
    include('../Includes/connect.php');
    include('../Functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if(isset($_SESSION['user_id'])){
                $user_id=$_SESSION['user_id'];}
        ?>
        <div class="container p-0">
            <h2 class="text-center bg-warning text-dark p-3">Payment Options</h2>
            <div class="row p-5">
                <a href="order.php?user_id=<?php echo $user_id?>">
                    <h2 class='text-center'>Click here to proceed to orders page to pay</h2>
                </a>
            </div>
        </div>
    </body>
</html>