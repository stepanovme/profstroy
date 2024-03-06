<?php
session_start();

// Проверяем, установлена ли сессия для пользователя
if (!isset($_SESSION['userId'])) {
    // Если сессия не установлена, перенаправляем пользователя на страницу входа
    header("Location: index.php");
    exit;
}

// Выводим имя и фамилию пользователя
echo "Привет, " . $_SESSION['name'] . " " . $_SESSION['surname'];
?>
