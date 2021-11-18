<a href="<?= $router->generate('role-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Modifier un Rôle</h2>

<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="name">Nom</label>
        <input value="<?= $role->getName() ?>" type="text" name="name" class="form-control" id="name" placeholder="Nom de la catégorie">
    </div>
    <div class="form-group">
        <label for="picture">Image du rôle</label>
        <input value="<?= $role->getPicture() ?>" type="text" name="picture" class="form-control" id="picture" placeholder="Url de l'image du rôle">
    </div>
    <div class="form-group">
        <label for="excerpt">Excerpt</label>
        <textarea type="text" name="excerpt" class="form-control" id="excerpt" placeholder="Remplir une description raccourcie du rôle"><?= $role->getExcerpt() ?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Description du rôle"><?= $role->getDescription() ?></textarea>
    </div>
    <div class="form-group">
        <label for="side">Camp du Rôle</label>
        <select class="custom-select" name="side" id="side" aria-describedby="sideHelpBlock">
            <?php $sides=["Village", "Loup-Garou", "Ambigü", "Solitaire"]; dump($sides) ?>
            <?php foreach ($sides as $currentSide) : ?>
                <option <?= $role->getSide() === $currentSide ? 'selected' : ''; ?> value="<?= $currentSide; ?>"><?= $currentSide; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="first_night">Appel de la 1ère nuit</label>
        <select class="custom-select" name="first_night" id="first_night" aria-describedby="first_nightHelpBlock"> 
            <option <?php $role->getFirstNight() == 0 ? 'selected' : ''; ?> value="0">Non</option>
            <option <?php $role->getFirstNight() == 1 ? 'selected' : ''; ?> value="1">Oui</option>
        </select>
    </div>
    <div class="form-group">
        <label for="game_id">Jeu correspondant</label>
        <select class="custom-select" name="game_id" id="game_id" aria-describedby="game_idHelpBlock">
        <?php foreach($games as $currentGame) : ?>
                <?php $selected = ($currentGame->getId() == $role->getGameId()) ? 'selected' : '' ; ?>
                <option <?= $selected ?> value="<?= $currentGame->getId(); ?>"><?= $currentGame->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>