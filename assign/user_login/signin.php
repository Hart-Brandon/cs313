<?php
$dsn = 'mysql:host=localhost;dbname=cs313';
$username = 'php';
$password = 'pass123';
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // other options 
);
$db = null;

try {
    $db = new PDO($dsn, $username, $password, $opt);
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    exit();
}

$lifetime = 3600 * 24 * 365;
session_set_cookie_params($lifetime, '/');
session_start();

if (!empty($_POST['username'])) {
    // Get the username and password
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    
    // Check if password is correct
    $query = "SELECT id, password FROM user WHERE username = '$username'";
    $user_info = $db->query($query)->fetch();
    
    if (password_verify($password, $user_info['password'])) {
        $_SESSION['user_id'] = $user_info['id'];
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
    </head>
    
    <body>
        <h1>Sign In</h1>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Sign In">
        </form><br>
        <a href="signup.php">Sign Up</a>
    </body>
</html>
