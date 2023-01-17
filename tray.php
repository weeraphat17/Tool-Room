<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php include('navbar.php') ?>

<!-- Page content-->

<div class="container-fluid m-2">
    <small><b>/ เพิ่มเครื่องมือประจำถาด</small></b>
    <div class="row" style="margin-right:0.5rem;">
        <div class="col-lg-3 col-12  mt-4">
            <form action="tray_add_db.php" method="post">
                <label>รหัสถาดเครื่องมือ</label>
                <input type="text" name="tray_code" minlength="6" maxlength="6" placeholder="A12345"
                    class="form-control" required>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i>
                        เพิ่มถาดเครื่องมือ</button>
                </div>
            </form>
        </div>
        <?php 
            $sql = "SELECT * FROM tray";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
        ?>
        <div class="col-lg-8 col-12 card  mt-4  bg-light" style="margin:auto;">
            <div class="row" style="text-align:center;">
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="col-lg-3 col-md-4 col-6 mt-3 mb-3">
                    <a href="tray.php?code=<?php echo $row['tray_code'] ?>" class="card nav-link text-dark">
                        <h5><?php echo $row['tray_code'] ?> <i class="fa-solid fa-toolbox"></i></h5>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php 
       
        if(@$_GET['code']){ 
            $get_code = $_GET['code'];
        ?>
    <div class="row mt-5" style="margin-right:0.5rem;">
        <div class="col-lg-10 col-12 card" style="margin:auto">
            <div class="row">
                <div class="col-lg-6 col-12" style="border-right: 1px solid #dfdfdf;padding-right: 0.3rem;">

                    <div class="mt-3 mb-3" style="font-size:14px;">
                        <?php  
                    $sql1 = "SELECT * FROM tools_tray INNER JOIN tools ON tools_tray.tools_code = tools.tools_code WHERE tray_code = '$get_code'";
                    $result1 = mysqli_query($conn, $sql1);
                    while($row1 = mysqli_fetch_assoc($result1)){
                ?>
                        <div>
                            <?php echo $row1['tools_code']; ?> <?php echo $row1['tools_name']; ?> <span
                                style="color: #9932CC;"><?php echo $row1['tools_note']; ?></span>
                                &nbsp&nbsp
                                <a href="tray_tool_del_db.php?tray=<?php echo $get_code."&tool=".$row1['tools_code'] ?>" style="color:#df5987;"><i class="fa-solid fa-x"></i></a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if(mysqli_num_rows($result1) > 0){ ?>
                    <code> <i class="fa-solid fa-x"></i></a> นำเครื่องมือออกจากถาดเครื่องมือ </code>
                    <?php } ?>
                </div>

                <div class="col-lg-6 col-12 mt-3">
                    <form action="tray_tool_add_db.php?code=<?php echo $get_code ?>" method="post" class="mb-3">
                        <h5>ถาดเครื่องมือ <?php echo $get_code ?> <i class="fa-solid fa-toolbox"></i></h5>
                        <label class="mt-1">เพิ่มเครื่องมือในถาดเครื่องมือ</label>
                        <input type="text" name="tools_code" minlength="6" maxlength="6" placeholder="A12345"
                            class="form-control" required>
                        <button type="submit" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-plus"></i>
                            เพิ่มเครื่องมือในถาด</button>
                        <?php if(mysqli_num_rows($result1) == 0){ ?>
                        <a href="tray_del_db.php?code=<?php echo $get_code ?>" class="btn btn-outline-danger mt-3"
                            style="margin-left:0.25rem;"><i class="fa-solid fa-x"></i> ลบถาดเครื่องมือ</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include('footer.php') ?>