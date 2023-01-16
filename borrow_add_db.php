<?php 

    include('connect.php');

    $std_id = $_POST['student_id'];
    $code = $_POST['code'];
    $strtime = date('H.i');

    $date = date('D');
    $time = doubleval($strtime); 
    $dayThai = dateThai($date);
    function dateThai($thaiD){
        if($thaiD == 'Mon'){
            $date = 'จันทร์';
        }else if($thaiD == 'Tue'){
            $date = 'อังคาร';
        }else if($thaiD == 'Wed'){
            $date = 'พุธ';
        }else if($thaiD == 'Thu'){
            $date = 'พฤหัส';
        }else if($thaiD == 'Fri'){
            $date = 'ศุกร์';
        }else if($thaiD == 'Sat'){
            $date = 'เสาร์';
        }else if($thaiD == 'Sun'){
            $date = 'อาทิตย์';
        }
        return $date;
    }

    $sql = "SELECT student_id,concat(stu_fname,' ',stu_lname) AS fullname,subject_id,subject_name,dpr2,
    LEFT(dpr3,5) AS time_start,RIGHT(dpr3,5) AS time_stop
    FROM student INNER JOIN studing ON student.group_id = studing.student_group_id 
    WHERE student.student_id = '$std_id'
    AND dpr2 = '$dayThai' AND $time >= CAST(LEFT(dpr3,5) AS double) 
    AND $time <= CAST(RIGHT(dpr3,5) AS double) LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $sql = "SELECT * FROM tools_tray WHERE tray_code = '$code'";
        $result = mysqli_query($conn, $sql);
        $sql2 = "SELECT * FROM tools WHERE tools_code = '$code' AND tools_code NOT IN(SELECT tools_code FROM tools_tray)";
        $result2 = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0){
            $sql = "SELECT * FROM borrow WHERE tools_code = '$code' AND borrow_status = 'ยืม'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 0){
                $sql = "INSERT INTO borrow(student_id,tools_code,borrow_status) VALUE ('$std_id','$code','ยืม')";
                $result = mysqli_query($conn, $sql);

                ?><script>
                window.location.href = "borrow.php?message=1"
                </script><?php
            }else{
                ?><script>
                window.location.href = "borrow.php?message=3"
                </script><?php
            }
        }else{
            ?><script>
            window.location.href = "borrow.php?message=2"
            </script><?php
        }
    }else{
        ?><script>
        window.location.href = "borrow.php?message=2"
        </script><?php
    }

    //2 ไม่สามารถทำรายการได้
    //3 รหัสอุปกรณ์นี้ถูกยืมแล้ว
?>