<?php 
    
    include('connect.php');

    $id = $_GET['ID'];
    
    $sql = "UPDATE borrow SET date_stop = CURRENT_TIMESTAMP ,borrow_status = 'คืน'  WHERE borrow_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        ?><script>
        window.location.href = "index.php"
        </script><?php
    }

?>