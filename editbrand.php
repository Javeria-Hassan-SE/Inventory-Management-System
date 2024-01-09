<?php include("includes/functions.php");
if(isset($_GET['update'])){
$brand_id = $_GET['update'];
$query = "SELECT * FROM brand where brand_id='{$brand_id}'";
$select_all_users_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_users_query)) {
    $brand_name = $row['brand_name'];
    $sub_cat = $row['sub_cat_name'];
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
    <title>RIET - Edit Brand</title>

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
                        <h4>Edit Brand</h4>
                        <h6>Update Existing Brand</h6>
                        <?php
                        updateBrand();
                        ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <input type="hidden" name="brand_id" id="" value="<?php echo $brand_id ?>">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text" name="brand_name" value="<?php echo $brand_name ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Sub-Category Name</label>
                                        <select class="select" name="sub_cat_name">
                                        <option value="<?php echo $sub_cat ?>"><?php echo $sub_cat ?></option>
                                        <?php
                                        $query = "SELECT sub_cat_name FROM sub_category";
                                        $select_all_users_query = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_all_users_query)) {
                                            $sub_cat_name = $row['sub_cat_name'];
                                            ?>

                                            ?>
                                            <option value="<?php echo $sub_cat_name ?>"><?php echo $sub_cat_name ?></option>

                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                               

                                <div class="col-lg-12">
                                    <input type="submit" name="update" value="Update" class="btn btn-submit me-2">
                                    <a href="#" class="btn btn-cancel">Cancel</a>
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