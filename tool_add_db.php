<?php 

    include('connect.php');

    $tools_code = $_POST['tools_code'];
    $tools_name = $_POST['tools_name'];
    $tools_note = $_POST['tools_note'];

    $sql = "SELECT * FROM tools WHERE tools_code = '$tools_code'";
    $result = mysqli_query($conn, $sql);
    $sql2 = "SELECT * FROM tray WHERE tray_code = '$tools_code'";
    $result2 = mysqli_query($conn, $sql2);

    if(mysqli_num_rows($result) == 0 && mysqli_num_rows($result2) == 0){
        $sql = "INSERT INTO tools(tools_code,tools_name,tools_note) VALUE('$tools_code','$tools_name','$tools_note')";
        $result = mysqli_query($conn, $sql);

        if($result){
            header('location:tool.php');
        }
    }else{
        ?><script>
            alert("รหัสนี้ถูกใช้งานแล้ว")
            window.location.href = "tool.php"
        </script><?php
    }

?>