<?php
    session_start();
    ob_start();
    if (isset($_SESSION['email'])){
        if($_SESSION['sub'] == false){
            header("Location: sign.php");
            exit;
        }
    }
    spl_autoload_register(function ($class_name){
        include "Files/" . $class_name . ".php" ;
    });

    include 'Files/head.php' ;

?>
<body onload="ajax()">
    <?php include 'Files/nav.php' ; ?>
    <div class="jumbotron chat_conversion">
        <form action="" method="post">
            <div id="messs">
                <!-- ul  here -->

            </div>
            <p><textarea name="textarea" name="message" id="message"> </textarea></p>
            <p><input class="btn btn-success btn-lg" name="submit" value="Send" onclick="ajax()"></p>
        </form>
    </div>

    <script type="text/javascript">
        function ajax() {
            var message  = document.getElementById("message").value;
            var email    = document.getElementById("user_email").innerHTML;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if(xhr.status== 200 && xhr.readyState == 4){
                    document.getElementById('messs').innerHTML = xhr.responseText ;
                }
            };
            xhr.open("GET", "ajax.php?email=" + email + "&message=" + message.trim(), true);
            xhr.send();
        }
        setInterval(function () {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if(xhr.status== 200 && xhr.readyState == 4){
                    document.getElementById('messs').innerHTML = xhr.responseText ;
                }
            };
            xhr.open("GET", "ajax.php", true);
            xhr.send();
        }, 1000);
    </script>
</body>
</html>