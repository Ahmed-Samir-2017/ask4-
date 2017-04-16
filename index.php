<?php
    if(isset($_SESSION['email'])) {
        if ($_SESSION['email'] != "") {
            header("Location: chat.php");
            exit;
        }
    }
    session_start();
    ob_start();
    $_SESSION['sub'] = false;
    if (isset($_POST['email'])){
        $_SESSION['email'] = $_POST['email'];
    }else {
        $_SESSION['email'] = "";
    }
    include 'Files/head.php' ;
    spl_autoload_register(function ($class_name){
        include "Files/" . $class_name . ".php";
    });
?>
<body>
</body>
    <?php include "Files/nav.php"; ?>
    <div class="container container-table">
        <div class="jumbotron">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password" autocomplete="off">
                </div>
                <input type="submit" class="btn btn-default" value="Submit">
            </form>
        </div>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $ob = new Database();
            $ob->insertRow("INSERT INTO users(name, email, password) VALUES (?,?,?)", [$_POST['username'],$_POST['email'],$_POST['password']]);
            if ($_SESSION['email'] != ""){
                $_SESSION['sub'] = true;
                header("Location: chat.php");
                exit;
            }
        }
    ?>
</body>
</html>