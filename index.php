<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon/favicon.png" type="image/x-icon">
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
                    <a href="dashboard.php">��</a>
                </div>
                <div class="nav-link active">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="#">�������</a>
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
                <div class="wrapper-head">
                    <h1>������ ��������</h1>
                    <div></div>
                </div>

                <?php
                // ����������� ���������� ����
                if(isset($_GET['type'])) {
                    $selectedType = $_GET['type'];
                } else {
                    $selectedType = ''; // ���� ��� �� ������, �� ��������� ������ ������
                }

                // ����������� ��������� ���������
                if(isset($_GET['category'])) {
                    $selectedCategory = $_GET['category'];
                } else {
                    $selectedCategory = ''; // ���� ��������� �� �������, �� ��������� ������ ������
                }

                // ����������� ��������� �����
                if(isset($_GET['seri'])) {
                    $selectedSeri = $_GET['seri'];
                } else {
                    $selectedSeri = ''; // ���� ����� �� �������, �� ��������� ������ ������
                }

                // echo "Selected type: $selectedType"; // ������� ��� ������ ��� �������

                $host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
                $username = 'SYSDBA';
                $password = 'masterkey';

                try {
                    // ����������� � ���� ������ Firebird ����� PDO
                    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
                    
                    // ��������� ������ ������ PDO �� ����������
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    header('Content-Type: text/html; charset=WIN1251');

                    // ���������� SQL ������� � ������ ���������� ����, ��������� � �����
                    $sql = 'SELECT PNUMB, ZNUMB, KNAME, PDATE, POBJA, PSTAT, MNAME FROM LISTPRJ ORDER BY PNUMB ASC';

                    // ���������� ������� � ���� ������
                    $sth = $dbh->query($sql);

                    // ����� ������ � ���� ������� HTML
                    echo "<table>";
                    echo "<thead>
                            <tr>
                                <th><a href='#' id='sort-anumb'>�</a></th>
                                <th><a href='#' id='sort-name'>�����</th>
                                <th><a href='#' id='sort-price'>����������</th>
                                <th><a href='#' id='sort-iternal-price'>�����������</th>
                                <th><a href='#' id='sort-external-price'>��������</th>
                                <th><a href='#' id='sort-external-price'>������</th>
                                <th><a href='#' id='sort-external-price'>��������</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";
                    
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['PNUMB']."</td>";
                        echo "<td>".$row['ZNUMB']."</td>";
                        echo "<td>".$row['KNAME']."</td>";
                        echo "<td>".$row['PDATE']."</td>";
                        echo "<td>".$row['POBJA']."</td>";
                        echo "<td>".$row['PSTAT']."</td>";
                        echo "<td>".$row['MNAME']."</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";

                } catch (PDOException $e) {
                    // � ������ ������ ������� ���������
                    echo "������ �����������: " . $e->getMessage();
                }
            ?>


            </div>
        </div>
    </div>
</body>
</html>