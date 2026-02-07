<?php
include "db.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $skin = $_POST['skin_type'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $query = "INSERT INTO products 
              (product_name, skin_type, description, price)
              VALUES ('$name', '$skin', '$desc', '$price')";

    mysqli_query($conn, $query);
    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h2>Add Skincare Product</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required><br><br>

    <select name="skin_type" required>
        <option value="">Select Skin Type</option>
        <option>Dry</option>
        <option>Oily</option>
        <option>Combination</option>
        <option>Sensitive</option>
    </select><br><br>

    <textarea name="description" placeholder="Description"></textarea><br><br>

    <input type="number" name="price" placeholder="Price"><br><br>

    <button name="add">Add Product</button>
</form>

</body>
</html>
