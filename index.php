<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tool-Room Chontech</title>
    <link rel="icon" type="image/x-icon" href="assets/icon/chontech-icon.png">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font -->
    <link rel="preconnect" href="assets/font/Mali-Regular.ttf" crossorigin>
    <style>
    body {
        font-family: 'Mali', cursive;
    }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading bg-light"><b><i class="fa-solid fa-gear"></i> Tool-Room</b></div>
            <div class="list-group list-group-flush">
                <a class="nav-link list-group-item-action list-group-item-light p-3" href="#!">ยืม-คืน</a>
                <a href="index.php" class="nav-link list-group-item-action list-group-item-light p-3" href="#!">Add
                    tools</a>

                <a class="nav-link list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                <a class="nav-link list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                <a class="nav-link list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                <a class="nav-link list-group-item-action list-group-item-light p-3" href="#!">Status</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid m-2">
                <small><b>Home / </small></b>
                <h1 class="mt-4">Simple Sidebar</h1>
                <p>The starting state of the menu will appear collapsed on smaller screens, and will appear
                    non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                <p>
                    Make sure to keep all page content within the
                    <code>#page-content-wrapper</code>
                    . The top navbar is optional, and just for demonstration. Just create an element with the
                    <code>#sidebarToggle</code>
                    ID which will toggle the menu when clicked.
                </p>
            </div>
        </div>
    </div>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>