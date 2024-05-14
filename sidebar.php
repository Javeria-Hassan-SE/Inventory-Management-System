<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Bar</title>
</head>
<body>
<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="active">
<a href="index.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span> Inventory</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="institute.php">Institute</a></li>
<li><a href="addcategory.php">Category</a></li>
<li><a href="subaddcategory.php">Sub Category</a></li>
<li><a href="brand.php">Brand</a></li>
<li><a href="add_inventory.php">Add Inventory</a></li>
<li><a href="inventory_list.php">View Inventory</a></li>
<li><a href="fixedassetlist.php">View Fixed Asset List</a></li>
<!-- <li><a href="addconsumable.php">Add Consumable List</a></li>
<li><a href="consumablelist.php">View Consumable List</a></li>
<li><a href="barcode.php">Print Barcode</a></li> -->
</ul>
</li>

<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/transfer1.svg" alt="img"><span> Transfer</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="addtransfer.php">Add Transfer Item</a></li>
<li><a href="transferlist.php">Transfer List</a></li>

</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"><span> Return</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="addreturnlist.php">Add Return Item</a></li>
<li><a href="returnlist.php">Return List</a></li>
</ul>
</li>

<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/places.svg" alt="img"><span> Labs</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="addlablist.php">Add Lab</a></li>
<li><a href="lablist.php">View Labs</a></li>


</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span> Users</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="newuser.php">New User </a></li>
<li><a href="userlists.php">Users List</a></li>
</ul>
</li>

</ul>
</div>
</div>
</div>
</body>
</html>