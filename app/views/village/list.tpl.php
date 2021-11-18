<a href="<?= $router->generate('village-add') ?>" class="btn btn-success float-right">Ajouter</a>
        <h2>Liste des villageois</h2>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Bâtiment</th>
                    <th scope="col">Image Token</th>
                    <th scope="col">Token Name</th>
                    <th scope="col">Pouvoir</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Jeu</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($villagers as $currentVillager) : ?>
                    <tr>
                        <th scope="row"><?= $currentVillager->getId() ?></th>
                        <td><img src="<?= $currentVillager->getPicture() ?>" alt="" class="roles-picture"></td>
                        <td><?= $currentVillager->getName() ?></td>
                        <td><div class="description"><?= $currentVillager->getDescription() ?></div></td>
                        <td><?php $building = $currentVillager->getHasBuilding() == 1 ? 'Oui' : 'Non '; echo $building; ?></td>
                        <td><img src="<?= $currentVillager->getTokenPicture() ?>" alt=""></td>
                        <td><?= $currentVillager->getTokenName() ?></td>
                        <td><?php $power = $currentVillager->getIsPermanent() == 0 ? 'Unique' : 'Permanent '; echo $power; ?></td>
                        <td><?= $currentVillager->getQuantity() ?></td>
                        <td class="text-right">
                            <a href="<?= $router->generate('village-edit', ['id' => $currentVillager->getId()]) ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= $router->generate('village-delete', ['id' => $currentVillager->getId()]) . "?token=" .$token ?>">Oui, je veux supprimer</a>
                                    <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>