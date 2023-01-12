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
            </div>
        </div>
    </form>
    <div class="mt-5">
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
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['tools_code'] ?></td>
                    <td><?php echo $row['tools_name'] ?></td>
                    <td><code style="color: #9932CC;"><?php echo $row['tools_note'] ?></code></td>
                    <td style="text-align:center">
                    <a href="http://" class="btn btn-outline-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="http://" class="btn btn-outline-danger"><i class="fa-solid fa-x"></i></a>
                    
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer.php') ?>