
<?php
$host = 'your-rds-endpoint.amazonaws.com';
$db   = 'login_db';
$user = 'admin';
$pass = 'yourpassword123';
$charset = 'utf8mb4';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = md5($_POST['password']); // Not secure for production use

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    echo "<h2>Welcome, $username!</h2>";
} else {
    echo "<h3>Login failed. Invalid credentials.</h3>";
}

$conn->close();
?>
