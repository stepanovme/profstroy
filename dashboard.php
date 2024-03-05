<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css"/>
    <title>Дашборд</title>
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

            <div class="wrapper-head">
                <h1>Материальные ценности</h1>
                <div class="button-excel">
                    <button id="download-button" onclick="exportToExcel()">Скачать таблицу</button>
                    <label class="input-file">
                        <input type="file" name="file" id="file-input">
                        <span>Выберите файл</span>
                    </label>
                    <button id="update-table">Обновить таблицу</button>
                </div>
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

                    // Выполнение запроса для выбора уникальных категорий из столбца APREF
                    $categoriesQuery = $dbh->query('SELECT DISTINCT APREF FROM Artikls ORDER BY APREF ASC');
                    // Получение результатов запроса
                    $categories = $categoriesQuery->fetchAll(PDO::FETCH_COLUMN);

                    // Выполнение запроса для выбора уникальных серий из столбца ASERI
                    $seriesQuery = $dbh->query('SELECT DISTINCT ASERI FROM Artikls ORDER BY ASERI ASC');
                    // Получение результатов запроса
                    $series = $seriesQuery->fetchAll(PDO::FETCH_COLUMN);

                    echo '<form id="search-form" method="GET" action="dashboard.php">
                            <div class="search">
                                <img src="/assets/icons/search.svg" alt="">
                                <input type="text" name="search-input" id="search-input" placeholder="Поиск">
                                <select name="type" id="type-select">
                                    <option value="" selected>Тип</option>
                                    <option value="Профили">Профили</option>
                                    <option value="Аксессуары">Аксессуары</option>
                                    <option value="Погонаж">Погонаж</option>
                                    <option value="Инструменты">Инструменты</option>
                                    <option value="Заполнения">Заполнения</option>
                                </select>';

                                echo "<select name='category' id='category-select'>";
                                echo "<option value=''>Категория</option>";
                                foreach ($categories as $category) {
                                    echo "<option value='$category'>$category</option>";
                                }
                                echo "</select>";

                                echo '<select name="seri" id="seri-select">
                                    <option value="">Серия</option>';
                                foreach ($series as $seri){
                                    echo "<option value='$seri'>$seri</option>";
                                }
                                echo '</select>';

                                echo '</div>
                            <!-- Добавляем скрытое поле для передачи типа -->
                            <input type="hidden" name="type" value="">
                        </form>';

                    // Подготовка SQL запроса с учетом выбранного типа, категории и серии
                    $sql = 'SELECT a.ANUMB, a.ANAME, v.CLPRC, v.CLPR1, v.CLPR2
                            FROM Artikls a
                            JOIN ArtsVst v ON a.ANUMB = v.ANUMB';

                    // Добавляем условие для выбора типа
                    if($selectedType !== '') {
                        if($selectedType === 'Профили') {
                            $sql .= ' WHERE a.ATYPM = 1';
                        } elseif($selectedType === 'Аксессуары') {
                            $sql .= ' WHERE a.ATYPM = 2';
                        } elseif($selectedType === 'Погонаж') {
                            $sql .= ' WHERE a.ATYPM = 3';
                        } elseif($selectedType === 'Инструменты') {
                            $sql .= ' WHERE a.ATYPM = 4';
                        } elseif($selectedType === 'Заполнения') {
                            $sql .= ' WHERE a.ATYPM = 5';
                        }
                    }

                    // Добавляем условие для выбора категории
                    if($selectedCategory !== '') {
                        $sql .= " AND a.APREF = '$selectedCategory'";
                    }

                    // Добавляем условие для выбора серии
                    if($selectedSeri !== '') {
                        $sql .= " AND a.ASERI = '$selectedSeri'";
                    }

                    // Выполнение запроса к базе данных
                    $sth = $dbh->query($sql);

                    // Вывод данных в виде таблицы HTML
                    echo "<table>";
                    echo "<thead>
                            <tr>
                                <th><a href='#' id='sort-anumb'>Артикул</a></th>
                                <th><a href='#' id='sort-name'>Название</th>
                                <th><a href='#' id='sort-price'>Цена основная</th>
                                <th><a href='#' id='sort-iternal-price'>Цена внутряняя</th>
                                <th><a href='#' id='sort-external-price'>Цена внешняя</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";
                    
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['ANUMB']."</td>";
                        echo "<td>".$row['ANAME']."</td>";
                        echo "<td contenteditable='true' class='editable-cell' data-anumb='" . $row['ANUMB'] . "'>" . ($row['CLPRC'] != '0.000000' ? number_format($row['CLPRC'], 2, '.', '') : '0') . "</td>";
                        echo "<td contenteditable='true' class='editable-cell-clpr1' data-anumb='" . $row['ANUMB'] . "'>" .($row['CLPR1'] != '0.000000' ? number_format($row['CLPR1'], 2, '.', '') : '0')."</td>";
                        echo "<td contenteditable='true' class='editable-cell-clpr2' data-anumb='" . $row['ANUMB'] . "'>".($row['CLPR2'] != '0.000000' ? number_format($row['CLPR2'], 2, '.', '') : '0')."</td>";
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
    <script src="/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        //Анимация кнопки input file
        $('.input-file input[type=file]').on('change', function(){
            let file = this.files[0];
            $(this).next().html(file.name);
        });
    </script>
</body>
</html>
