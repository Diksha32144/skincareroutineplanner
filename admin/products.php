<?php
include "../auth_check.php";
include "../db.php";

$query = "SELECT p.*, s.name AS skin_name
          FROM products p
          JOIN skin_type s ON p.skin_id = s.skin_id
          ORDER BY p.product_id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <style>
        body{font-family:Arial;background:#f4f6fb;padding:40px;}
        table{width:100%;border-collapse:collapse;background:white;}
        th,td{padding:12px;border:1px solid #ddd;text-align:center;}
        th{background:#6366f1;color:white;}
        a.button{
            padding:8px 14px;
            background:#6366f1;
            color:white;
            text-decoration:none;
            border-radius:6px;
        }
        a.delete{background:#ef4444;}
        .top{margin-bottom:20px;}
    </style>
</head>
<body>

<h2>🧴 Product Management</h2>

<div class="top">
    <a class="button" href="./addproduct.php">+ Add New Product</a>
</div>

<table>
<tr>
    <th>ID</th>
    <th>Product Name</th>
    <th>Skin Type</th>
    <th>Routine</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['product_id'] ?></td>
    <td><?= $row['product_name'] ?></td>
    <td><?= ucfirst($row['skin_name']) ?></td>
    <td><?= $row['routine'] ?></td>
    <td>Rs. <?= $row['price'] ?></td>
    <td>
        <a class="button" href="editproduct.php?id=<?= $row['product_id'] ?>">Edit</a>
        <a class="button delete" href="deleteproduct.php?id=<?= $row['product_id'] ?>" onclick="return confirm('Delete this product?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
