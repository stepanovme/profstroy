<?php
// Получаем данные из POST-запроса
$articleNumber = $_POST['articleNumber'];
$newValue = $_POST['newValue'];

// Подключение к базе данных и выполнение обновления цены
try {
    $host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
    $username = 'SYSDBA';
    $password = 'masterkey';

    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare('UPDATE Artikls SET CLPRV = :newValue WHERE ANUMB = :articleNumber');
    $stmt->bindParam(':newValue', $newValue);
    $stmt->bindParam(':articleNumber', $articleNumber);
    $stmt->execute();

    echo 'Цена успешно обновлена';
} catch (PDOException $e) {
    echo 'Ошибка обновления цены: ' . $e->getMessage();
}
?>
