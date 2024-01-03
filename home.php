<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logoo.png" />
    <title>Welcome to Home</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <!-- Include content for the home page -->
</body>
</html>