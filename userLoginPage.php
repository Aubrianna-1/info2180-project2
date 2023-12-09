<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Add any additional styles or scripts here -->
</head>
<body>

<form id="loginForm" action="verifyUser.php" method="POST">
    <h1>LOGIN</h1>

    <!-- CSRF Token -->
    <input type="hidden" name="csrfToken" value="<?php echo $key; ?>">

    <!-- Email and Password Fields -->
    <label for="email">Email address:</label>
    <input type="text" id="email" name="email" placeholder="Email address" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Password" required><br>

    <!-- Login Button -->
    <button type="submit"><img src="lock.jpg" alt="Black lock icon"> Login</button>
</form>

</body>
</html>
