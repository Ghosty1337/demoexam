<?php
require("config.php");
try {
    $db = new PDO('mysql:host=' . $DATABASE["host"] . ';dbname=' . $DATABASE["dbname"] . '', $DATABASE["username"], $DATABASE["password"]);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
