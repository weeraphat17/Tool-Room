<?php 

    include('connect.php');

    $tray_code = $_GET['tray'];
    $tool_code = $_GET['tool'];

    $sql = "DELETE FROM tools_tray WHERE tray_code = '$tray_code' AND tools_code = '$tool_code'";
    $result = mysqli_query($conn, $sql);
    if($result){
        ?><script>
            window.location.href = "tray.php?code=<?php echo $tray_code ?>"
        </script><?php
    }

?>