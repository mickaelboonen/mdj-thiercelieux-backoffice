<a href="<?= $router->generate('card-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Modifier une Carte Nouvelle Lune</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="name">Nom</label>
        <input value="<?= $card->getName() ?>" type="text" name="name" class="form-control" id="name" placeholder="Nom de la Carte">
    </div>
    <div class="form-group">
        <label for="picture">Image de la Carte</label>
        <input value="<?= $card->getPicture() ?>" type="text" name="picture" class="form-control" id="picture" placeholder="Url de l'image de la Carte">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Description de la Carte"><?= $card->getDescription() ?></textarea>
    </div>
    <div class="form-group">
        <label for="phase">¨Phase de la Carte</label>
        <select class="custom-select" name="phase" id="phase" aria-describedby="phaseHelpBlock">
        <?php $phases=['Pleine Lune', 'Croissant', 'Nouvelle Lune'];
            foreach ($phases as $currentPhase) : ?>
                <option <?= $currentPhase === $card->getPhase() ? 'selected' : '' ?> value="<?= $currentPhase;?>"><?= $currentPhase;?></option>
            <?php endforeach; ?>
        </select>
        <small id="phaseHelpBlock" class="form-text text-muted">
            <strong>Pleine Lune</strong> pour un effet immédiat. <strong>Croissant</strong> pour un effet différé. <strong>Nouvelle Lune</strong> pour un effet permanent.
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>