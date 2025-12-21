
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="box glass">
    <h2>Welcome</h2>
    <p>Login to continue your skincare analysis</p>

    <form action="backend/login.php" method="POST">
        <input type="email" name="email" placeholder="Enter Email" required></br>
        <input type="password" name="password" placeholder="Enter Password" required></br>
        <button>Login</button>
        <p>New user ? <a href="register.php">Create Account</a></p>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>