<a href="<?= $router->generate('specificity-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Ajouter une spécificité</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">

    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nom du jeu">
    </div>
    <div class="form-group">
        <label for="hash">Hash</label>
        <input type="text" name="hash" class="form-control" id="hash" placeholder="Hash du jeu">
    </div>
    <div class="form-group">
        <label for="subtitle">Description</label>
        <textarea name="description" class="form-control" id="subtitle" placeholder="Description" aria-describedby="subtitleHelpBlock"></textarea>
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