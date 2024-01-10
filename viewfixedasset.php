<?php include "includes/functions.php";
if(isset($_GET['view'])){
$asset_id = $_GET['view'];
$query = "SELECT 
                assets.*, 
                institutes.campus_code, 
                institutes.dept_code,
                labs.module_code,
                labs.floor,
                sub_category.cat_name,
                category.cat_code
            FROM 
                assets
            LEFT JOIN 
                institutes ON assets.dept_code = institutes.campus_code
            LEFT JOIN 
                labs ON assets.lab_name = labs.lab_name
            LEFT JOIN 
                sub_category ON assets.sub_cat_name = sub_category.sub_cat_name
            LEFT JOIN 
                category ON sub_category.cat_name = category.cat_name where assets.asset_id='{$asset_id}'
            ";
$select_all_users_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_users_query)) {
    $asset_id = $row['asset_id'];
    $campus_code = $row['campus_code'];
    $description = $row['item_name'];
    $remarks = $row['internal_tag'];
    $qty = $row['qty'];
    $acq_date = $row['acq_date'];
    $physical_location = $row['lab_name'];
    $subcategory = $row['sub_cat_name'];
    $category = $row['cat_name'];
    $custodian = $row['custodian'];
    $department = $row['dept_code'];
    $module_code = $row['module_code'];
    $specs = $row['specifications'];
    $cat_code = $row['cat_code'];
    $floor = $row['floor'];
    $cost = $row['cost'];
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
    <title>RIET - View Asset Item</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-hunar.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="jquery-3.7.1.min.js"></script>

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
                        <h4>View Item</h4>
                        <h6>View Existing item</h6>
                    </div>
                </div>
                
                <form action="" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="asset_id" id="asset_id" value="<?php echo $asset_id ?>">
                        <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Campus Code</label>
                                    <input type="text" name="serial_number" value="<?php echo $campus_code ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="item_name" value="<?php echo $item_name ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Physical Location</label>
                                    <input type="text" name="internal_tag" value="<?php echo $physical_location ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <input type="text" name="mac_address" value="<?php echo $subcategory ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Acquisition Date</label>
                                    <input type="text" name="mac_address" value="<?php echo $acq_date ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Custodian</label>
                                    <input type="text" name="mac_address" value="<?php echo $custodian ?>">
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="qty" value="<?php echo $qty ?>">
                                </div>
                            </div>
                          
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" name="qty" value="<?php echo $category ?>">
                                </div>
                            </div>
                            
            
                           <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Asset Code</label>
                                    <input type="text" class="form-control" name="acq_date" value="" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Custodian</label>
                                    <input type="text" class="form-control" name="custodian" value="<?php echo $custodian ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Cost</label>
                                    <input type="text" class="form-control" name="cost" value="<?php echo $cost ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="select" name="type">
                                        <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                        <option value="Borrowed">Borrowed</option>
                                        <option value="Owned">Owned</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Specifications</label>
                                    <textarea class="form-control" name="specs" value="<?php echo $specs ?>"></textarea>
                                </div>
                            </div>
                           
                           
                            <!-- <div class="col-lg-12">
                                <input type="submit" name="update" value="Update" class="btn btn-submit me-2">
                                <a href="#" class="btn btn-cancel">Cancel</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <script src="assets/js/index.js"></script>



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