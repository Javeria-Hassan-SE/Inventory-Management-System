<?php
include "../database/db.php";
global $connection;
// Retrieve the selected value from the query string
$selectedValue = $_GET['subCategory'];

// Execute your SQL query based on the selected value

// Example SQL query
$query = "SELECT cat_name FROM sub_category WHERE sub_cat_name = '{$selectedValue}'";

// Execute the query and fetch results
$result = mysqli_query($connection, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);
?>
