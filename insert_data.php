<?php

function insertDataIntoArtikls($ANUMB) {
    $host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
    $username = 'SYSDBA';
    $password = 'masterkey';

    try {
        $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
        
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO Artikls (ANUMB) VALUES (:ANUMB)";
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':ANUMB', $ANUMB);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo "Ошибка подключения: " . $e->getMessage();
        return false;
    }
}

$ANUMB = $_POST['ANUMB'];

if(insertDataIntoArtikls($ANUMB)) {
    echo "Данные успешно добавлены в таблицу Artikls";
} else {
    echo "Ошибка при добавлении данных в таблицу Artikls";
}
?>
