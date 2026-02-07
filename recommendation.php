<?php
include "auth_check.php";
include "db.php";


$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("User not logged in.");
}


$resQuery = "SELECT skin_id FROM result WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $resQuery);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($res) === 0) {
    die("No skin analysis found. Please take the test first.");
}

$resRow = mysqli_fetch_assoc($res);
$skin_id = $resRow['skin_id'];


$skinQuery = "SELECT name FROM skin_type WHERE skin_id = ?";
$stmt2 = mysqli_prepare($conn, $skinQuery);
mysqli_stmt_bind_param($stmt2, "i", $skin_id);
mysqli_stmt_execute($stmt2);
$skinRes = mysqli_stmt_get_result($stmt2);
$skinRow = mysqli_fetch_assoc($skinRes);
$skin_name = ucfirst($skinRow['name']);


$morningStmt = mysqli_prepare(
    $conn,
    "SELECT product_name, price FROM products 
     WHERE skin_id = ? AND routine = 'Morning'"
);
mysqli_stmt_bind_param($morningStmt, "i", $skin_id);
mysqli_stmt_execute($morningStmt);
$morningProducts = mysqli_stmt_get_result($morningStmt);

$nightStmt = mysqli_prepare(
    $conn,
    "SELECT product_name, price FROM products 
     WHERE skin_id = ? AND routine = 'Night'"
);
mysqli_stmt_bind_param($nightStmt, "i", $skin_id);
mysqli_stmt_execute($nightStmt);
$nightProducts = mysqli_stmt_get_result($nightStmt);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Skincare Routine</title>
    <style>
        body{
            font-family:Poppins, sans-serif;
            background:linear-gradient(135deg,#f6d1ff,#c2e9fb);
            padding:40px;
        }
        h1,h2{text-align:center;}
        .box{
            background:rgba(255,255,255,0.4);
            backdrop-filter:blur(12px);
            padding:25px;
            border-radius:20px;
            max-width:700px;
            margin:30px auto;
        }
        .product{
            background:#fff;
            padding:15px;
            border-radius:12px;
            margin:10px 0;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
        }
        .price{
            color:#4f46e5;
            font-weight:bold;
        }
        .actions{
            text-align:center;
            margin-top:30px;
        }
        a{
            padding:12px 18px;
            background:#6366f1;
            color:white;
            border-radius:10px;
            text-decoration:none;
            margin:6px;
            display:inline-block;
        }
    </style>
</head>

<body>

<h1>🌿 Recommended Skincare Routine</h1>
<h2>Skin Type: <?= $skin_name ?></h2>


<div class="box">
    <h2>🌞 Morning Routine</h2>

    <?php if (mysqli_num_rows($morningProducts) > 0): ?>
        <?php while ($p = mysqli_fetch_assoc($morningProducts)): ?>
            <div class="product">
                <strong><?= $p['product_name'] ?></strong><br>
                <span class="price">Rs. <?= $p['price'] ?></span>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No morning products found.</p>
    <?php endif; ?>
</div>


<div class="box">
    <h2>🌙 Night Routine</h2>

    <?php if (mysqli_num_rows($nightProducts) > 0): ?>
        <?php while ($p = mysqli_fetch_assoc($nightProducts)): ?>
            <div class="product">
                <strong><?= $p['product_name'] ?></strong><br>
                <span class="price">Rs. <?= $p['price'] ?></span>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No night products found.</p>
    <?php endif; ?>
</div>

<div class="actions">
    <a href="questions.php">Retake Test</a>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
