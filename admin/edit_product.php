<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $skin = $_POST['skin_type'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    mysqli_query($conn, 
        "UPDATE products SET 
         product_name='$name',
         skin_type='$skin',
         description='$desc',
         price='$price'
         WHERE id=$id");

    header("Location: products.php");
}
?>

<form method="POST">
    <input type="text" name="name" value="<?= $product['product_name'] ?>"><br><br>

    <input type="text" name="skin_type" value="<?= $product['skin_type'] ?>"><br><br>

    <textarea name="description"><?= $product['description'] ?></textarea><br><br>

    <input type="number" name="price" value="<?= $product['price'] ?>"><br><br>

    <button name="update">Update</button>
</form>
