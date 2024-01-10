<?php include "includes/functions.php";
if(isset($_GET['view'])){
$asset_id = $_GET['view'];
$query = "SELECT * FROM assets where asset_id='{$asset_id}'";
$select_all_users_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_users_query)) {
    $serial_number = $row['serial_number'];
    $item_name = $row['item_name'];
    $cat_name= $row['cat_name'];
    $internal_tag = $row['internal_tag'];
    $qty = $row['qty'];
    $lab_name = $row['lab_name'];
    $subcategory = $row['sub_cat_name'];
    $status = $row['status'];
    $department = $row['dept_code'];
    $type = $row['type'];
    $specs = $row['specifications'];
    $mac_address = $row['mac_address'];
    $custodian = $row['custodian'];
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
    <title>RIET - Edit Inventory</title>

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
                                    <label>Serial Number</label>
                                    <input type="text" name="serial_number" value="<?php echo $serial_number ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" name="item_name" value="<?php echo $item_name ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Internal Tag</label>
                                    <input type="text" name="internal_tag" value="<?php echo $internal_tag ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Mac Address</label>
                                    <input type="text" name="mac_address" value="<?php echo $mac_address ?>">
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
                                    <label>Sub Category</label>
                                    <select class="select" id="subcategory" name="subcategory" onchange="getCategories(this.value)">
                                        <option value="<?php echo $subcategory?>"><?php echo $subcategory ?></option>
                                        <?php
                                        $query = "SELECT sub_cat_name FROM sub_category";
                                        $select_all_users_query = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_all_users_query)) {
                                            $sub_cat_name = $row['sub_cat_name'];
                                            ?>

                                            <option value="<?php echo $sub_cat_name?>"><?php echo $sub_cat_name ?></option>

                                        <?php } ?>
                                     
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="select" id="category" name="category">
                                    <option value="">First Select Sub-Category</option>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Lab</label>
                                    <select class="select" name="lab_name">
                                        <option value="<?php echo $lab_name ?>"><?php echo $lab_name ?></option>
                                        <?php
                                        $query = "SELECT lab_name FROM labs";
                                        $select_all_users_query = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_all_users_query)) {
                                            $lab_name = $row['lab_name'];
                                            ?>
                                            <option value="<?php echo $lab_name?>"><?php echo $lab_name ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select" name="status">
                                        <option value="<?php echo $status?>"><?php echo $status ?></option>
                                        <option value="Working">Working</option>
                                        <option value="Minor Faulty">Minor Faulty</option>
                                        <option value="Major Faulty">Major Faulty</option>
                                        <option value="Dead">Dead</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="select" name="department">
                                        <option value="<?php echo $department ?>"><?php echo $department ?></option>
                                        <?php
                                        $query = "SELECT campus_code FROM institutes";
                                        $select_all_users_query = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_all_users_query)) {
                                            $campus_code = $row['campus_code'];
                                            ?>
                                            <option value="<?php echo $campus_code ?>"><?php echo $campus_code ?></option>

                                        <?php } ?>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            
                           <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Acquisition Date</label>
                                    <input type="date" class="form-control" name="acq_date" value="<?php echo $acq_date ?>">
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