<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "faculdade";

    $conn = new msqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Falhou");
    }
?>