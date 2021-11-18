<a href="<?= $router->generate('game-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Ajouter un jeu</h2>

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
        <label for="picture">Picture</label>
        <input type="text" name="picture" class="form-control" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
        <small id="pictureHelpBlock" class="form-text text-muted">
            URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
        </small>
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="text" name="icon" class="form-control" id="icon" placeholder="image jpg, gif, svg, png" aria-describedby="iconHelpBlock">
        <small id="pictureHelpBlock" class="form-text text-muted">
            URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
        </small>
    </div>
    <div class="form-group">
        <label for="specificity">Spécificité</label>
        <input  type="number" min="0" max="1" name="specificity" class="form-control" id="specificity" aria-describedby="specificityHelpBlock">
        <small id="pictureHelpBlock" class="form-text text-muted">
            Si le jeux a des spécificités, choisir 1. Sinon, choisir 0.
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>