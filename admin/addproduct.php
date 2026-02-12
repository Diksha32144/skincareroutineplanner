<?php
include "../auth_check.php";
include "../db.php";

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $skin_id = $_POST['skin_id'];
    $routine = $_POST['routine'];
    $price = $_POST['price'];

    $query = "INSERT INTO products (product_name, skin_id, routine, price)
              VALUES ('$name','$skin_id','$routine','$price')";
    mysqli_query($conn,$query);

    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
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
<h2>➕ Add New Product</h2>

<form method="POST">

 <label>Product Name</label>
        <input type="text" name="name" required>

        <label>Skin Type</label>
        <select name="skin_id" required>
        <?php
        $skins = mysqli_query($conn,"SELECT * FROM skin_type");
        while($s=mysqli_fetch_assoc($skins)){
            echo "<option value='{$s['skin_id']}'>{$s['name']}</option>";
        }
        ?>
        </select>

        <label>Routine</label>
        <select name="routine" required>
            <option value="Morning">Morning</option>
            <option value="Night">Night</option>
        </select>

        <label>Price (NPR)</label>
        <input type="number" name="price" required>

        <button name="add">Add Product</button>
 </form>

    <a class="back" href="products.php">⬅ Back to Products</a>
</div>

</body>
</html>
