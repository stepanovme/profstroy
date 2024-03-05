<?php
// Подключение к базе данных
$host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
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
