<?php 

    include('connect.php');

    $tray_code = $_GET['code'];
    $tools_code = $_POST['tools_code'];

    $sql = "SELECT * FROM tools WHERE tools_code = '$tools_code'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $sql = "SELECT * FROM tools_tray WHERE tools_code = '$tools_code'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO tools_tray(tray_code,tools_code) VALUE('$tray_code','$tools_code')";
            $result = mysqli_query($conn, $sql);

            if($result){
                ?><script>
                window.location.href = "tray.php?code=<?php echo $tray_code ?>"
                </script><?php
            }
        }else{
            ?><script>
            alert("มีรหัสเครื่องมือนี้ในถาดเครื่องมือแล้ว")
            window.location.href = "tray.php?code=<?php echo $tray_code ?>"
        </script><?php
        }
    }else{
        ?><script>
            alert("ไม่มีรหัสเครื่องมือนี้ในระบบ")
            window.location.href = "tray.php?code=<?php echo $tray_code ?>"
        </script><?php
    } 

?>