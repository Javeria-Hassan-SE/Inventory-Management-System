<?php
include "database/db.php";

if (isset($_POST['category'])) {
    $selectedCategory = $_POST['category'];
    $query = "SELECT cat_name FROM sub_category WHERE sub_cat_name = '{$selectedCategory}'";
    $select_all_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_users_query)) {
        $cat_name  = $row['cat_name'];
        echo "<option value='$cat_name'>$cat_name</option>";
    }
}
function insertBrand(){
    if (isset($_POST['submit'])) {
        $sub_cat_name = $_POST['sub_cat_name'];
        $brand = $_POST['brand'];
        global $connection;
        $added_on = date('d-m-y');
        $added_by = 1;

        $insertQuery = "INSERT INTO `brand`(`brand_name`, `sub_cat_name`, `added_on`, `added_by`) VALUES
         ('{$brand}','{$sub_cat_name}','{$added_on}','{$added_by}')";

        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            header("Location: brand.php");
        } else {
            die("Failed to add at the moment" . mysqli_error($connection));
        }
    }
}
function addAsset(){
    if (isset($_POST['submit'])) {
        $serial_number = $_POST['serial_number'];
        $item_name = $_POST['item_name'];
        $internal_tag = $_POST['internal_tag'];
        $qty = $_POST['qty'];
        $subcategory = $_POST['subcategory'];
        $lab_name = $_POST['lab_name'];
        $status = $_POST['status'];
        $department = $_POST['department'];
        $acq_date = $_POST['acq_date'];
        $custodian = $_POST['custodian'];
        $cost = $_POST['cost'];
        $type = $_POST['type'];
        $specs = $_POST['specs'];
        $mac_address = $_POST['mac_address'];


        global $connection;
        $added_on = date('d-m-y');
        $added_by = 1;


        $insertQuery = "INSERT INTO `assets`(`serial_number`, `item_name`,`mac_address`, `internal_tag`, `qty`, `sub_cat_name`,
         `lab_name`, `status`, `dept_code`, `acq_date`, `custodian`, `cost`, `type`, `specifications`, 
         `added_on`, `added_by`) VALUES ('{$serial_number}','{$item_name}','{$mac_address}','{$internal_tag}','{$qty}','{$subcategory}',
         '{$lab_name}','{$status}','{$department}','{$acq_date}','{$custodian}','{$cost}','{$type}',
         '{$specs}','{$added_on}','{$added_by}')";

        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            header("Location: inventorylist.php");
        } else {
            die("Failed to add at the moment" . mysqli_error($connection));
        }
    }

}
function insertInstitute(){
    if (isset($_POST['submit'])) {
        $institute_name = $_POST['institute_name'];
        $campus_code = $_POST['campus_code'];
        $dept_code = $_POST['dept_code'];
        global $connection;
        $added_on = date('d-m-y');
        $added_by = 1;

        $insertQuery = "INSERT INTO `institutes`(`institute_name`, `campus_code`,`dept_code`, `added_on`, `added_by`) VALUES
         ('{$institute_name}','{$campus_code}','{$dept_code}','{$added_on}','{$added_by}')";

        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            header("Location: institute.php");
        } else {
            die("Failed to add at the moment" . mysqli_error($connection));
        }
    }
}

function insertCategory()
{
    if (isset($_POST['submit'])) {
        $cat_name = $_POST['cat_name'];
        $cat_code = $_POST['cat_code'];
        global $connection;
        $added_on = date('d-m-y');
        $added_by = 1;



        $insertQuery = "INSERT INTO `category`(`cat_code`, `cat_name`, `added_on`, `added_by`) VALUES
         ('{$cat_code}','{$cat_name}','{$added_on}','{$added_by}')";

        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            header("Location: addcategory.php");
        } else {
            die("Failed to add at the moment" . mysqli_error($connection));
        }
    }
}

function updateAsset(){
    if (isset($_POST['update'])) {
        $asset_id = $_POST['asset_id'];
        $serial_number = $_POST['serial_number'];
        $item_name = $_POST['item_name'];
        $internal_tag = $_POST['internal_tag'];
        $qty = $_POST['qty'];
        $subcategory = $_POST['subcategory'];
        $lab_name = $_POST['lab_name'];
        $status = $_POST['status'];
        $department = $_POST['department'];
        $acq_date = $_POST['acq_date'];
        $custodian = $_POST['custodian'];
        $cost = $_POST['cost'];
        $type = $_POST['type'];
        $specs = $_POST['specs'];
        $mac_address = $_POST['mac_address'];


        global $connection;
        $updated_on = date('d-m-y');
        $updated_by = 1;


        $insertQuery = "UPDATE `assets` SET `serial_number`='{$serial_number}',`item_name`='{$item_name}',
        `internal_tag`='{$internal_tag}',`mac_address`='{$mac_address}',`qty`='{$qty}',
        `sub_cat_name`='{$subcategory}',`lab_name`='{$lab_name}',`status`='{$status}',
        `dept_code`='{$department}',`acq_date`='{$acq_date}',`custodian`='{$custodian}',
        `cost`='{$cost}',`type`='{$type}',`specifications`='{$specs}',
        `updated_on`='{$updated_on}',`updated_by`='{$updated_by}' WHERE `asset_id`={$asset_id}";

        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            header("Location: inventorylist.php");
        } else {
            die("Failed to update at the moment" . mysqli_error($connection));
        }
    }

}
function updateBrand(){
    if (isset($_POST['update'])) {
        $brand_id = $_POST['brand_id'];
        $brand_name = $_POST['brand_name'];
        $sub_cat_name = $_POST['sub_cat_name'];
        global $connection;
        $updated_on = date('d-m-y');
        $updated_by = 1;

        $updateQuery = "UPDATE `brand` SET `brand_name`='{$brand_name}',
    `sub_cat_name`='{$sub_cat_name}',`updated_on`='{$updated_on}',
    `updated_by`='{$updated_by}' WHERE brand_id = {$brand_id}";

        $query = mysqli_query($connection, $updateQuery);
        if ($query) {
            header("Location: brand.php");
        } else {
            die("Failed to update at the moment" . mysqli_error($connection));
        }
    }
}

function updateInstitute(){
    if (isset($_POST['update'])) {
        $ins_id = $_POST['ins_id'];
        $ins_name = $_POST['institute_name'];
        $campus_code = $_POST['campus_code'];
        $dept_code = $_POST['dept_code'];
        global $connection;
        $updated_on = date('d-m-y');
        $updated_by = 1;

        $updateQuery = "UPDATE `institutes` SET `institute_name`='{$ins_name}',
    `campus_code`='{$campus_code}',`dept_code`='{$dept_code}',`updated_on`='{$updated_on}',
    `updated_by`='{$updated_by}' WHERE ins_id = {$ins_id}";

        $query = mysqli_query($connection, $updateQuery);
        if ($query) {
            header("Location: institute.php");
        } else {
            die("Failed to update at the moment" . mysqli_error($connection));
        }
    }

}
function updateCategory()
{
    if (isset($_POST['update'])) {
        $cat_id = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];
        $cat_code = $_POST['cat_code'];
        global $connection;
        $updated_on = date('d-m-y');
        $updated_by = 1;

        $updateQuery = "UPDATE `category` SET `cat_code`='{$cat_code}',
    `cat_name`='{$cat_name}',`updated_on`='{$updated_on}',
    `updated_by`='{$updated_by}' WHERE cat_id = {$cat_id}";

        $query = mysqli_query($connection, $updateQuery);
        if ($query) {
            header("Location: addcategory.php");
        } else {
            die("Failed to update at the moment" . mysqli_error($connection));
        }
    }

}
function updateSubCategory()
{
    if (isset($_POST['update'])) {
        $sub_cat_id = $_POST['sub_cat_id'];
        $cat_name = $_POST['cat_name'];
        $sub_cat = $_POST['sub_cat_name'];
        global $connection;
        $updated_on = date('d-m-y');
        $updated_by = 1;

        $updateQuery = "UPDATE `sub_category` 
    SET `sub_cat_name`='{$sub_cat}',`cat_name`='{$cat_name}',
    `updated_on`='{$updated_on}',`updated_by`='{$updated_by}' WHERE sub_cat_id='{$sub_cat_id}'";

        $query = mysqli_query($connection, $updateQuery);
        if ($query) {
            header("Location: ./subaddcategory.php");
        } else {
            die("Failed to update at the moment" . mysqli_error($connection));
        }
    }
}

function insertSubCategory()
{
    if (isset($_POST['submit'])) {
        $cat_name = $_POST['cat_name'];
        $sub_cat = $_POST['sub_cat_name'];
        global $connection;
        $added_on = date('d-m-y');
        $added_by = 1;



        $insertQuery = "INSERT INTO `sub_category`( `sub_cat_name`, `cat_name`, `added_on`, `added_by`) 
    VALUES ('{$sub_cat}','{$cat_name}','{$added_on}','{$added_by}')";

        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            header("Location: ./subaddcategory.php");
        } else {
            die("Failed to add at the moment" . mysqli_error($connection));
        }
    }
}

function deleteCategory()
{
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        global $connection;
        $deleteQuery = "DELETE FROM category where cat_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if (!$deleteSQL) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {

        }
    }
}

function deleteBrand()
{
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        global $connection;
        $deleteQuery = "DELETE FROM brand where brand_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if (!$deleteSQL) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {

        }
    }
}
function deleteInstitute(){
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        global $connection;
        $deleteQuery = "DELETE FROM institutes where ins_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if (!$deleteSQL) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {

        }
    }
}
function deleteSubCategory()
{
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        global $connection;
        $deleteQuery = "DELETE FROM sub_category where sub_cat_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if (!$deleteSQL) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {

        }
    }
}


?>