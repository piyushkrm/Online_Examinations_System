<?php
include('db.php');
// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    $query = "INSERT INTO your_database (username, password) VALUES ('$newUsername', '$newPassword')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $registration_success = "Registration successful. Please log in.";
        $_SESSION['username'] = $username;
        header('Location: http://localhost/Project-K/Home/index.php');
    } else {
        $registration_error = "Registration failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logoo.png" />
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
<hr>
    <?php
    if (isset($registration_error)) {
        echo "<p style='color: red;'>$registration_error</p>";
    } elseif (isset($registration_success)) {
        echo "<p style='color: green;'>$registration_success</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="newUsername">Username:</label>
        <input type="text" name="newUsername" placeholder="Enter Username....." required><br>

        <label for="newPassword">Password:</label>
        <input type="password" name="newPassword"placeholder="Enter Password..... " required><br>

        <input type="submit" class="btn2" name="register" value="Register">
    </form>
</body>
</html>