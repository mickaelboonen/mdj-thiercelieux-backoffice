<a href="<?= $router->generate('specificity-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Ajouter un villageois</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">

    <div class="form-group">
        <label for="name">Nom du villageois</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nom du role">
    </div>
    <div class="form-group">
        <label for="picture">Image du rôle</label>
        <input type="text" name="picture" class="form-control" id="picture" placeholder="Image du role" aria-describedby="pictureHelpBlock">
        <small id="pictureHelpBlock" class="form-text text-muted">
            Url de l'image du Villageois.
        </small>
    </div>
    <div class="form-group">
        <label for="token_name">Token name</label>
        <input type="text" name="token_name" class="form-control" id="token_name" placeholder="Nom du role">
    </div>
    <div class="form-group">
        <label for="token_picture">Image du token</label>
        <input type="text" name="token_picture" class="form-control" id="token_picture" placeholder="Image du role" aria-describedby="token_pictureHelpBlock">
        <small id="token_pictureHelpBlock" class="form-text text-muted">
            Url de l'image du token.
        </small>
    </div>
    <div class="form-group">
        <label for="quantity">Quantité</label>
        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantité du role" aria-describedby="quantityHelpBlock">
        <small id="quantityHelpBlock" class="form-text text-muted">
            Renseigner la quantité maximale de joueurs ayant ce rôle.
        </small>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" placeholder="Description du rôle" aria-describedby="descriptionHelpBlock"></textarea>
    </div>
    <div class="form-group">
        <label for="has_building">Bâtiment</label>
        <select type="number" name="has_building" class="form-control" id="has_building" placeholder="Image du role">
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
    </div>
    <div class="form-group">
        <label for="is_permanent">Pouvoir</label>
        <select type="number" name="is_permanent" class="form-control" id="is_permanent" placeholder="Camp du rôle" aria-describedby="powerHelpBlock">
            <option value="1">Permanent</option>
            <option value="0">Unique</option>
        </select>
        <small id="powerHelpBlock" class="form-text text-muted">
            Sélectioner "Unique" si le pouvoir ne peut s'appliquer qu'une seule fois dans la partie.
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>