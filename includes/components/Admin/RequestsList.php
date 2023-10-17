<?php
require("includes/db/db.php");
require_once("includes/models/Request.php");

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$itemsPerPage = 10;
$offset = ($page - 1) * $itemsPerPage;
$totalItems = $db->query("SELECT COUNT(*) FROM request")->fetch();
$totalPages = ceil($totalItems["COUNT(*)"] / $itemsPerPage);
$status = [
    1 => "text-primary",
    2 => "text-success",
    3 => "text-danger",
];

$requests = Request::getAll($db, $itemsPerPage, $offset);
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Номер</th>
            <th scope="col" class="w-25">Заявление</th>
            <th scope="col">Номер</th>
            <th scope="col">ФИО</th>
            <th scope="col">Дата</th>
            <th scope="col">Статус</th>
            <th scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requests as $req) : ?>
            <tr>
                <th scope="row">№ <?= $req["id"] ?></th>
                <td><?= $req["description"] ?></td>
                <td><?= $req["number"] ?></td>
                <td><?= $req["fcs"] ?></td>
                <td><?= $req["timestamp"] ?></td>
                <td class="fw-bold <?= $status[$req["status_id"]] ?>"><?= $req["name"] ?></td>
                <td><a class="btn btn-outline-danger" href="admin_panel.php?id=<?= $req['id'] ?>&action=deny">Отклонить</a></td>
                <td><a class="btn btn-outline-success" href="admin_panel.php?id=<?= $req['id'] ?>&action=accept">Подтвердить</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav aria-label="Page navigation example" id="pagination" class="mt-3">
    <ul class="pagination justify-content-center">
        <?php
        if ($page > 1) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Назад</a></li>';
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($i == $page) ? 'active' : '';

            echo '<li class="page-item ' . $activeClass . '">';
            echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
            echo '</li>';
        }
        if ($page < $totalPages) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Вперед</a></li>';
        }
        ?>
    </ul>
</nav>