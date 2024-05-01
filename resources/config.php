<?php
    $host = "localhost";
    $dbname = "steam";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($host, $user, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully";
    }

    return $conn;

