<?php
session_start();

include 'db.php';
header('Content-Type: text/html; charset=WIN1251');

global $pathDB;
// ���������, ����������� �� ������ ��� ������������
if (!isset($_SESSION['userId'])) {
    // ���� ������ �� �����������, �������������� ������������ �� �������� �����
    header("Location: index.php");
    exit;
}

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("cp1251");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['userId'];

// ��������� �������� �����
if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    
    // �������� ���������� ���� � ����������, ��� ���������� ����
    $upload_dir = realpath(dirname($file_tmp_name));
    // ��������� ���������� ���� � ���������� � ��� �����
    $file_path = "E:\\Base4\\" . $file_name;

    // �������������� ������ � �������������� �������������� ���������
    $update_sql = $conn->prepare("UPDATE user SET pathBD = ? WHERE userId = ?");
    // ����������� ��������� � ��������� ������
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
    // �������� ������ �� ���������� �������
    $row = $result->fetch_assoc();
    // ���������, ��� $row �� ����� null, ������ ��� �������� �������� ������ � ��� ���������
    if ($row !== null) {
        // ��������� �������� ������� pathBD � ��������� ��� � ���������� ���������� $pathDB
        $pathDB = $row['pathBD'];
    } else {
        echo "Error: fetch_assoc returned null";
    }
} else {
    echo "0 results";
}


function insertDataIntoArtikls($ANUMB) {
    $host = $pathDB;
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
        echo "������ �����������: " . $e->getMessage();
        return false;
    }
}

$ANUMB = $_POST['ANUMB'];

if(insertDataIntoArtikls($ANUMB)) {
    echo "������ ������� ��������� � ������� Artikls";
} else {
    echo "������ ��� ���������� ������ � ������� Artikls";
}
?>
