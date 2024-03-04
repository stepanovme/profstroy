<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css"/>
    <title>Главная</title>
</head>
<body>
    <div class="page">
        <div class="side">
            <button class="logo">
                PROF-INTEGRATE
            </button>
            <div class="nav">
                <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                <div class="nav-link active">
                    <img src="/assets/icons/dashbord-icon.svg" alt="">
                    <a href="dashboard.php">Дашборд</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="report.php">Отчёт</a>
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

            <div class="search">
                <img src="/assets/icons/search.svg" alt="">
                <input type="text" name="" id="" placeholder="Поиск">
                <select name="" id="">
                    <option value="" selected disabled>Тип</option>
                </select>
                <select name="" id="">
                    <option value="" selected disabled>Категория</option>
                </select>
                <select name="" id="">
                    <option value="" selected disabled>Серия</option>
                </select>
            </div>

            <?php
            $host = 'C:\ospanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
            $username = 'SYSDBA';
            $password = 'masterkey';

            try {
                // Подключение к базе данных Firebird через PDO
                $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
                
                // Установка режима ошибок PDO на исключения
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                header('Content-Type: text/html; charset=WIN1251');

                // Выполнение запроса к базе данных
                $sth = $dbh->query('SELECT a.ANUMB, a.ANAME, v.CLPRV, v.CLPR1, v.CLPR2
                                    FROM Artikls a
                                    JOIN ArtsVst v ON a.ANUMB = v.ANUMB;');

                // Вывод данных в виде таблицы HTML
                echo "<table>";
                echo "<thead>
                        <tr>
                            <th>Артикул</th>
                            <th>Название</th>
                            <th>Цена основная</th>
                            <th>Цена основная</th>
                            <th>Цена основная</th>
                        </tr>
                    </thead>";
                echo "<tbody>";
                
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['ANUMB']."</td>";
                    echo "<td>".$row['ANAME']."</td>";
                    echo "<td>".$row['CLPRV']."</td>";
                    echo "<td>".$row['CLPR1']."</td>";
                    echo "<td>".$row['CLPR2']."</td>";
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