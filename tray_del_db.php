<?php

    include('connect.php');

    $tray_code = $_GET['code'];

    $sql = "DELETE FROM tray WHERE tray_code = '$tray_code'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:tray.php');
    }

?>