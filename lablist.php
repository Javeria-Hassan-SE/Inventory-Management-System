<?php include "includes/functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="Inventory Management System">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Inventory Management System">
<meta name="robots" content="noindex, nofollow">
<title>RIET - Lab List</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-hunar.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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
<h4>Lab List</h4>
<h6>Manage your labs</h6>
<?php deleteLab();?>
</div>
<div class="page-btn">
<a href="addlablist.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img">Add Lab</a>
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
<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>

<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Lab Name">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Module Name">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Lab Type">
</div>
</div>

<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Disable</option>
<option>Enable</option>
</select>
</div>
</div>
<div class="col-lg-1 col-sm-6 col-12 ms-auto">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
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
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</th>
<th>Lab ID</th>
<th>Module Code</th>
<th>Module name</th>
<th>Lab Name </th>
<th>Floor</th>
<th>Lab Type</th>
<th>Systems Capacity</th>
<th>Created On</th>
<th>Created By</th>
<th>Updated On</th>
<th>Updated By</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <!-- Fetch data -->
    <?php
                $query = "SELECT * FROM labs";
                $select_all_users_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_users_query)) {
                    $lab_id =  $row['lab_id'];
                    $module_name = $row['module_name'];
                    $module_code = $row['module_code'];
                    $floor = $row['floor'];
                   $lab_type =  $row['lab_type'];
                   $lab_name= $row['lab_name'];
                   $capacity =  $row['capacity'];
                   $added_by =  $row['added_by'];
                   $added_on =  $row['added_on'];
                   $updated_by=$row['updated_by'];
                   $updated_on=$row['updated_on'];
                ?>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>

<td><?php echo $lab_id ?></td>
<td><?php echo $module_code ?></td>
<td><?php echo $module_name ?> </td>
<td><?php echo $lab_name ?> </td>
<td><?php echo $floor ?></td>
<td><?php echo $lab_type ?></td>
<td><?php echo $capacity ?></td>
<td><?php echo $added_on ?></td>
<td><?php echo $added_by ?></td>
<td><?php echo $updated_on ?></td>
<td><?php echo $updated_by ?></td>
<td>
<?php echo "<a class='me-3' href='editlab.php?update={$lab_id}'>"  ?>
<img src="assets/img/icons/edit.svg" alt="img">
</a>
<?php echo "<a class='me-3 confirm-text' href='lablist.php?delete={$lab_id}'>"  ?>
<img src="assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<?php }?>
 <!-- End of fetch data -->

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>