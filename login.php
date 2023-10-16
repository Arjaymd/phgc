<?php
session_start();

if (isset($_SESSION["user_id"])) {
    // If user is already logged in, redirect to dashboard
    header("Location: dashboard.php");
    exit();
}

require_once("db.php"); // Include your database connection

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT username, password FROM client WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $username; // Use username as a unique identifier
            header("Location: dashboard.php");
            exit();
        } else {
            $login_error = "Invalid username or password.";
        }
    } else {
        $login_error = "The credentials you entered isn't connected to an account.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <!-- Your existing HTML code -->

<div class="container">
    <div class="login-form">
    <img src="logo.png" alt="Logo">
        <h2>Login</h2>
        <?php if ($login_error !== "") { echo "<p class='error'>$login_error</p>"; } ?>
        <form method="post">
            <label for="username">Username/Email</label>
            <input type="text" name="username" id="username" placeholder="Username or Email" required><br>
            
            <label for "password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            
            <button type="submit">Login</button>
            
        </form>
        <p>Don't have an account yet? <a href="register.php">Register</a></p>
    </div>
</div>

<footer>
    &copy; PHGC. All rights reserved.
</footer>
</body>
</html>

