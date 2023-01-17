<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php include('navbar.php') ?>

<!-- Page content-->
<div class="container-fluid m-2">
    <small><b>/ ยืม-คืน เครื่องมือ</small></b>

    <form action="borrow_add_db.php" method="post">
        <div class="row" style="margin-right:0.5rem;">
            <div class="col-lg-5 col-12  mt-4">
                <div>
                    <label>รหัสนักเรียน / นักศึกษา</label>
                    <input type="text" id="input1" name="student_id" maxlength="12" class="form-control" required>
                </div>
                <div class="mt-2">
                    <label>รหัสเครื่องมือ / ถาดเครื่องมือ</label>
                    <input type="text" id="input2" name="code" minlength="6" maxlength="6" class="form-control"
                        required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i>
                    ยืมเครื่องมือ</button>
            </div>
        </div>
    </form>
    <script>
    function setFocusToTextBox() {
        var input1 = document.getElementById("input1")
        input1.focus();
    }
    setFocusToTextBox()
    </script>

    <div class="mt-5 mb-5" style="margin-right:1rem;">
        <?php 
            $timestamp = date('H.i');
            $sql = "SELECT borrow_id,concat(stu_fname,' ',stu_lname) AS fullname,student.student_id,dpr3,
            borrow.tools_code AS code,borrow_time_start,borrow_time_stop,subject_name,teacher_name FROM borrow 
            INNER JOIN student ON borrow.student_id = student.student_id 
            INNER JOIN studing ON borrow.student_group_id = studing.student_group_id 
            AND borrow.subject_id = studing.subject_id AND borrow.borrow_time = studing.dpr3
            WHERE borrow_status = 'ยืม' ORDER BY CAST($timestamp AS double) > CAST(borrow_time_stop AS double) DESC,borrow_id DESC";
            $result = mysqli_query($conn, $sql);
        ?>
        <table id="toolsTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>รหัสเครื่องมือ</th>
                    <th>ชื่อ-สกุล ผู้ยืม</th>
                    <th>เวลาส่งคืน</th>
                    <th style="text-align:center">#</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = mysqli_fetch_assoc($result)){
                    $code = $row['code']; 
                ?>
                <tr>
                    <td><?php echo $code ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['borrow_time_stop'] ?>
                        <span
                            style="color:red;"><?php if(doubleval($timestamp) > doubleval($row['borrow_time_stop'])){ echo"(เลยกำหนด)";}?>
                        </span>
                    </td>
                    <td style="text-align:center;">

                        <!-- Modal -->
                        <div class="modal fade" id="plusModal<?php echo $code; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
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
                                        <div class="mb-2"><b>วิชา:</b> <?php echo $row['subject_name']." (".$row['dpr3'].")"; ?></div>
                                        <div class="mb-2"><b>ครูประจำวิชา:</b> <?php echo $row['teacher_name']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#plusModal<?php echo $code; ?>">
                            <i class="fa-solid fa-plus"></i> รายละเอียด
                        </button>
                        <a href="borrow_edit_db.php?ID=<?php echo $row['borrow_id']; ?>"
                            class="btn btn-outline-success btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            คืนเครื่องมือ</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer.php') ?>