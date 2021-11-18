<a href="<?= $router->generate('specificity-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Ajouter une règle</h2>

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
        <label for="specificity_id">Spécificité correspondant</label>
        <select class="custom-select" name="specificity_id" id="specificity_id" aria-describedby="game_idHelpBlock">
            <?php foreach($specificities as $currentSpecificity) : ?>
                <option value="<?= $currentSpecificity->getId(); ?>"><?= $currentSpecificity->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>