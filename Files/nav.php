<?php
    $email = $_SESSION['email'];
?>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="user_email"> <?php echo $email ?></a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="sign.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>