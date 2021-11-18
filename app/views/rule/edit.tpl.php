<a href="<?= $router->generate('specificity-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Modifier une Spécificité</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="name">Nom</label>
        <input value="<?= $specificity->getName() ?>" type="text" name="name" class="form-control" id="name" placeholder="Nom de la catégorie">
    </div>
    <div class="form-group">
        <label for="hash">Hash</label>
        <input value="<?= $specificity->getHash() ?>" type="text" name="hash" class="form-control" id="hash" placeholder="hash">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Description" aria-describedby="subtitleHelpBlock"><?= $specificity->getDescription() ?></textarea>
    </div>
    <div class="form-group">
        <label for="game_id">Jeu correspondant</label>
        <select class="custom-select" name="game_id" id="game_id" aria-describedby="game_idHelpBlock">
        <?php foreach($games as $currentGame) : ?>
                <?php $selected = ($currentGame->getId() == $specificity->getGameId()) ? 'selected' : '' ; ?>
                <option <?= $selected ?> value="<?= $currentGame->getId(); ?>"><?= $currentGame->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>