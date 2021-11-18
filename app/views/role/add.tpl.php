<a href="<?= $router->generate('specificity-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Ajouter un rôle</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">

    <div class="form-group">
        <label for="name">Nom du rôle</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nom du role">
    </div>
    <div class="form-group">
        <label for="picture">Image du rôle</label>
        <input type="text" name="picture" class="form-control" id="picture" placeholder="Image du role">
    </div>
    <div class="form-group">
        <label for="excerpt">Excerpt</label>
        <textarea name="excerpt" class="form-control" id="excerpt" placeholder="Description raccourcie du rôle" aria-describedby="excerptHelpBlock"></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" placeholder="Description du rôle" aria-describedby="descriptionHelpBlock"></textarea>
    </div>
    <div class="form-group">
        <label for="side">Camp du rôle</label>
        <select type="text" name="side" class="form-control" id="side" placeholder="Camp du rôle">
            <option value="">Veuillez choisir un camp pour votre rôle</option>
            <option value="Village">Village</option>
            <option value="Loup-Garou">Loup-Garou</option>
            <option value="Ambigü">Ambigü</option>
            <option value="Solitaire">Solitaire</option>
        </select>
    </div>
    <div class="form-group">
        <label for="first_night">Appel de la première nuit</label>
        <select class="custom-select" name="first_night" id="first_night" aria-describedby="first_nightHelpBlock">
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
        <small id="pictureHelpBlock" class="form-text text-muted">
            Sélectionner "Oui" si le rôle doit être appelé seulement la premièer nuit.
        </small>
    </div>
    <div class="form-group">
        <label for="game_id">Jeu correspondant</label>
        <select class="custom-select" name="game_id" id="game_id" aria-describedby="game_idHelpBlock">
            <?php foreach($games as $currentGame) : ?>
                <option value="<?= $currentGame->getId(); ?>"><?= $currentGame->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>