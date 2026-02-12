<?php
include "../auth_check.php";
include "../db.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM products WHERE product_id='$id'");

header("Location: products.php");
?>
