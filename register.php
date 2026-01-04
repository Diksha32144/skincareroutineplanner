<?php
include "db.php";

$error = "";

if(isset($_POST['register'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);

    if(mysqli_stmt_execute($stmt)){
        header("Location: login.php");
        exit();
    } else {
        $error = "Registration failed. Try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body{
    min-height:100vh;
    background:#f7e8ff;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:380px;
    background:rgba(255,255,255,0.3);
    backdrop-filter:blur(12px);
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 25px rgba(0,0,0,0.25);
    text-align:center;
}

h2{
    color:#bb377d;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:10px;
    outline:none;
    font-size:14px;
}

button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:25px;
    background:#2ecc71;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#27ae60;
}

p{
    margin-top:10px;
    font-size:14px;
}

a{
    color:#bb377d;
    text-decoration:none;
    font-weight:500;
}
</style>

</head>
<body>
<div class="container">
    <h2>Create Account</h2>
    <form method="POST" action="" autocomplete="off">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>
    <p style="color:red;"><?php echo $error; ?></p>
    <p>Already registered? <a href="login.php">Login</a></p>
</div>

</body>
</html>
