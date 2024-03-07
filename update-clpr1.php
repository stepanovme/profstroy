<?php
session_start();

include 'db.php';
header('Content-Type: text/html; charset=WIN1251');

global $pathDB;
// Проверяем, установлена ли сессия для пользователя
if (!isset($_SESSION['userId'])) {
    // Если сессия не установлена, перенаправляем пользователя на страницу входа
    header("Location: index.php");
    exit;
}

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("cp1251");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['userId'];

// Обработка загрузки файла
if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    
    // Получаем абсолютный путь к директории, где расположен файл
    $upload_dir = realpath(dirname($file_tmp_name));
    // Соединяем абсолютный путь к директории и имя файла
    $file_path = "E:\\Base4\\" . $file_name;

    // Подготавливаем запрос с использованием подготовленных выражений
    $update_sql = $conn->prepare("UPDATE user SET pathBD = ? WHERE userId = ?");
    // Привязываем параметры и выполняем запрос
    $update_sql->bind_param("si", $file_path, $userId);
    $update_sql->execute();
    $update_sql->close();
}

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Получаем данные из результата запроса
    $row = $result->fetch_assoc();
    // Проверяем, что $row не равен null, прежде чем пытаться получить доступ к его элементам
    if ($row !== null) {
        // Извлекаем значение столбца pathBD и сохраняем его в глобальной переменной $pathDB
        $pathDB = $row['pathBD'];
    } else {
        echo "Error: fetch_assoc returned null";
    }
} else {
    echo "0 results";
}

// Подключение к базе данных
$host = $pathDB;
$username = 'SYSDBA';
$password = 'masterkey';

try {
    // Подключение к базе данных Firebird через PDO
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    // Установка режима ошибок PDO на исключения
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получение данных из запроса
    $anumb = $_POST['anumb'];
    $newValue = $_POST['newValue'];

    // Выполнение SQL-скрипта обновления
    $sql = "UPDATE ArtsVst SET CLPR1 = :newValue WHERE ANUMB = :anumb";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':newValue', $newValue, PDO::PARAM_STR);
    $stmt->bindParam(':anumb', $anumb, PDO::PARAM_STR);
    $stmt->execute();

    echo 'Данные успешно обновлены';
} catch (PDOException $e) {
    // В случае ошибки выводим сообщение
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}
?>
