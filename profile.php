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


<div class="wrapper">
    <div class="wrapper-head">
        <h1>Настройки</h1>
        <div></div>
    </div>
    <div class="setting">
    <div class="link-db">
        <div class="data">
            <p>База данных:</p>
            <div class="file-path">
                <p id="file-path-text">Путь</p>
            </div>
        </div>
        <div class="buttons">
            <input type="file" id="file-input" name="">
            <button id="submit-button" type="submit">Применить</button>
        </div>
    </div>
</div>