<?php
require("includes/models/User.php");
require("includes/db/db.php");
session_start();
$temp_data = [
    "login" => '',
    "fcs" => '',
    "password" => '',
    "confirm_password" => '',
    "phone" => '',
    "email" => '',
];
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}
if (isset($_POST['login']) && isset($_POST['fcs']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['phone']) && isset($_POST['email'])) {
    $temp_data["login"] = $_POST['login'];
    $temp_data["fcs"] = $_POST['fcs'];
    $temp_data["password"] = $_POST['password'];
    $temp_data["confirm_password"] = $_POST['confirm_password'];
    $temp_data["phone"] = $_POST['phone'];
    $temp_data["email"] = $_POST['email'];
    if ($_POST['password'] == $_POST['confirm_password']) {
        if (preg_match("/[А-Яа-я]/", $_POST['login'])) {
            $temp_data['login'] = '';
            echo "<script>alert('Логин не должен содержать кириллицу!')</script>";
        } else {
            $user = new User($_POST['login'], $_POST['password'], $_POST['fcs'], trim($_POST['phone']), $_POST['email']);
            if ($user->signUp($db)) {
                $temp_data = array_fill_keys(array_keys($temp_data), '');
                header("Location: login.php");
            } else {
                $temp_data['login'] = '';
                $temp_data['email'] = '';
                echo "<script>alert('Пользователь с таким логином или почтой существует!')</script>";
            }
        }
    } else {
        $temp_data['confirm_password'] = '';
        echo "<script>alert('Пароли различаются!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Регистрация</title>
</head>

<body>
    <? require("includes/components/NavBar.php") ?>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="card w-50 align-self-center shadow">
            <form action="register.php" method="POST" class="py-3">
                <legend class="text-center text-uppercase fw-bold mb-4">Регистрация</legend>
                <fieldset class="d-flex flex-column">
                    <div class="mb-3 w-75 align-self-center">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" aria-describedby="login" name="login" placeholder="Введите логин" required value="<?= $temp_data["login"] ?>">
                    </div>
                    <div class="mb-3 w-75 align-self-center">
                        <label for="fcs" class="form-label">ФИО</label>
                        <input type="text" class="form-control" id="fcs" aria-describedby="fcs" name="fcs" placeholder="Введите ФИО" required value="<?= $temp_data["fcs"] ?>">
                    </div>
                    <div class="mb-3 w-75 align-self-center">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" aria-describedby="password" minlength="6" name="password" placeholder="Введите пароль" required value="<?= $temp_data["password"] ?>">
                    </div>
                    <div class="mb-3 w-75 align-self-center">
                        <label for="confirm_password" class="form-label">Повторный пароль</label>
                        <input type="password" class="form-control" id="confirm_password" aria-describedby="confirm_password" minlength="6" name="confirm_password" placeholder="Повторите пароль" required value="<?= $temp_data["confirm_password"] ?>">
                    </div>
                    <div class="mb-3 w-75 align-self-center">
                        <label for="phone" class="form-label">Номер телефона</label>
                        <input type="tel" class="form-control" id="phone" aria-describedby="phone" name="phone" placeholder="Введите номер телефона" required value="<?= $temp_data["phone"] ?>">
                    </div>
                    <div class="mb-4 w-75 align-self-center">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" name="email" placeholder="Введите электронную почту" required value="<?= $temp_data["email"] ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-primary w-75 align-self-center">Зарегистрироваться</button>
                    <div class="mt-4 align-self-center d-flex flex-column w-75">
                        <p class="d-flex flex-column w-100 text-end">Уже зарегистрированы?<a href="login.php">Войти в систему</a></p>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <? require("includes/components/Footer.php") ?>
</body>
<script src="assets/js/app.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>