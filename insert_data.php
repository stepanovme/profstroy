<?php

function insertDataIntoArtikls($ANUMB) {
    $host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
    $username = 'SYSDBA';
    $password = 'masterkey';

    try {
        // Подключение к базе данных Firebird через PDO с указанием кодировки UTF-8
        $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
        
        // Установка режима ошибок PDO на исключения
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Подготовка SQL запроса для добавления данных в базу данных
        $sql = "INSERT INTO Artikls (ANUMB) VALUES (:ANUMB)";
        $stmt = $dbh->prepare($sql);

        // Привязка параметров и выполнение запроса
        $stmt->bindParam(':ANUMB', $ANUMB);
        $stmt->execute();

        return true; // Вернем true в случае успешного добавления данных

    } catch (PDOException $e) {
        // В случае ошибки выводим сообщение
        echo "Ошибка подключения: " . $e->getMessage();
        return false; // Вернем false в случае ошибки
    }
}

// Получение данных из формы
$ANUMB = $_POST['ANUMB'];

// Вызов функции для добавления данных в таблицу
if(insertDataIntoArtikls($ANUMB)) {
    echo "Данные успешно добавлены в таблицу Artikls";
} else {
    echo "Ошибка при добавлении данных в таблицу Artikls";
}
?>
