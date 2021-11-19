<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $router->generate('main-home') ?>">MdJ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php $currentRoute = $_SERVER['REQUEST_URI']; ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php $active = $currentRoute ===  $router->generate('main-home') ? 'active' : '' ; echo $active; ?>">
                    <a class="nav-link" href="<?= $router->generate('main-home') ?>">Accueil</a>
                </li>
                <?php $activeGames = (str_contains($currentRoute, 'games') || str_contains($currentRoute, 'specificities') || str_contains($currentRoute, 'rules')) ? 'active' : '' ; ?>
                <li class="nav-item dropdown <?= $activeGames; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Les Jeux
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= $router->generate('game-list') ?>">Jeux</a>
                        <a class="dropdown-item" href="<?= $router->generate('specificity-list') ?>">Spécificités</a>
                        <a class="dropdown-item" href="<?= $router->generate('rule-list') ?>">Règles</a>
                    </div>
                </li>
                <?php $activeRoles = (str_contains($currentRoute, 'village-people') || str_contains($currentRoute, 'roles')) ? 'active' : '' ; ?>
                <li class="nav-item dropdown <?= $activeRoles; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Les Rôles
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= $router->generate('role-list') ?>">Rôles Cachés</a>
                        <a class="dropdown-item" href="<?= $router->generate('village-list') ?>">Le Village</a>
                    </div>
                </li>
                <li class="nav-item <?php $active = $currentRoute ===  $router->generate('card-list') ? 'active' : '' ; echo $active; ?>">
                    <a class="nav-link" href="<?= $router->generate('card-list') ?>">Nouvelle Lune</a>
                </li>
                <?php if(isset($_SESSION['connectedUser'])): ?>
                    <?php if( $_SESSION['connectedUser']->getRole() === 'admin') : ?>
                        <?php $activeUsers = (str_contains($currentRoute, 'users') || str_contains($currentRoute, 'statistics')) ? 'active' : '' ; ?>
                        <li class="nav-item dropdown <?= $activeUsers; ?>">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Les Utilisateurs
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= $router->generate('user-list') ?>">Utilisateurs</a>
                                <a class="dropdown-item" href="#">Les Statistiques</a>
                                <a class="dropdown-item" href="#">Les Badges</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $router->generate('user-logout') ?>">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Rechercher</button>
            </form> -->
        </div>
    </div>
</nav>