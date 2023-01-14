<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php include('navbar.php') ?>

<!-- Page content-->
<div class="container-fluid m-2">
    <small><b>Home / เพิ่มเครื่องมือ</small></b>

    <form action="tool_add_db.php" method="post">
        <div class="row" style="margin-right:0.5rem;">
            <div class="col-lg-5 col-12  mt-4">
                <div>
                    <label>รหัสเครื่องมือ</label>
                    <input type="text" name="tools_code" minlength="6" maxlength="6" placeholder="A12345"
                        class="form-control" required>
                </div>
                <div class="mt-2">
                    <label>ชื่อครื่องมือ</label>
                    <input type="text" name="tools_name" placeholder="xxxxxx" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6 col-12  mt-4">
                <label>หมายเหตุ</label> <code>ใส่หรือไม่ใส่ก็ได้</code>
                <textarea class="form-control" name="tools_note" id="" cols="7" rows="4"></textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i>
                    เพิ่มเครื่องมือ</button>

                <div class="toast-container position-fixed position-relative top-0 end-0 p-3">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body" style="color:green;">
                            ทำรายการสำเร็จ
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    
                    // ถ้า url เป้น  http://localhost/index.html?ID=4
                    var strID = window.location.href;
                    // จะได้ strID  = http://localhost/index.html?ID=4
                    var arrID = strID.split("?");
                    // จะได้ arrID เป็น array มีค่า 
                    // arrID[0]="http://localhost/index.html";
                    // arrID[1]="ID=4";
                    var dataID = arrID[1].split("=");
                    // แบ่งอีกครั้งด้วย =  จะได้ 
                    // dataID[0]="ID";
                    // dataID[1]="4";
                    var message = dataID[1];
                    function resMes(essage){
                        if(message == 1){
                            const toastLiveExample = document.getElementById('liveToast')
                            const toast = new bootstrap.Toast(toastLiveExample)
                            toast.show()
                        }
                    }
                    resMes()
                </script>
            </div>
        </div>
    </form>
    <div class="mt-5 mb-5">
        <?php 
            $sql = "SELECT * FROM tools";
            $result = mysqli_query($conn, $sql);
        ?>
        <table id="toolsTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>รหัสเครื่องมือ</th>
                    <th>ชื่อครื่องมือ</th>
                    <th>หมายเหตุ</th>
                    <th style="text-align:center">แก้ไข / ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($result)){ 
                    $tools_code = $row['tools_code'];
                ?>
                <tr>
                    <td><?php echo $row['tools_code'] ?></td>
                    <td><?php echo $row['tools_name'] ?></td>
                    <td><code style="color: #9932CC;"><?php echo $row['tools_note'] ?></code></td>
                    <td style="text-align:center">
                        <a href="http://" class="btn btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#editTool<?php echo $row['tools_id'] ?>"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="editTool<?php echo $row['tools_id'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขเครื่องมือ
                                            <?php echo "$tools_code" ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="text-align:left;">
                                        <form action="tool_edit_db.php?code=<?php echo "$tools_code" ?>" method="post">
                                            <div class="mt-2">
                                                <label>ชื่อครื่องมือ</label>
                                                <input value="<?php echo $row['tools_name'] ?>" type="text"
                                                    name="tools_name" placeholder="xxxxxx" class="form-control"
                                                    required>
                                            </div>
                                            <div class="mt-2">
                                                <label>หมายเหตุ</label> <code>ใส่หรือไม่ใส่ก็ได้</code>
                                                <textarea value="<?php echo $row['tools_note'] ?>" class="form-control"
                                                    name="tools_note" id="" cols="7" rows="4"></textarea>
                                            </div>
                                            <div class="mt-3 d-flex flex-row-reverse">
                                                <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a <?php 
                    $sql2 = "SELECT * FROM tools_tray WHERE tools_code = '$tools_code'";
                    $result2 = mysqli_query($conn, $sql2);
                    if(mysqli_num_rows($result2) == 1){ ?> onclick="alertFunction()" <?php
                    }else{
                        ?> href="tool_del_db.php?code=<?php echo $row['tools_code'] ?>" <?php
                    } ?> class="btn btn-outline-danger"><i class="fa-solid fa-x"></i></a>
                        <script>
                        function alertFunction() {
                            if (confirm("มีอุปกรณ์นี้ในถาดเครื่องมือ คุณต้องการลบหรือไม่?")) {
                                window.location.href = "tool_del_db.php?code=<?php echo $row['tools_code'] ?>"
                            }
                        }
                        </script>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer.php') ?>