<nav class="navbar navbar-expand-lg bg-secondary">
    <ul class="navbar-nav me-auto">
        <?php
            if(!isset($_SESSION['user_name'])){
                echo "<li class='nav-item'><a class='nav-link text-light fw-bold' href='./users/user_login.php'>Welcome Guest</a></li>";
            }
            else{ echo
                "<li class='nav-item'><a class='nav-link text-light fw-bold'>Welcome <span class='fw-bold'>".$_SESSION['user_name']."</span></a></li>";
            }
            if(!isset($_SESSION['user_name'])){
                echo "<li class='nav-item'><a class='nav-link text-light fw-bold' href='./users/user_login.php'>Login</a></li>";
            }
            else{ echo
                "<li class='nav-item'><a class='nav-link text-light fw-bold' href='users/user_logout.php'>Logout</a></li>";
            }
        ?>
    </ul>
</nav>