<?php
include "database/db.php";?>

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
    <title>RIET - Add Inventory</title>

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
                        <h4>Add New Item</h4>
                        <h6>Create new item</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Internal Tag</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select class="select" id="subcategory" name="subcategory" onchange="getcategories(this.value)">
                                        <option value="">Choose Sub-Category</option>
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
                                    <select class="select" id="category" name="category" >
                                        <option value="">Choose Category</option>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Lab</label>
                                    <select class="select">
                                        <option>Choose Lab</option>
                                        <?php
                                        $query = "SELECT lab_name FROM labs";
                                        $select_all_users_query = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_all_users_query)) {
                                            $lab_name = $row['lab_name'];
                                            ?>
                                            <option value="<?php echo $lab_name ?>"><?php echo $lab_name ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select">
                                        <option value="">Choose Status</option>
                                        <option>Working</option>
                                        <option>Minor Faulty</option>
                                        <option>Major Faulty</option>
                                        <option>Dead</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="select">
                                        <option value="">Choose Department</option>
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
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Custodian</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Cost</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="select">
                                        <option value="">Choose Type</option>
                                        <option>Borrowed</option>
                                        <option>Owned</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Specifications</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                           
                            
                           
                           
                            <div class="col-lg-12">
                                <a href="javascript:void(0);" class="btn btn-submit me-2">Add</a>
                                <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
    function getcategories(category) {
        // Use jQuery to send an AJAX request to fetch subcategories based on the selected category
        $.ajax({
            type: "POST",
            url: "includes/functions.php",
            data: { category: category },
            success: function(data) {
                // Update the subcategory dropdown with the received data
                $("#category").html(data);
            }
        });
    }
</script>


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