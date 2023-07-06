<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <?php if (!isset($_SESSION['login'])) : ?>
            <a class="navbar-brand d-flex" href="<?= BASEURL ?>/">
                <img src="<?= BASEURL ?>/public/img/pertamini.png" alt="Logo" width="70" class="d-inline-block align-text-top">
                <div class="d-flex align-items-end sans fw-bold">
                    Pertamini Digital
                </div>
            </a>
        <?php else : ?>
            <a class="navbar-brand d-flex" href="<?= BASEURL ?>/dashboard">
                <img src="<?= BASEURL ?>/public/img/pertamini.png" alt="Logo" width="70" class="d-inline-block align-text-top">
                <div class="d-flex align-items-end sans fw-bold">
                    Pertamini Digital
                </div>
            </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (!isset($_SESSION['login'])) : ?>
                    <li class="nav-item bg-danger mt-3 mt-lg-0 mx-1 rounded-top-bottom px-3">
                        <a class="nav-link text-white p-3" href="<?= BASEURL ?>/">Login</a>
                    </li>
                    <li class="nav-item bg-danger mx-1 rounded-top-bottom px-3">
                        <a class="nav-link text-white p-3" href="<?= BASEURL ?>/register">Register</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['login'])) : ?>
                    <li class="nav-item bg-danger mt-3 mt-lg-0 mx-1 rounded-top-bottom px-2">
                        <a class="nav-link text-white p-3" href="<?= BASEURL ?>/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item bg-danger mx-1 rounded-top-bottom px-2">
                        <a class="nav-link text-white p-3" href="<?= BASEURL ?>/profile">Profile</a>
                    </li>
                    <li class="nav-item bg-danger mx-1 rounded-top-bottom px-2">
                        <a class="nav-link text-white p-3" href="<?= BASEURL ?>/pembelian">Pembelian</a>
                    </li>
                    <li class="nav-item bg-danger mx-1 rounded-top-bottom px-2">
                        <a class="nav-link text-white p-3" href="<?= BASEURL ?>/login/logout" id="logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>