<?php
session_start();

// Predefined username and password
define('USERNAME', 'CarlBerdin');
define('PASSWORD', '123'); // In a real application, never hard-code passwords

if (isset($_POST['submit'])) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Simple authentication check
    if ($inputUsername === USERNAME && $inputPassword === PASSWORD) {
        $_SESSION['username'] = $inputUsername;
    } else {
        $error = "Invalid username or password.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: session.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Session Example</title>
</head>
<body>
    <h1>Session Example with Login</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<p>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</p>";
        echo '<a href="?logout=true">Logout</a>';
    } else {
        if (isset($error)) {
            echo "<p style='color: red;'>" . htmlspecialchars($error) . "</p>";
        }
        ?>
        <form method="post">
            <input type="text" name="username" placeholder="Enter your username" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <button type="submit" name="submit">Login</button>
        </form>
        <?php
    }
    ?>
    <br><br>
    <a href="index.php">Back to Home</a>
</body>
</html>
