<?php
session_start();
$filtered_input = '';
$valid_inputs = ['apple', 'banana', 'orange']; // Define valid inputs
$input_status = ''; // Variable to hold the validity message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw user input
    $user_input = $_POST['user_input'];

    // Sanitize the input using htmlspecialchars
    $filtered_input = htmlspecialchars($user_input, ENT_QUOTES, 'UTF-8');

    // Check if the filtered input is valid
    if (in_array($filtered_input, $valid_inputs)) {
        $input_status = "Valid input.";
    } else {
        $input_status = "Invalid input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Input Filtering</title>
</head>
<body>
    <h1>Input Filtering Example</h1>
    <form method="post">
        <input type="text" name="user_input" placeholder="Enter something" required>
        <button type="submit">Submit</button>
    </form>

    <!-- Displaying the filtered input and validity message -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Filtered Input:</h2>
        <p><?php echo $filtered_input; ?></p> <!-- Display the filtered input -->
        <p><?php echo $input_status; ?></p> <!-- Display input validity -->
    <?php endif; ?>

    <h2>Valid Inputs:</h2>
    <ul>
        <?php foreach ($valid_inputs as $input): ?>
            <li><?php echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8'); ?></li> <!-- Display each valid input -->
        <?php endforeach; ?>
    </ul>
    
    <br><br>
    <a href="index.php">Back to Home</a>
</body>
</html>
