<?php include "database/db.php"; ?>

<?php
if(isset($_GET['update'])){
    $user_id = $_GET['update'];
    $query = "SELECT * FROM users where user_id = '{$user_id}'";
                $select_all_users_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_users_query)) {
                    $u_emp_id = $row['emp_id'];
                    $u_qualification = $row['qualification'];
                   $u_fullname =  $row['fullname'];
                   $u_cnic= $row['cnic'];
                   $u_email =  $row['email'];
                   $u_password =  $row['password'];
                   $u_contact =  $row['contact'];
                   $u_img=$row['img'];
                   $u_usertype=$row['usertype'];
                }
}
if (isset($_POST['submit'])) {
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
                        <h4>User Management</h4>
                        <h6>Update User</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                    <label>Employee ID</label>
                                    <input type="text" name="emp_id" value="<?php echo $u_emp_id ?>">
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="username" value="<?php echo $u_fullname ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $u_email ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label>CNIC</label>
                                    <div class="pass-group">
                                        <input type="text" class="pass-input" name="cnic" value="<?php echo $u_cnic ?>">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="contact" value="<?php echo $u_contact ?>">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select" name="role">
                                        <option value="<?php echo $u_usertype ?>">Select</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Sr. Instructor">Sr. Instructor</option>
                                        <option value="Instructor">Instructor</option>
                                        <option value="Asst. Instructor">Asst. Instructor</option>
                                        <option value="Students Relation Officer (SRO)">Students Relation Officer (SRO)</option>
                                        <option value="Intern">Intern</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="pass-input" name="password" value="<?php echo $u_password ?>">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Qualification</label>
                                    <div class="pass-group">
                                        <input type="text" class="pass-input" name="qualification" value="<?php echo $u_qualification ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label> Profile Picture</label>
                                    <div class="image-upload image-upload-new">
                                        <input type="file" name="image">
                                        <div class="image-uploads">
                                            <img src="images/<?php echo $u_img?>" alt="img">
                                            <h4>Drag and drop a file to Change Image</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="submit" class="btn btn-submit me-2" value="Update">
                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
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