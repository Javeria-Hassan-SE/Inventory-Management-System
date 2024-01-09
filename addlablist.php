<?php include "database/db.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $module = $_POST['module'];
    $floor = $_POST['floor'];
    $type = $_POST['type'];
    $capacity = $_POST['capacity'];
    $lab_name=$_POST['lab_name'];

    $added_on = date('d-m-y');
    $added_by = 1;
    $module_code="";
    if($module=="Module 01"){
        $module_code='MD01';
    }else if($module=="Module 02"){
        $module_code='MD02';
    }else if($module=="Module 03"){
        $module_code='MD03';
    }else if($module=="Module 04"){
        $module_code='MD04';
    }
    

    $insertQuery = "INSERT INTO `labs`(`module_code`,`module_name`, `floor`, `lab_type`, `lab_name`,
     `capacity`, `added_by`, `added_on`)
     VALUES ('{$module_code}','{$module}','{$floor}','{$type}','{$lab_name}','{$capacity}',
     '{$added_by}','{$added_on}')";

    $query = mysqli_query($connection, $insertQuery);
    if ($query) {
        header("Location: lablist.php");
    } else {
        die("Failed to add lab at the moment" . mysqli_error($connection));
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>RIET- Lab List</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-hunar.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">


        <?php
        include("header.php");
        include("sidebar.php");
        ?>




        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Labs Management</h4>
                        <h6>Add/Update Labs</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Module Name</label>
                                    <select class="select" name="module">
                                        <option value="">Select</option>
                                        <option value="Module 01">Module 01</option>
                                        <option value="Module 02">Module 02</option>
                                        <option value="Module 03">Module 03</option>
                                        <option value="Module 04">Module 04</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Floor</label>
                                    <select class="select" name="floor">
                                        <option value="">Select</option>
                                        <option value="Ground">Ground</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lab Type</label>
                                    <select class="select" name="type">
                                        <option value="">Select</option>
                                        <option value="Smart Lab">Smart Lab</option>
                                        <option value="Workshop">Workshop</option>
                                        <option value="office">Office</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Lab Name</label>
                                    <input type="text" class="form-control" name="lab_name">
                                </div>
                                
                                <div class="form-group">
                                    <label>Systems Capacity</label>
                                    <input type="number" class="form-control" name="capacity">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="submit" value="Submit" href="javascript:void(0);" class="btn btn-submit me-2">
                                <a href="countrieslist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>