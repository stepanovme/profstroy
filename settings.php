<?php
session_start();

include 'db.php';
header('Content-Type: text/html; charset=WIN1251');

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

if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit;
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

    // ���������� ���� � ���� ������
    $update_sql = "UPDATE user SET pathBD = '$file_path' WHERE userId = '$userId'";
    $conn->query($update_sql);

    echo $file_path;
}

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css"/>
    <title>��</title>
</head>
<body>
    <div class="page">
        <div class="side">
            <button class="logo">
                PROF-INTEGRATE
            </button>
            <div class="nav">
                <p class="side-title">������� ����</p>
                <div class="nav-link">
                    <img src="/assets/icons/dashbord-icon.svg" alt="">
                    <a href="dashboard.php">��</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="#">�������</a>
                </div>
                <div class="nav-link active">
                    <img src="/assets/icons/gear.svg" alt="">
                    <a href="settings.php">���������</a>
                </div>
            </div>
        </div>

        <div class="content">
            <header>
                <div class="profile">
                    <img src="/assets/icons/avatar.svg" class="avatar">
                    <div class="information">
                        <p class="name"><?php echo $_SESSION['name'] . " " . $_SESSION['surname'];?></p>
                        <p class="role">
                        <?php
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['roleName'];
                        } else {
                            echo "������������ �� ������.";
                        }
                        ?>
                        </p>
                    </div>
                </div>
            </header>
            <div class="wrapper">
                <div class="wrapper-head">
                    <h1>���������</h1>
                    <div></div>
                </div>
                <div class="setting">
                    <div class="link-db">
                        <div class="data">
                            <p>���� ������:</p>
                            <div class="file-path">
                                <p id="file-path-text">����</p>
                            </div>
                        </div>
                        <div class="buttons">
                            <form method="post" enctype="multipart/form-data">
                                <input type="file" id="file-input" name="file">
                                <button id="submit-button" type="submit">���������</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/settings.js"></script>
</body>
</html>