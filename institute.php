<?php include("includes/functions.php");?>
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
    <title>RIET - Add Institute</title>

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
                        <h4>Add Institute</h4>
                        <h6>Create New Institute</h6>
                        <?php
                        insertInstitute();
                        deleteInstitute();
                        ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Institute Name</label>
                                        <input type="text" name="institute_name">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Campus Code (As per Finance List)</label>
                                        <input type="text" name="campus_code">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Department Code (As per Finance List)</label>
                                        <input type="text" name="dept_code">
                                    </div>
                                    
                                </div>
                               
                                <div class="col-lg-12">
                                    <input type="submit" name="submit" value="Add" class="btn btn-submit me-2">
                                    <a href="#" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
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
                                    <th>Institute ID</th>
                                    <th>Institute Name</th>
                                    <th>Campus Code</th>
                                    <th>Department Code</th>
                                    <th>Created On</th>
                                    <th>Created By</th>
                                    <th>Updated On</th>
                                    <th>Updated By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from institutes";
                                $select_all_users_query = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($select_all_users_query)) {
                                    $ins_id = $row['ins_id'];
                                    $ins_name = $row['institute_name'];
                                    $campus_code = $row['campus_code'];
                                    $dept_code = $row['dept_code'];
                                    $added_by = $row['added_by'];
                                    $added_on = $row['added_on'];
                                    $updated_by = $row['updated_by'];
                                    $updated_on = $row['updated_on'];
                                    ?>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <?php echo $ins_id ?>
                                        </td>
                                        <td>
                                            <?php echo $ins_name ?>
                                        </td>
                                        <td>
                                            <?php echo $campus_code ?>
                                        </td>
                                        <td>
                                            <?php echo $dept_code ?>
                                        </td>
                                        <td>
                                            <?php echo $added_on ?>
                                        </td>
                                        <td>
                                            <?php echo $added_by ?>
                                        </td>
                                        <td>
                                            <?php echo $updated_on ?>
                                        </td>
                                        <td>
                                            <?php echo $updated_by ?>
                                        </td>
                                        <td>
                                            <?php echo "<a class='me-3' href='editinstitute.php?update={$ins_id}'>" ?>
                                            <img src="assets/img/icons/edit.svg" alt="img">
                                            </a>
                                            <?php echo "<a class='me-3' href='institute.php?delete={$ins_id}'>" ?>
                                            <img src="assets/img/icons/delete.svg" alt="img">
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