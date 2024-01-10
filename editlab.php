<?php include "database/db.php"; ?>

<?php
if(isset($_GET['update'])){
    $lab_id = $_GET['update'];
    $query = "SELECT * FROM labs where lab_id = '{$lab_id}'";
                $select_all_users_query = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_users_query)) {
                    $module_name = $row['module_name'];
                    $floor = $row['floor'];
                   $lab_type =  $row['lab_type'];
                   $lab_name= $row['lab_name'];
                   $capacity =  $row['capacity'];
                }
}
if (isset($_POST['submit'])) {
    $u_module = $_POST['module'];
    $u_floor = $_POST['floor'];
    $u_type = $_POST['type'];
    $u_capacity = $_POST['capacity'];
    $u_lab_name=$_POST['lab_name'];

    $updated_on = date('d-m-y');
    $updated_by = 1;

    $module_code="";
    if($u_module=="Module 01"){
        $module_code='MD01';
    }else if($u_module=="Module 02"){
        $module_code='MD02';
    }else if($u_module=="Module 03"){
        $module_code='MD03';
    }else if($u_module=="Module 04"){
        $module_code='MD04';
    }



    $insertQuery = "UPDATE `labs` SET `module_code`='{$module_code}',`module_name`='{$u_module}',`floor`='{$u_floor}',`lab_type`='{$u_type}',
    `lab_name`='{$u_lab_name}',`capacity`='{$u_capacity}',
    `updated_by`='{$updated_by}',`updated_on`='{$updated_on}' WHERE `lab_id`= {$lab_id}";

    $query = mysqli_query($connection, $insertQuery);
    if ($query) {
        header("Location: lablist.php");
    } else {
        die("Failed to update at the moment" . mysqli_error($connection));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Inventory Management System">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Inventory Management System">
    <meta name="robots" content="noindex, nofollow">
    <title>RIET- Edit User</title>

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
                        <h4>Lab Management</h4>
                        <h6>Update Lab</h6>
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
                                        <option value="<?php echo $module_name ?>"><?php echo $module_name ?></option>
                                        <option value="Module 01">Module 01</option>
                                        <option value="Module 02">Module 02</option>
                                        <option value="Module 03">Module 03</option>
                                        <option value="Module 04">Module 04</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Floor</label>
                                    <select class="select" name="floor">
                                        <option value="<?php echo $floor ?>"><?php echo $floor ?></option>
                                        <option value="Ground">Ground</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lab Type</label>
                                    <select class="select" name="type">
                                        <option value="<?php echo $lab_type ?>"><?php echo $lab_type ?></option>
                                        <option value="Smart Lab">Smart Lab</option>
                                        <option value="Workshop">Workshop</option>
                                        <option value="office">Office</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Lab Name</label>
                                    <input type="text" class="form-control" name="lab_name" value="<?php echo $lab_name ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label>Capacity</label>
                                    <input type="number" class="form-control" name="capacity" value="<?php echo $capacity ?>">
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