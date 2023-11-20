<?php
    $servername = "localhost: 3306";
    $username = "root";
    $password = "PUC@1234";
    $dbname = "PROJETO2";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error) {
        die("Falha: " . $conn -> connect_error);
    }
?>