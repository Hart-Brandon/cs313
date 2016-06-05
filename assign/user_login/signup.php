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

function valid_password($password) {
    $pass_array = str_split($password);
    
    if (count($pass_array) < 7) {
        return false;
    }
    
    if (preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password)) { 
        return true; 
    }
    
    return false;
}

if (!empty($_POST['username'])) {
    // Get the fields
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $confirm = filter_input(INPUT_POST, 'confirm');
    
    if ($password !== $confirm) {
        $error = "Both password fields must match";
    }
    else if (!valid_password($password)) {
        $error = "Password must contain at least 7 characters and at least one number";
    }
    else if (empty($password)) {
        $error = "Password can't be blank";
    }
    else {
        // Hash the password
        $hash = password_hash($password, PASSWORD_BCRYPT);

        // Insert username and hash into the database
        $query = "INSERT INTO user "
                . "(username, password)"
                . "VALUES ('$username', '$hash')";
        $db->query($query);

        // Redirect to sign-in page
        header("Location: signin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
    </head>
    
    <body>
        <h1>Sign Up</h1>
        <?php if (isset($error) && $error != ''): ?>
        <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm" placeholder="Confirm password" required><br>
            <input type="submit" value="Sign Up!">
        </form>
    </body>
</html>
