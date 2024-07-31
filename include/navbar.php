<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$page = $components[2];
?>

<nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">CRUD System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                if (!$user->is_loggedin()) {
                ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link <?php if ($page == 'login.php') echo 'active' ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link <?php if ($page == 'register.php') echo 'active' ?>">Register</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a href="user.php" class="nav-link <?php if ($page == 'user.php') echo 'active' ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php?logout=true" class="nav-link">Logout</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>