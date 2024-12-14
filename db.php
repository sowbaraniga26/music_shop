<?php

 // Enable error reporting
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'music_shop';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
?>