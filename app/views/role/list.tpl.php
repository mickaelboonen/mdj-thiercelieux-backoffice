<a href="<?= $router->generate('role-add') ?>" class="btn btn-success float-right">Ajouter</a>
    <h2>Liste des rôles cachés</h2>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Picture</th>
                <th scope="col">Nom</th>
                <th scope="col">Excerpt</th>
                <th scope="col">Description</th>
                <th scope="col">Side</th>
                <th scope="col">Première Nuit</th>
                <th scope="col">Jeu</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($roles as $currentRole) : ?>
                <tr class="table-row">
                    <th scope="row"><?= $currentRole->getId() ?></th>
                    <td><img src="<?= $currentRole->getPicture() ?>" alt="" class="roles-picture"></td>
                    <td><?= $currentRole->getName() ?></td>
                    <td><div class="description"><?= $currentRole->getExcerpt() ?></div></td>
                    <td><div class="description"><?= $currentRole->getDescription() ?></div></td>
                    <td><?= $currentRole->getSide() ?></td>
                    <td><?php $firstNightBool = $currentRole->getFirstNight() == 0 ? 'Non' : 'Oui'; echo $firstNightBool; ?></td>
                    <td>
                        <?php foreach($games as $game) : ?>
                            <?php if ($game->getId() == $currentRole->getGameId()) { echo $game->getName(); } ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="text-right">
                        <a href="<?= $router->generate('role-edit', ['id' => $currentRole->getId()]) ?>" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= $router->generate('role-delete', ['id' => $currentRole->getId()]) . "?token=" .$token ?>">Oui, je veux supprimer</a>
                                <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>