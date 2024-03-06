<?php
include 'db.php';

session_start();
try {
    // Подключение к базе данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Установка режима обработки ошибок для PDO на исключения
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Проверяем, была ли отправлена форма
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Проверяем, совпадают ли введенные логин и пароль с ожидаемыми значениями
        $expected_login = "ожидаемый_логин";
        $expected_password = "ожидаемый_пароль";

        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($login === $expected_login && $password === $expected_password) {
            // Успешная аутентификация
            $_SESSION['logged_in'] = true;
            // Здесь можно сохранить другие данные пользователя в сессии, если это необходимо
            // Например: $_SESSION['user_id'] = $user_id;
            
            // Перенаправляем пользователя на защищенную страницу
            header("Location: protected_page.php");
            exit;
        } else {
            // Неверный логин или пароль
            $error_message = "Неверный логин или пароль";
        }
    }
    
} catch (PDOException $e) {
    // В случае ошибки выводим сообщение
    echo 'Ошибка подключения к базе данных: ' . $e->getMessage();
    // Или можно записать лог ошибки в файл
    // error_log('Ошибка подключения к базе данных: ' . $e->getMessage(), 3, 'error.log');
}
?>