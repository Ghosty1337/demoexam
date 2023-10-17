<?php
require("includes/middlewares/is_auth.php");
require("includes/db/db.php");
require("includes/models/User.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Нарушений.нет</title>
</head>

<body>
    <? require("includes/components/NavBar.php") ?>
    <div class="container mt-3 mb-3 d-flex gap-5 flex-lg-row flex-column">
        <div class="w-75 d-flex flex-column">
            <?php
            require("includes/components/RequestsList.php");
            ?>
        </div>
        <div>
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

</html>