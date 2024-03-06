<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css"/>
    <title>Проекты</title>
</head>
<body>
    <div class="page">
        <div class="side">
            <button class="logo">
                PROF-INTEGRATE
            </button>
            <div class="nav">
                <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                <div class="nav-link">
                    <img src="/assets/icons/dashbord-icon.svg" alt="">
                    <a href="dashboard.php">МЦ</a>
                </div>
                <div class="nav-link active">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="#">Проекты</a>
                </div>
            </div>
        </div>

        <div class="content">
            <header>
                <div class="profile">
                    <img src="/assets/icons/avatar.svg" class="avatar">
                    <div class="information">
                        <p class="name">Денис Кузнецов</p>
                        <p class="role">Администратор</p>
                    </div>
                </div>
            </header>

            <div class="wrapper">
                <div class="wrapper-head">
                    <h1>Список проектов</h1>
                    <div></div>
                </div>

                <?php
                // Определение выбранного типа
                if(isset($_GET['type'])) {
                    $selectedType = $_GET['type'];
                } else {
                    $selectedType = ''; // Если тип не выбран, по умолчанию пустая строка
                }

                // Определение выбранной категории
                if(isset($_GET['category'])) {
                    $selectedCategory = $_GET['category'];
                } else {
                    $selectedCategory = ''; // Если категория не выбрана, по умолчанию пустая строка
                }

                // Определение выбранной серии
                if(isset($_GET['seri'])) {
                    $selectedSeri = $_GET['seri'];
                } else {
                    $selectedSeri = ''; // Если серия не выбрана, по умолчанию пустая строка
                }

                // echo "Selected type: $selectedType"; // Добавим эту строку для отладки

                $host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
                $username = 'SYSDBA';
                $password = 'masterkey';

                try {
                    // Подключение к базе данных Firebird через PDO
                    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
                    
                    // Установка режима ошибок PDO на исключения
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    header('Content-Type: text/html; charset=WIN1251');

                    // Подготовка SQL запроса с учетом выбранного типа, категории и серии
                    $sql = 'SELECT PNUMB, ZNUMB, KNAME, PDATE, POBJA, PSTAT, MNAME FROM LISTPRJ ORDER BY PNUMB ASC';

                    // Выполнение запроса к базе данных
                    $sth = $dbh->query($sql);

                    // Вывод данных в виде таблицы HTML
                    echo "<table>";
                    echo "<thead>
                            <tr>
                                <th><a href='#' id='sort-anumb'>№</a></th>
                                <th><a href='#' id='sort-name'>Заказ</th>
                                <th><a href='#' id='sort-price'>Контрагент</th>
                                <th><a href='#' id='sort-iternal-price'>Регистрация</th>
                                <th><a href='#' id='sort-external-price'>Описание</th>
                                <th><a href='#' id='sort-external-price'>Статус</th>
                                <th><a href='#' id='sort-external-price'>Менеджер</th>
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
                    // В случае ошибки выводим сообщение
                    echo "Ошибка подключения: " . $e->getMessage();
                }
            ?>


            </div>
        </div>
    </div>
</body>
</html>