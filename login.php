<?php
require("includes/models/User.php");
require("includes/db/db.php");
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}
if (isset($_POST['login']) && isset($_POST['password'])) {
    $user = User::signIn($_POST['login'], $_POST['password'], $db);
    if (!isset($user['id'])) {
        echo "<script>alert('" . $user . "')</script>";
    } else {
        $_SESSION['user'] = $user;
        header("Location: index.php");
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
    <title>Авторизация</title>
</head>

<body>
    <? require("includes/components/NavBar.php") ?>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="card w-50 align-self-center shadow">
            <form action="login.php" method="POST" class="py-3">
                <legend class="text-center text-uppercase fw-bold mb-4">Авторизация</legend>
                <fieldset class="d-flex flex-column">
                    <div class="mb-3 w-75 align-self-center">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" aria-describedby="login" name="login" placeholder="Введите логин" required>
                    </div>
                    <div class="mb-4 w-75 align-self-center">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" aria-describedby="password" name="password" placeholder="Введите пароль" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary w-75 align-self-center">Войти</button>
                    <div class="mt-4 align-self-center d-flex flex-column w-75">
                        <p class="d-flex flex-column w-100 text-end">Ещё не зарегистрировались?<a href="register.php">Создать аккаунт</a></p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>

</html>