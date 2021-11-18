<a href="<?= $router->generate('card-add') ?>" class="btn btn-success float-right">Ajouter</a>
        <h2>Liste des cartes Nouvelle Lune</h2>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Phase</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cards as $currentCard) : ?>
                    <tr class="table-row">
                        <th scope="row"><?= $currentCard->getId() ?></th>
                        <td><img src="<?= $currentCard->getPicture() ?>" alt="" class="new-moon-picture"></td>
                        <td><?= $currentCard->getName() ?></td>
                        <td><div class="description"><?= $currentCard->getDescription() ?></div></td>
                        <td><?= $currentCard->getPhase() ?></td>
                        <td class="text-right">
                            <a href="<?= $router->generate('card-edit', ['id' => $currentCard->getId()]) ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= $router->generate('card-delete', ['id' => $currentCard->getId()]) . "?token=" .$token ?>">Oui, je veux supprimer</a>
                                    <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>