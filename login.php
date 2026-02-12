<?php
session_start();
include "db.php";

$error = "";

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
    if(password_verify($password, $row['password'])){
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
       
 if($row['role'] == 'admin'){
            header("Location: admin/products.php");
        } else {
            header("Location: questions.php");
        }
        exit();

    } else {
        $error = "Incorrect password!";
    }
} else {
    $error = "Email not found!";
}
      

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="box">
<h2>Welcome Back</h2>
<p>Login to continue your skincare analysis</p>

<form method="POST" action="" autocomplete="off">
    <input type="email" name="email" placeholder="Enter Email" required autocomplete="off">
    <input type="password" name="password" placeholder="Enter Password" required autocomplete="new-password">
    <button type="submit" name="login">Login</button>
</form>

<p style="color:red;"><?php echo $error; ?></p>
<div class="link">New user? <a href="register.php">Create Account</a></div>
</div>
</body>
</html>
