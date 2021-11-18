<a href="<?= $router->generate('village-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Modifier un Villageois</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="name">Nom</label>
        <input value="<?= $villager->getName() ?>" type="text" name="name" class="form-control" id="name" placeholder="Nom de la catégorie">
    </div>
    <div class="form-group">
        <label for="picture">Image du rôle</label>
        <input value="<?= $villager->getPicture() ?>" type="text" name="picture" class="form-control" id="picture" placeholder="Url de l'image du rôle">
    </div>
    <div class="form-group">
        <label for="token_name">Nom du token</label>
        <input value="<?= $villager->getTokenName() ?>" type="text" name="token_name" class="form-control" id="token_name" placeholder="Nom de la catégorie">
    </div>
    <div class="form-group">
        <label for="token_picture">Image du rôle</label>
        <input value="<?= $villager->getTokenPicture() ?>" type="text" name="token_picture" class="form-control" id="token_picture" placeholder="Url de l'image du rôle">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Description du rôle"><?= $villager->getDescription() ?></textarea>
    </div>
    <div class="form-group">
        <label for="quantity">Quantité</label>
        <input value="<?= $villager->getQuantity() ?>" type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantité du role" aria-describedby="quantityHelpBlock">
        <small id="quantityHelpBlock" class="form-text text-muted">
            Renseigner la quantité maximale de joueurs ayant ce rôle.
        </small>
    </div>
    <div class="form-group">
        <label for="has_building">Bâtiment</label>
        <select class="custom-select" name="has_building" id="has_building" aria-describedby="has_buildingHelpBlock">
            <option <?php $villager->getHasBuilding() == 0 ? 'selected' : ''; ?> value="0">Non</option>
            <option <?php $villager->getHasBuilding() == 1 ? 'selected' : ''; ?> value="1">Oui</option>
        </select>
    </div>
    <div class="form-group">
        <label for="is_permanent">Pouvoir</label>
        <select type="number" name="is_permanent" class="form-control" id="is_permanent" placeholder="Camp du rôle" aria-describedby="powerHelpBlock">
            <option <?php $villager->getIsPermanent() == 0 ? 'selected' : ''; ?> value="0">Unique</option>
            <option <?php $villager->getIsPermanent() == 1 ? 'selected' : ''; ?> value="1">Permanent</option>
        </select>
        <small id="powerHelpBlock" class="form-text text-muted">
            Sélectioner "Unique" si le pouvoir ne peut s'appliquer qu'une seule fois dans la partie.
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>