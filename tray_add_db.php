<?php 

    include('connect.php');

    $tray_code = $_POST['tray_code'];
    $sql = "SELECT * FROM tray WHERE tray_code = '$tray_code'";
    $result = mysqli_query($conn, $sql);
    $sql2 = "SELECT * FROM tools WHERE tools_code = '$tray_code'";
    $result2 = mysqli_query($conn, $sql2);

    if(mysqli_num_rows($result) == 0 && mysqli_num_rows($result2) == 0){

        $sql = "INSERT INTO tray(tray_code) VALUE ('$tray_code')";
        $result = mysqli_query($conn, $sql);

        if($result){
        ?><script>
            window.location.href = "tray.php?code=<?php echo $tray_code ?>"
        </script><?php
        }
    }else{ 
        ?><script>
            alert("รหัสนี้ถูกใช้งานแล้ว")
            window.location.href = "tray.php"
        </script><?php
    }

?>