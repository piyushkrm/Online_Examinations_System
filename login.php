<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM your_database WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header('Location: http://localhost/Project-K/Home/index.php');
        exit();
    } else {
        $login_error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logoo.png" />
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
<hr>
    <?php
    if (isset($login_error)) {
        echo "<p style='color: red;'>$login_error</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Enter Username....." ><br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter Password....." required><br>

        <input type="submit" class="btn1" name="login" value="Login">
    </form>
</body>
</html>