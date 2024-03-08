<?php
session_start();

include 'db.php';
header('Content-Type: text/html; charset=WIN1251');

// ��������� ���������� $pathDB ����������
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

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // �������� ������ �� ���������� �������
    $row = $result->fetch_assoc();
    // ��������� �������� ������� pathBD � ��������� ��� � ���������� ���������� $pathDB
    $pathDB = $row['pathBD'];
} else {
    echo "0 results";
}
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
                <div class="nav-link active">
                    <img src="/assets/icons/dashbord-icon.svg" alt="">
                    <a href="dashboard.php">��</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="#">�������</a>
                </div>
                <div class="nav-link">
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
                        if($_SESSION['roleId'] = 2){
                            echo '�������������';
                        } else {
                            echo '������������';
                        }
                       /* if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['roleName'];
                        } else {
                            echo "������������ �� ������.";
                        } */
                        ?>
                        </p>
                    </div>
                </div>
            </header>

            <div class="wrapper">

            <div class="wrapper-head">
                <h1>������������ ��������</h1>
                <div class="button-excel">
                    <button id="download-button" onclick="exportToExcel()">������� �������</button>
                    <label class="input-file">
                        <input type="file" name="file" id="file-input">
                        <span>�������� ����</span>
                    </label>
                    <button id="update-table">�������� �������</button>
                </div>
            </div>

            <?php
                if(isset($_GET['type'])) {
                    $selectedType = $_GET['type'];
                } else {
                    $selectedType = ''; 
                }

                if(isset($_GET['category'])) {
                    $selectedCategory = $_GET['category'];
                } else {
                    $selectedCategory = '';
                }

                if(isset($_GET['seri'])) {
                    $selectedSeri = $_GET['seri'];
                } else {
                    $selectedSeri = '';
                }


                $host = $pathDB;
                $username = 'SYSDBA';
                $password = 'masterkey';

                try {
                    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
                    
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    header('Content-Type: text/html; charset=WIN1251');

                    $categoriesQuery = $dbh->query('SELECT DISTINCT APREF FROM Artikls ORDER BY APREF ASC');
                    $categories = $categoriesQuery->fetchAll(PDO::FETCH_COLUMN);

                    $seriesQuery = $dbh->query('SELECT DISTINCT ASERI FROM Artikls ORDER BY ASERI ASC');
                    $series = $seriesQuery->fetchAll(PDO::FETCH_COLUMN);

                    echo '<form id="search-form" method="GET" action="dashboard.php">
                            <div class="search">
                                <img src="/assets/icons/search.svg" alt="">
                                <input type="text" name="search-input" id="search-input" placeholder="�����">
                                <select name="type" id="type-select">
                                    <option value="" selected>���</option>
                                    <option value="�������">�������</option>
                                    <option value="����������">����������</option>
                                    <option value="�������">�������</option>
                                    <option value="�����������">�����������</option>
                                    <option value="����������">����������</option>
                                </select>';

                                echo "<select name='category' id='category-select'>";
                                echo "<option value=''>���������</option>";
                                foreach ($categories as $category) {
                                    echo "<option value='$category'>$category</option>";
                                }
                                echo "</select>";

                                echo '<select name="seri" id="seri-select">
                                    <option value="">�����</option>';
                                foreach ($series as $seri){
                                    echo "<option value='$seri'>$seri</option>";
                                }
                                echo '</select>';

                                echo '</div>
                            <input type="hidden" name="type" value="">
                        </form>';

                    $sql = 'SELECT a.ANUMB, a.ANAME, v.CLPRC, v.CLPR1, v.CLPR2, cl.CNAME, v.CLNUM
                                                    FROM Artikls a
                                                    JOIN ArtsVst v ON a.ANUMB = v.ANUMB
                                                    JOIN ColsLst cl ON v.CLNUM = cl.CNUMB';

                    if($selectedType !== '') {
                        if($selectedType === '�������') {
                            $sql .= ' WHERE a.ATYPM = 1';
                        } elseif($selectedType === '����������') {
                            $sql .= ' WHERE a.ATYPM = 2';
                        } elseif($selectedType === '�������') {
                            $sql .= ' WHERE a.ATYPM = 3';
                        } elseif($selectedType === '�����������') {
                            $sql .= ' WHERE a.ATYPM = 4';
                        } elseif($selectedType === '����������') {
                            $sql .= ' WHERE a.ATYPM = 5';
                        }
                    }

                    if($selectedCategory !== '') {
                        $sql .= " AND a.APREF = '$selectedCategory'";
                    }

                    if($selectedSeri !== '') {
                        $sql .= " AND a.ASERI = '$selectedSeri'";
                    }

                    $sth = $dbh->query($sql);

                    echo "<table>";
                    echo "<thead>
                            <tr>
                                <th><a href='#' id='sort-anumb'>�������</a></th>
                                <th><a href='#' id='sort-name'>��������</th>
                                <th><a href='#' id='sort-color'>����</th>
                                <th><a href='#' id='sort-price'>���� ��������</th>
                                <th><a href='#' id='sort-iternal-price'>���� ���������</th>
                                <th><a href='#' id='sort-external-price'>���� �������</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";
                    
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['ANUMB']."</td>";
                        echo "<td>".$row['ANAME']."</td>";
                        echo "<td>".$row['CNAME']."</td>";
                        echo "<td contenteditable='true' class='editable-cell' data-anumb='" . $row['ANUMB'] . "' data-clnum='" . $row['CLNUM'] . "'>" . ($row['CLPRC'] != '0.000000' ? number_format($row['CLPRC'], 2, '.', '') : '0') . "</td>";
                        echo "<td contenteditable='true' class='editable-cell-clpr1' data-anumb='" . $row['ANUMB'] . "' data-clnum='" . $row['CLNUM'] . "'>" .($row['CLPR1'] != '0.000000' ? number_format($row['CLPR1'], 2, '.', '') : '0')."</td>";
                        echo "<td contenteditable='true' class='editable-cell-clpr2' data-anumb='" . $row['ANUMB'] . "' data-clnum='" . $row['CLNUM'] . "'>".($row['CLPR2'] != '0.000000' ? number_format($row['CLPR2'], 2, '.', '') : '0')."</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";

                } catch (PDOException $e) {
                    echo "������ ����������: " . $e->getMessage();
                }
            ?>

            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
    <script src="/js/jquery.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>
