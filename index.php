<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css"/>
    <title>�����������</title>
</head>
<body>
    <div class="auth-page">
        <img src="/assets/background/login.jpg" alt="">
        <div class="auth">
        <button class="logo">
            PROF-INTEGRATE
        </button>
        <h1>�����������</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="">
                <p>�����</p>
                <input type="text" name="login" id="login" placeholder="�����" class="login">
            </label>
            <label for="">
                <p>������</p>
                <input type="password" name="password" id="password" placeholder="������">
            </label>
            <button type="submit">�����</button>
        </form>
        <?php
        header('Content-Type: text/html; charset=WIN1251');

        include 'db.php';
        $conn = new mysqli($host, $username, $password, $dbname);
        $conn->set_charset("cp1251");

        // �������� ����������
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // ��������� ��������� ������������� ������
            $login = $_POST['login'];
            $password = $_POST['password'];

            // ����� ������������ � ���� ������
            $sql = "SELECT * FROM user WHERE login='$login' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                // ����������� �������, ������������� ������ � �������������� �� �������� � ������ � ��������
                $row = $result->fetch_assoc();
                $_SESSION['userId'] = $row['userId'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['surname'] = $row['surname'];
                header("Location: dashboard.php");
                exit;
            } else {
                // �������� ����� ��� ������
                echo "<button class='auth-error'>�������� ����� ��� ������</button>";
            }
        }

        $conn->close();
        ?>
    </div>
    </div>
</body>
</html>