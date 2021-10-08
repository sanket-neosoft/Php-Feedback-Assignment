<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-warning mr-3"><i class="bi bi-list"></i></button>
    <!-- logo -->
    <a href="?p=home"><img src="https://uilogos.co/img/logotype/hexa.png" class="nav-logo logo" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        if (empty($user)) {
        ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3">
                    <a href="#" class="nav-link">Register</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="?p=login" class="btn btn-warning my-2 my-sm-0">Login</a>
                </li>
            </ul>
        <?php
        } else {
        ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3">
                    <a class="nav-link">Welcome: <?php echo $user; ?></a>
                </li>
                <li class="nav-item ml-3">
                    <a class="btn btn-warning my-2 my-sm-0" href="logout.php">Log out</a>
                </li>
            </ul>
        <?php
        }
        ?>

    </div>
</nav>