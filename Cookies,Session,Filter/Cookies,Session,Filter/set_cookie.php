<?php
session_start();
if (isset($_POST['set_cookie'])) {
    setcookie("user", $_POST['username'], time() + (86400 * 30), "/"); // 86400 = 1 day
    $_SESSION['message'] = "Cookie has been set for " . $_POST['username'];
    header("Location: set_cookie.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Set Cookie</title>
</head>
<body>
    <h1>Set a Cookie</h1>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <form method="post">
        <input type="text" name="username" placeholder="Enter your name" required>
        <button type="submit" name="set_cookie">Set Cookie</button>
    </form>
    <h2>Your Cookie Value:</h2>
    <?php
    if (isset($_COOKIE['user'])) {
        echo "Hello, " . htmlspecialchars($_COOKIE['user']) . "!";
    } else {
        echo "No cookie set.";
    }
    ?>
    <br><br>
    <a href="index.php">Back to Home</a>
</body>
</html>
