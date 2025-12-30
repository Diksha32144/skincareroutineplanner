<?php
include "db.php";


if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


     $query = "INSERT INTO users (name, email, password)
              VALUES ('$name', '$email', '$password')";

    mysqli_query($conn, $query);

     header("Location: login.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register page</title>
  

    <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body{
    min-height:100vh;
    background-color: #f7e8ff;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:380px;
    background: rgba(255,255,255,0.3);
    backdrop-filter: blur(12px);
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 25px rgba(0,0,0,0.25);
}
h2{
    text-align:center;
    color:#bb377d;
    margin-bottom:20px;
}

input, select{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:8px;
    outline:none;
}

button{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:none;
    border-radius:25px;
    background-color:#2ecc71;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:green;
}

p{
    text-align:center;
    margin-top:15px;
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
 <form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" name="register">Register</button>
</form>
<p style="text-align:center;">Already registered? <a href="index.php">Login</a></p>
</body>
</html>