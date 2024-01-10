<?php include "database/db.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deleteQuery = "DELETE FROM assets where asset_id = ('{$delete_id}')";
    $deleteSQL = mysqli_query($connection, $deleteQuery);
    if (!$deleteSQL) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {

    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Inventory Management Systeme">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Inventory Management System">
    <meta name="robots" content="noindex, nofollow">
    <title>RIET-Inventory List</title>

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
                        <h4>Fixed Asset List (As per Finance Format)</h4>
                        <h6>Manage your Fixed Asset</h6>
                    </div>
                    <div class="page-btn">
                        <a href="addinventory.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                                class="me-1">Add New Item</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                        <img src="assets/img/icons/filter.svg" alt="img">
                                        <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                src="assets/img/icons/excel.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                src="assets/img/icons/printer.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Item</option>
                                                        <option>Macbook pro</option>
                                                        <option>Orange</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Brand</option>
                                                        <option>N/D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12 ">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>150.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <a class="btn btn-filters ms-auto"><img
                                                            src="assets/img/icons/search-whites.svg" alt="img"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Campus</th>
                                        <th>Description</th>
                                        <th>Physical Location</th>
                                        <th>Sub-Category</th>
                                        <th>Acquisition Date</th>
                                        <th>Custodian</th>
                                        <th>QTY</th>
                                        <th>Category</th>
                                        <th>Asset Code</th>
                                        <th>Location</th>
                                        <th>Dept</th>
                                        <th>Category</th>
                                        <th>Serial-No</th>
                                        <th>Year</th>
                                        <th>Floor</th>
                                        <th>Remarks</th>
                                        <th>Cost</th>
                                        <th>Specification</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Fetch data -->
                                    <?php
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
                category ON sub_category.cat_name = category.cat_name;
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
                                        ?>
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <?php echo $campus_code ?>
                                            </td>
                                            <td>
                                                <?php echo $description ?>
                                            </td>
                                            <td>
                                                <?php echo $physical_location ?>
                                            </td>
                                            <td>
                                                <?php echo $subcategory ?>
                                            </td>
                                            <td>
                                                <?php echo $acq_date ?>
                                            </td>
                                            <td>
                                                <?php echo $custodian ?>
                                            </td>
                                            <td>
                                                <?php echo $qty ?>
                                            </td>
                                            <td>
                                                <?php echo $category ?>
                                            </td>
                                            <td>
                                                <?php echo "" ?>
                                            </td>
                                            <td>
                                                <?php echo $module_code ?>
                                            </td>
                                            <td>
                                                <?php echo $department ?>
                                            </td>
                                            <td>
                                                <?php echo $cat_code ?>
                                            </td>
                                            <td>
                                                <?php echo "" ?>
                                            </td>
                                            <td>
                                                <?php echo "" ?>
                                            </td>
                                            <td>
                                                <?php echo $floor ?>
                                            </td>
                                            <td>
                                                <?php echo $remarks ?>
                                            </td>
                                            <td>
                                                <?php echo $cost ?>
                                            </td>
                                            <td>
                                                <?php echo $specs ?>
                                            </td>
                                            <td>
                                                <?php echo "<a class='me-3' href='viewfixedasset.php?view={$asset_id}'>" ?>
                                                <img src="assets/img/icons/eye.svg" alt="img">
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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