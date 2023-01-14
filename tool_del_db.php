<?php 

    include('connect.php');

    $tools_code = $_GET['code'];
    
    $sql = "DELETE FROM tools WHERE tools_code = '$tools_code'";
    $result = mysqli_query($conn, $sql);

    $sql2 = "DELETE FROM tools_tray WHERE tools_code = '$tools_code2'";
    $result2 = mysqli_query($conn, $sql2);

    if($result){
        header('location:tool.php?message=1');
    }

?>