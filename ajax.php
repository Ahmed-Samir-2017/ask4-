<?php

    spl_autoload_register(function ($class_name){
        include 'Files/'.$class_name.".php";
    });

    $ob = new Database();
    if($_REQUEST['message'] != ""){
        $ob->insertRow("INSERT INTO message(reported, message) VALUES (?,?)", [$_REQUEST['email'], $_REQUEST['message']]);
    }
    $stmt = $ob->getRows("SELECT * FROM message");
    /*
    echo "<pre>";
    print_r($stmt);
    echo "</pre>";
    */

    echo "<ul >";
        foreach ($stmt as $value){
            echo "<li> <span class='user'>" . $value['reported'] ."</span> ". $value['message']. "</li>";
        }
    echo "</ul>";

?>