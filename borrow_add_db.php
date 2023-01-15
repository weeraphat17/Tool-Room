<?php 

    include('connect.php');

    $std_id = $_POST['student_id'];
    $code = $_POST['code'];
    $strtime = date('H.i');

    $date = date('D');
    echo $time = floatval($strtime); 
    echo dateThai($date);
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

    $sql = "SELECT student_id,concat(stu_fname,' ',stu_lname) AS fullname,subject_id,subject_name,dpr2,dpr3
    FROM student INNER JOIN studing ON student.group_id = studing.student_group_id 
    WHERE student.student_id = '65201020104' 
    AND dpr2 = 'จันทร์' 
    AND 8.33 >= CAST(LEFT(dpr3,5) AS INT) 
    AND 8.33 <= CAST(RIGHT(dpr3,5) AS INT)";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        print_r($row);
    }

?>