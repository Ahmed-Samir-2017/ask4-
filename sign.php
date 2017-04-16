<?php
    session_start();
    ob_start();
    if(isset($_SESSION['email'])) {
        if ($_SESSION['email'] != "") {
            header("Location: chat.php");
            exit;
        }
    }
    $_SESSION['sub'] = false ;
    if (isset($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }else {
        $_SESSION['email'] = "";
    }
    include 'Files/head.php' ;
    spl_autoload_register(function ($class_name){
        include 'Files/' . $class_name . ".php";
    });

?>

<body>

    <?php include "Files/nav.php"; ?>

    <div class="container container-table">
        <div class="jumbotron">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $db = new Database();
            $stmt = $db->getRow("SELECT * FROM users WHERE email = ? AND password =  ?", [$_POST['email'],$_POST['password']]);
            if ($stmt['id'] > 0){
                $_SESSION['sub'] = true ;
                header("Location: chat.php");
                exit;
            }
        }
    ?>
</body>
</html>