<?php
$host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
$username = 'SYSDBA';
$password = 'masterkey';

try {
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $anumb = $_POST['anumb'];
    $clprc = $_POST['clprc'];
    $clpr1 = $_POST['clpr1'];
    $clpr2 = $_POST['clpr2'];

    $stmt = $dbh->prepare("UPDATE ArtsVst SET CLPRC = ?, CLPR1 = ?, CLPR2 = ? WHERE ANUMB = ?");
    $stmt->execute([$clprc, $clpr1, $clpr2, $anumb]);

    echo "success";
} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}
?>
