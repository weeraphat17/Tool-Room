<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php include('navbar.php') ?>

<!-- Page content-->
<div class="container-fluid m-2">
    <small><b>Home / ยืม-คืน เครื่องมือ</small></b>

    <form action="borrow_add_db.php" method="post">
        <div class="row" style="margin-right:0.5rem;">
            <div class="col-lg-5 col-12  mt-4">
                <div>
                    <label>รหัสนักเรียน / นักศึกษา</label>
                    <input type="text" name="student_id" maxlength="11" class="form-control" required>
                </div>
                <div class="mt-2">
                    <label>รหัสเครื่องมือ / ถาดเครื่องมือ</label>
                    <input type="text" name="code" minlength="6" maxlength="6" class="form-control" required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i>
                    ยืมเครื่องมือ</button>
            </div>
        </div>
    </form>

    <div class="row mt-5" style="margin-right:0.5rem;">
        <?php 
            $sql = "SELECT * FROM borrow";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex bd-highlight">
                        <div class="bd-highlight"><label><b>ถาดเครื่องมือ:</b> A00001 <span
                                    style="color:red;">(เลยกำหนดคืน)</span></label></div>
                        <div class="ms-auto bd-highlight"><a href="#"><i class="fa-solid fa-plus"
                                    style="bg-primary"></i></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label><b>รหัสนักเรียน:</b> 65309010001</label>
                    </div>
                    <div class="mb-2">
                        <label><b>ชื่อ-สกุล:</b> ธีรเดช รอดพ้น</label>
                    </div>
                    <div class="mb-2">
                        <label><b>เวลายืม-คืน: </b><span> 8.30 - 13.30</span></label>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="ms-auto bd-highlight"><a href="" class="btn btn-outline-success btn-sm"><i
                                    class="fa-solid fa-arrow-rotate-left"></i> คืนอุปกรณ์</a></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include('footer.php') ?>