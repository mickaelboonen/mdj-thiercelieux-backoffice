<a href="<?= $router->generate('game-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Modifier un jeu</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="name">Nom</label>
        <input value="<?= $game->getName() ?>" type="text" name="name" class="form-control" id="name" placeholder="Nom de la catégorie">
    </div>
    <div class="form-group">
        <label for="hash">Hash</label>
        <input value="<?= $game->getHash() ?>" type="text" name="hash" class="form-control" id="hash" placeholder="hash">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Description" aria-describedby="subtitleHelpBlock"><?= $game->getDescription() ?></textarea>
    </div>
    <div class="form-group">
        <label for="picture">Image</label>
        <input  value="<?= $game->getPicture() ?>"  type="text" name="picture" class="form-control" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
        <small id="pictureHelpBlock" class="form-text text-muted">
            URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
        </small>
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input  value="<?= $game->getIcon() ?>"  type="text" name="icon" class="form-control" id="icon" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
        <small id="pictureHelpBlock" class="form-text text-muted">
            URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
        </small>
    </div>
    <div class="form-group">
        <label for="specificity">Spécificité</label>
        <input  value="<?= $game->getSpecificity() ?>"  type="number" min="0" max="1" name="specificity" class="form-control" id="specificity_id" placeholder="true : 1; false : 0" aria-describedby="pictureHelpBlock">
        <small id="pictureHelpBlock" class="form-text text-muted">
            Si le jeux a des spécificités, choisir 1. Sinon, choisir 0.
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>