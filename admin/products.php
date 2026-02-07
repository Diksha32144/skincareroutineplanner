<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h2>Skincare Products</h2>
<a href="add_product.php">➕ Add New Product</a>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Skin Type</th>
    <th>Description</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['product_name'] ?></td>
    <td><?= $row['skin_type'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><?= $row['price'] ?></td>
    <td>
        <a href="edit_product.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete_product.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
