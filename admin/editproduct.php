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
<style>


body{
    margin:0;
    font-family:Poppins, Arial, Helvetica, sans-serif;
    background: linear-gradient(135deg,#fbc2eb,#a6c1ee);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}


.container{
    width:420px;
    background:rgba(255,255,255,0.25);
    backdrop-filter: blur(14px);
    border-radius:20px;
    padding:35px 40px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}
h2{
    text-align:center;
    margin-bottom:25px;
    color:#222;
}


label{
    font-weight:600;
    display:block;
    margin-top:15px;
    margin-bottom:6px;
}


input, select{
    width:100%;
    padding:12px;
    border-radius:10px;
    border:1px solid #ddd;
    outline:none;
    font-size:14px;
    transition:0.2s;
}
input:focus, select:focus{
    border-color:#6366f1;
    box-shadow:0 0 6px rgba(99,102,241,0.4);
}


button{
    width:100%;
    margin-top:25px;
    padding:14px;
    border:none;
    border-radius:12px;
    background:#6366f1;
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}
button:hover{
    background:#4f46e5;
    transform:scale(1.03);
}

.back{
    display:block;
    text-align:center;
    margin-top:18px;
    text-decoration:none;
    color:#333;
    font-weight:600;
}

.back:hover{
    color:#6366f1;
}

</style>
</head>
<body>
<div class="container">
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
</div>
</body>
</html>
