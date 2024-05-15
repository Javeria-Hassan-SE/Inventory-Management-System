<?php
// global $connection;
// $connection = mysqli_connect('localhost', 'root', '', 'ims');

// if ($connection) {
//    // echo "We are connected";
// } else{

//  die("Database connection failed");
// }
global $connection;
$connection = mysqli_connect('localhost', 'root', '', 'ims-invetri');

if ($connection) {
   // echo "We are connected";
} else{

 die("Database connection failed");
}

?>