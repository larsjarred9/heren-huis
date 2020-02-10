<?php
    $user = '84644';
    $pass = '#1Geheim';
    $db = 'UNIVERSE_84644';
    $host = '127.0.0.1:3306';

    $conn = new mysqli($host, $user, $pass, $db) or die("Unable to connect");
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>