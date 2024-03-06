<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profstroy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['userId'];

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Привет, " . $row['name'] . " " . $row['surname'] . "! Ваша роль: " . $row['roleName'];
} else {
    echo "Пользователь не найден.";
}

$conn->close();
?>
