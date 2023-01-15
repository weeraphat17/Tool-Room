<?php
    // Create connection
    $conn = mysqli_connect("127.0.0.1","root","","tool-room");
    mysqli_set_charset($conn,"utf8");
    date_default_timezone_set('Asia/bangkok');
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
?>