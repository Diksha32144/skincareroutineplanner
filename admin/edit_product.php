<?php
include "../auth_check.php";
include "../db.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $skin_id = $_POST['skin_id'];
    $routine = $_POST['routine'];
    $price = $_POST['price'];

    $query = "UPDATE products 
              SET product_name='$name', skin_id='$skin_id', routine='$routine', price='$price'
              WHERE product_id='$id'";

    mysqli_query($conn,$query);
    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
</head>
<body>

<h2>Edit Product</h2>

<form method="POST">

Product Name:<br>
<input type="text" name="name" value="<?= $row['product_name'] ?>"><br><br>

Skin Type:<br>
<select name="skin_id">
<?php
$skins = mysqli_query($conn,"SELECT * FROM skin_type");
while($s=mysqli_fetch_assoc($skins)){
    $selected = ($s['skin_id']==$row['skin_id'])?"selected":"";
    echo "<option value='{$s['skin_id']}' $selected>{$s['name']}</option>";
}
?>
</select><br><br>

Routine:<br>
<select name="routine">
<option <?= $row['routine']=="Morning"?"selected":"" ?>>Morning</option>
<option <?= $row['routine']=="Night"?"selected":"" ?>>Night</option>
</select><br><br>

Price:<br>
<input type="number" name="price" value="<?= $row['price'] ?>"><br><br>

<button name="update">Update</button>

</form>
</body>
</html>
