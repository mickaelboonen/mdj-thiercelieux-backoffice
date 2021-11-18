<a href="<?= $router->generate('user-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Modifier un Utilisateur</h2>



<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input value="<?= $user->getPseudo() ?>" type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo de l'utilisateur">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input value="<?= $user->getEmail() ?>" type="email" name="email" class="form-control" id="email" placeholder="Email de l'utilisateur">
    </div>
    <div class="form-group">
        <label for="currentPassword">Mot de passe</label>
        <input value="" type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Mot de passe">
    </div>
    <div class="form-group">
        <label for="newPassword">Nouveau mot de passe</label>
        <input value="" type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Nouveau mot de passe">
    </div>
    <div class="form-group">
        <label for="passwordVerification">Vérification du mot de passe</label>
        <input value="" type="password" name="passwordVerification" class="form-control" id="passwordVerification" placeholder="Vérification de mot de passe">
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input value="<?= $user->getAvatar() ?>" type="text" name="avatar" class="form-control" id="avatar" placeholder="Url de l'avatar" aria-describedby="subtitleHelpBlock">
    </div>
    <div class="form-group">
        <label for="role">Rôle</label>
        <select class="custom-select" name="role" id="role" aria-describedby="roleHelpBlock">
            <option <?= $user->getRole() === 'guest' ? 'selected' : ''; ?> value="guest">Invité</option>
            <option <?= $user->getRole() === 'game-manager' ? 'selected' : ''; ?> value="game-manager">Game Manager</option>
            <option <?= $user->getRole() === 'admin' ? 'selected' : ''; ?>  value="admin">Administrateur</option>
        </select>
        <small id="roleHelpBlock" class="form-text text-muted">
            Le role de l'utilisateur
        </small>
    </div>
    <div class="form-group">
        <label for="status">Statut</label>
        <select class="custom-select" name="status" id="status" aria-describedby="statusHelpBlock">
            <option <?= $user->getStatus() == '1' ? 'selected' : ''; ?> value="1">Actif</option>
            <option <?= $user->getStatus() == '2' ? 'selected' : ''; ?> value="2">Inactif</option>
        </select>
        <small id="statusHelpBlock" class="form-text text-muted">
            Le statut de l'utilisateur
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>