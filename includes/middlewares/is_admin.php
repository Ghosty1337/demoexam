<?php
require("includes/middlewares/is_auth.php");
if ($_SESSION['user']['is_Admin'] != 1) {
    header("Location: index.php");
}
