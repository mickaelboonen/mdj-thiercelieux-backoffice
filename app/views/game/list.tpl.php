<a href="<?= $router->generate('game-add') ?>" class="btn btn-success float-right">Ajouter</a>
        <h2>Liste des jeux</h2>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Hash</th>
                    <th scope="col">Description</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Specificity</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($games as $currentGame) : ?>
                    <tr>
                        <th scope="row"><?= $currentGame->getId() ?></th>
                        <td><?= $currentGame->getName() ?></td>
                        <td><?= $currentGame->getHash() ?></td>
                        <td><div class="description"><?= $currentGame->getDescription() ?></div></td>
                        <td><?= $currentGame->getPicture() ?></td>
                        <td><?= $currentGame->getIcon() ?></td>
                        <td><?= $currentGame->getSpecificity() ?></td>
                        <td class="text-right">
                            <a href="<?= $router->generate('game-edit', ['id' => $currentGame->getId()]) ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= $router->generate('game-delete', ['id' => $currentGame->getId()]) . "?token=" .$token ?>">Oui, je veux supprimer</a>
                                    <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>