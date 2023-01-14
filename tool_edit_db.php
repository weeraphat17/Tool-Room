<?php 

    include('connect.php');

    $tools_code = $_GET['code'];
    $tools_name = $_POST['tools_name'];
    $tools_note = $_POST['tools_note'];

    $sql = "UPDATE tools SET tools_name = '$tools_name' , tools_note = '$tools_note' WHERE tools_code = '$tools_code'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:tool.php');
    }

?>