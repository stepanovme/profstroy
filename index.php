<?php
$host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
$username = 'SYSDBA';
$password = 'masterkey';

try {
    // ����������� � ���� ������ Firebird ����� PDO
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    
    // ��������� ������ ������ PDO �� ����������
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    header('Content-Type: text/html; charset=WIN1251');

} catch (PDOException $e) {
    // � ������ ������ ������� ���������
    echo "������ �����������: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css"/>
    <title>�������</title>
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
                    <a href="dashboard.php">�������</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="report.php">�����</a>
                </div>
            </div>
        </div>

        <div class="content">
            <header>
                <div class="profile">
                    <img src="/assets/icons/avatar.svg" class="avatar">
                    <div class="information">
                        <p class="name">����� ��������</p>
                        <p class="role">�������������</p>
                    </div>
                </div>
            </header>

            <div class="wrapper">
            


            </div>
        </div>
    </div>
</body>
</html>