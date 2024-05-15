<?php include "database/db.php";?>
<?php if (isset($_POST['category'])) {
    $selectedCategory = $_POST['category'];
    $query = "SELECT cat_name FROM sub_category WHERE sub_cat_name = '{$selectedCategory}'";
    $select_all_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_users_query)) {
        $cat_name  = $row['cat_name'];
        echo "<option value='$cat_name'>$cat_name</option>";
    }
}
function fetchSubCategory(){
    global $connection;
    $query = "SELECT sub_cat_name FROM sub_category";
    $select_all_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_users_query)) {
        $sub_cat_name  = $row['sub_cat_name'];
        echo "<option value='$sub_cat_name'>$sub_cat_name</option>";
    }
}
function fetchCategory(){
    global $connection;
    $query = "SELECT cat_name FROM category";
    $select_all_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_users_query)) {
        $cat_name  = $row['cat_name'];
        echo "<option value='$cat_name'>$cat_name</option>";
    }
}

// ================insert data===============
function adduser(){
    global $connection;
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $cnic = $_POST['cnic'];
        $role=$_POST['role'];
        $password = $_POST['password'];
        $emp_id=$_POST['emp_id'];
        $qualification = $_POST['qualification'];
    
        $user_added_on = date('d-m-y');
        
    
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
    
        move_uploaded_file($image_temp, "images/" . $image);
    
        $insertQuery = "INSERT INTO `users`(`emp_id`,`fullname`, `cnic`, `email`, `password`, `contact`, `img`, `qualification`,
         `usertype`,`added_on`
        ) VALUES
          ('{$emp_id}','{$username}','{$cnic}','{$email}','{$password}','{$contact}','{$image}','{$qualification}',
          '{$role}','{$user_added_on}')";
    
        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            // echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            // <strong>Data Added Successfully!</strong>.
            // <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            // </div>";
            // echo "<a href='userlists.php'>Click here</a>";
            header("Location: userlists.php", true);
            exit();
            
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("Failed to add User at the moment" . mysqli_error($connection));
        }
    }
}
function addLabList(){
    if (isset($_POST['submit'])) {
        global $connection;
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Added Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            // die("Failed to add lab at the moment" . mysqli_error($connection));
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Inserted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Inserted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Inserted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Inserted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}
// ============Update =================
function updateLab(){
    if (isset($_POST['submit'])) {
        global $connection;
        $lab_id = $_POST['lab_id'];
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Updated Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("Failed to update at the moment" . mysqli_error($connection));
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Updated Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to update at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Updated Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to update at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Updated Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to update at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("Failed to update at the moment" . mysqli_error($connection));
        }
    }

}
function updateUser(){
    global $connection;
    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $cnic = $_POST['cnic'];
        $role=$_POST['role'];
        $password = $_POST['password'];
        $emp_id=$_POST['emp_id'];
        $qualification = $_POST['qualification'];
    
        $user_updated = date('d-m-y');
        
    
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
    
        move_uploaded_file($image_temp, "images/" . $image);
    
        $insertQuery = "UPDATE `users` SET `emp_id`='{$emp_id}',`fullname`='{$username}',
        `cnic`='{$cnic}',
        `email`='{$email}',`password`='{$password}',`contact`='{$contact}',
        `qualification`='{$qualification}',`img`='{$image}',`usertype`='{$role}',`updated_on`='{$user_updated}'
         WHERE user_id='{$user_id}'";
    
        $query = mysqli_query($connection, $insertQuery);
        if ($query) {
            header("Location: userlists.php");
        } else {
            die("Failed to add User at the moment" . mysqli_error($connection));
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Updated Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to update at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Updated Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to update at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Added Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to add at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to delete at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Deleted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";

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
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to delete at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Deleted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";

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
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to delete at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Deleted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";

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
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to delete at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("QUERY FAILED" . mysqli_error($connection));
        } else {

            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Deleted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}
function deleteInventory(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $deleteQuery = "DELETE FROM assets where asset_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if(!$deleteSQL)  {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Failed to delete at the moment.</strong>.
                <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            die("QUERY FAILED" . mysqli_error($connection));
        }else{
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Deleted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
       
        }
    }
}
function deleteUser(){
    global $connection;
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deleteQuery = "DELETE FROM users where user_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if (!$deleteSQL) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to delete at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Deleted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}
function deleteLab(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $deleteQuery = "DELETE FROM labs where lab_id = ('{$delete_id}')";
        $deleteSQL = mysqli_query($connection, $deleteQuery);
        if(!$deleteSQL)  {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Failed to delete at the moment.</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            die("QUERY FAILED" . mysqli_error($connection));
        }else{
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Data Deleted Successfully!</strong>.
            <button type='button' class='btn-close'- data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}

function fetchLab(){
    global $connection;
    $query = "SELECT lab_name FROM labs";
    $select_all_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_users_query)) {
        $lab_name = $row['lab_name'];

        echo "<option value $lab_name> $lab_name</option>";
    }

}
?>