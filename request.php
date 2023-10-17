<?php
require("includes/middlewares/is_auth.php");
require_once("includes/models/Request.php");
require("includes/db/db.php");
mb_internal_encoding('UTF-8');
setlocale(LC_CTYPE, 'ru_RU');
if (isset($_POST['state_number']) && isset($_POST['description'])) {
    $request = new Request($_SESSION['user']['id'], 1, mb_strtoupper($_POST['state_number']), $_POST['description']);
    $request->createRequest($db);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Подать заявление</title>
</head>

<body>
    <? require("includes/components/NavBar.php") ?>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="w-50 align-self-center">
            <?php
            require("includes/components/RequestForm.php");
            ?>
        </div>
    </div>
    <? require("includes/components/Footer.php") ?>
</body>
<script src="assets/js/app.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>

</html>