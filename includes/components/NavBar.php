<nav class="navbar navbar-expand-lg bg-light mb-5">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bolder" href="#">нарушений.нет</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a aria-current="page" href="index.php" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/index.php' ? 'active' : ''; ?>">Мои заявления</a>
                </li>
                <li class="nav-item">
                    <a href="request.php" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/request.php' ? 'active' : ''; ?>">Подать заявление</a>
                </li>
            </ul>
            <div class="d-flex gap-3 flex-lg-row flex-column">
                <?php
                session_start();
                if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['is_Admin'] == 1) {
                        echo '<a href="admin_panel.php" class="w-100 btn btn-outline-primary">Панель</a>';
                    }
                    echo '<div class="text-uppercase btn btn-outline-primary">' . $_SESSION['user']['phone'] . '</div>';
                    echo '<a href="logout.php" class="w-100 btn btn-outline-danger">Выйти</a>';
                } else {
                    echo '<a href="login.php" class="w-100 btn btn-outline-primary">Авторизоваться</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>