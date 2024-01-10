<?php include "database/db.php";
$passError=false;
$emailError = false;
session_start();
ob_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "Select user_id,emp_id,full_name,user_type from users where email = '$email' AND password = '$password' ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['full_name'];
            $emp_id=$row['emp_id'];
            $user_type=$row['user_type'];
            header("Location:index.php?uid=$emp_id&fullname=$name&usertype=$user_type");
            exit();
        }
    } else {
        echo 'Unuccessfull Login'; 
    }

}?>

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
    <title>RIET-Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-hunar.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/hunar-logo.png" alt="img" height="250px">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <?php
                        if ($passError == true) {
                            echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                     Incorrect Password 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                        }
                        if ($emailError == true) {
                            echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 Invalid Email
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
                        ?>
                        <form action="signin.php" method="post">
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" name="email" placeholder="Enter your email address" value="<?php
                                    if (isset($_COOKIE['emailcookie'])) {
                                        echo $_COOKIE['emailcookie'];
                                    }
                                    ?>">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="Enter your password"
                                        value="<?php
                                        if (isset($_COOKIE['passwordcookie'])) {
                                            echo $_COOKIE['passwordcookie'];
                                        }
                                        ?>">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" id="rememberme" name="rememberme">
                                            <label class="form-check-label text-dark" for="rememberme">
                                                Remember me
                                            </label>
                                        </div>
                                        <a class="text-primary fw-medium" href="./recover_email.php">Forgot Password?</a>
                                    </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
                                </div>
                            </div>
                            <div class="form-login">
                                <input type="submit" name="submit" class="btn btn-login" value="Sign In">
                                <!-- <a class="btn btn-login" href="index.php">Sign In</a> -->
                            </div>
                   
                        </form>
                    </div>
                </div>
                <div class="login-img new-img">
                    <img src="assets/img/riet.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>