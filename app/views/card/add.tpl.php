<a href="<?= $router->generate('card-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Ajouter un rôle</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">

    <div class="form-group">
        <label for="name">Nom de la Carte</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nom de la Carte">
    </div>
    <div class="form-group">
        <label for="picture">Image de la Carte</label>
        <input type="text" name="picture" class="form-control" id="picture" placeholder="Image de la Carte">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" placeholder="Description de la Carte" aria-describedby="descriptionHelpBlock"></textarea>
    </div>
    <div class="form-group">
        <label for="phase">Phase de la Carte</label>
        <select type="text" name="phase" class="form-control" id="phase" aria-describedby="phaseHelpBlock">
            <option value="">Veuillez choisir la phase de votre carte</option>
            <?php $phases=['Pleine Lune', 'Croissant', 'Nouvelle Lune'];
            foreach ($phases as $currentPhase) : ?>
                <option value="<?= $currentPhase;?>"><?= $currentPhase;?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <small id="phaseHelpBlock" class="form-text text-muted">
        <strong>Pleine Lune</strong> pour un effet immédiat. <strong>Croissant</strong> pour un effet différé. <strong>Nouvelle Lune</strong> pour un effet permanent.
    </small>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>