<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css"/>
    <title>Настройки</title>
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
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="#">Проекты</a>
                </div>
                <div class="nav-link active">
                    <img src="/assets/icons/gear.svg" alt="">
                    <a href="settings.php">Настройки</a>
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
                    <h1>Настройки</h1>
                    <div></div>
                </div>

                <div class="setting">
                <div class="link-db">
                    <div class="data">
                        <p>База данных:</p>
                        <div class="file-path">
                            <p id="file-path-text">Путь</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <input type="file" id="file-input" name="">
                        <button id="submit-button" type="submit">Применить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/settings.js"></script>
</body>
</html>