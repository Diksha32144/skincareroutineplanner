<?php
session_start();
include "db.php";


if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);


    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];

        header("Location: questions.php");
    } else {
        echo "<p style='color:red'>Invalid email or password</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link  href="style.css" rel="stylesheet">
</head>
<body>
     <div class="box glass">
    <h2>Welcome</h2>
    <p>Login to continue your skincare analysis</p>

    

    <form action="backend/login.php" method="POST">
        <input type="email" name="email" placeholder="Enter Email" required></br>
        <input type="password" name="password" placeholder="Enter Password" required></br>
        <button type="submit" name="login">Login</button>
        </form>
        <p>New user ? <a href="register.php">Create Account</a></p>
    
</div>

</body>
</html>