<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php include('navbar.php') ?>

<!-- Page content-->
<script>
setTimeout(location.reload.bind(location), 60000);
</script>
<div class="container-fluid m-2">
    <small><b>/ รายงาน ยืม-คืน</small></b>

    <div class="row mt-5" style="margin-right:0.5rem;">
        <?php 
            $timestamp = date('H.i');
            $sql = "SELECT borrow_id,concat(stu_fname,' ',stu_lname) AS fullname,student.student_id,
            borrow.tools_code AS code,borrow_time_start,borrow_time_stop,subject_name,teacher_name,dpr3 FROM borrow 
            INNER JOIN student ON borrow.student_id = student.student_id 
            INNER JOIN studing ON borrow.student_group_id = studing.student_group_id 
            AND borrow.subject_id = studing.subject_id AND borrow.borrow_time = studing.dpr3
            WHERE borrow_status = 'ยืม' ORDER BY CAST($timestamp AS double) > CAST(borrow_time_stop AS double) DESC,borrow_id DESC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                $code = $row['code']; 
        ?>
        <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex bd-highlight">
                        <div class="bd-highlight"><label>
                                <?php
                                $sql2 = "SELECT * FROM tools_tray WHERE tray_code = '$code'";
                                $result2 = mysqli_query($conn, $sql2);
                                $sql3 = "SELECT * FROM tools WHERE tools_code = '$code' AND tools_code NOT IN(SELECT tools_code FROM tools_tray WHERE tray_code = '$code')";
                                $result3 = mysqli_query($conn, $sql3);
                                if(mysqli_num_rows($result2) > 0){
                                    echo "ถาดเครื่องมือ: ".$code." <i class='fa-solid fa-toolbox'></i>";
                                }else if(mysqli_num_rows($result3) > 0){
                                    echo "เครื่องมือ: ".$code." <i class='fa-solid fa-wrench'></i>";
                                }else{
                                    echo "";
                                }
                                ?>
                            </label></div>
                        <!-- Modal -->
                        <div class="modal fade" id="plusModal<?php echo $code; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            <?php
                                            if(mysqli_num_rows($result2) > 0){
                                                echo "ถาดเครื่องมือ: ".$code." <i class='fa-solid fa-toolbox'></i>";
                                            }else if(mysqli_num_rows($result3) > 0){
                                                echo "เครื่องมือ: ".$code." <i class='fa-solid fa-wrench'></i>";
                                            }else{
                                                echo "";
                                            }?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>

                                    </div>
                                    <div class="modal-body" style="text-align:left;">
                                        <div class="mb-2">
                                            <?php
                                            if(mysqli_num_rows($result3) > 0){
                                                $row3 = mysqli_fetch_assoc($result3);
                                                echo "<b>ชื่อเครื่งมือ: </b>".$row3['tools_name'];
                                            }
                                        ?>
                                        </div>
                                        <div class="mb-2"><b>รหัสนักเรียน:</b> <?php echo $row['student_id'] ?></div>
                                        <div class="mb-2"><b>ชื่อ-สกุล:</b> <?php echo $row['fullname'] ?></div>
                                        <div class="mb-2"><b>วิชา:</b>
                                            <?php echo $row['subject_name']." (".$row['dpr3'].")"; ?></div>
                                        <div class="mb-2"><b>ครูประจำวิชา:</b> <?php echo $row['teacher_name']; ?></div>
                                        <div class="mt-3 mb-2">
                                            <a href="index_edit_db.php?ID=<?php echo $row['borrow_id']; ?>"
                                                class="btn btn-outline-success btn-sm"><i
                                                    class="fa-solid fa-arrow-rotate-left"></i>
                                                คืนเครื่องมือ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ms-auto bd-highlight"><a href="#" data-bs-toggle="modal"
                                data-bs-target="#plusModal<?php echo $code; ?>">
                                <i class="fa-solid fa-plus" style="bg-primary"></i></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label>ชื่อ-สกุล: <?php echo $row['fullname']; ?></label>
                    </div>
                    <div class="mb-2">
                        <label>เวลาส่งคืน: <span> <?php echo $row['borrow_time_stop']; ?></span>
                            <span style="color:red;">
                                <?php if(doubleval($timestamp) > doubleval($row['borrow_time_stop'])){
                                    echo"(เลยกำหนดคืน)";
                                }?>
                            </span></label>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include('footer.php') ?>