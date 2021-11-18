<a href="<?= $router->generate('user-list') ?>" class="btn btn-success float-right">Retour</a>
<h2>Ajouter un utilisateur</h2>
<form action="" method="POST" class="mt-5">
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <?php 
            $pseudo = (isset($_SESSION['inputValues']['pseudo'])) ? 
            $_SESSION['inputValues']['pseudo'] : ''; 
        ?>
        <input value="<?= $pseudo ?>" type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo">
    </div>
    <div class="form-group">
        <label for="email">Email</label>

        <?php 
            $email = (isset($_SESSION['inputValues']['email'])) ? 
            $_SESSION['inputValues']['email'] : ''; 
        ?>
        <input value="<?= $email ?>" type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <?php 
            $avatar = (isset($_SESSION['inputValues']['avatar'])) ? 
            $_SESSION['inputValues']['avatar'] : ''; 
        ?>
        <input value="<?= $avatar ?>" type="text" name="avatar" class="form-control" id="avatar" placeholder="Prénom">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <?php 
            $password = (isset($_SESSION['inputValues']['password'])) ? 
            $_SESSION['inputValues']['password'] : ''; 
        ?>
        <input value="<?= $password ?>" type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
    </div>
    <div class="form-group">
        <label for="passwordVerification">Vérification du Mot de passe</label>
        <input value="" type="password" name="passwordVerification" class="form-control" id="passwordVerification" placeholder="Mot de passe">
    </div>
    <div class="form-group">
        <label for="role">Rôle</label>
        <select class="custom-select" name="role" id="role" aria-describedby="roleHelpBlock">
        <?php 
                $selectedAdmin = (isset($_SESSION['inputValues']['role']) && $_SESSION['inputValues']['role'] == 'admin') ? 'selected' : ''; 

                $selectedCatalog = (isset($_SESSION['inputValues']['role']) && $_SESSION['inputValues']['role'] == 'catalog-manager') ? 'selected' : ''; 
            ?>
            <option <?= $selectedCatalog ?> value="guest">Invité</option>
            <option <?= $selectedCatalog ?> value="game-manager">Game Manager</option>
            <option <?= $selectedAdmin ?>  value="admin">Administrateur</option>
        </select>
        <small id="roleHelpBlock" class="form-text text-muted">
            Le role de l'utilisateur
        </small>
    </div>
    <div class="form-group">
        <label for="status">Statut</label>
        <select class="custom-select" name="status" id="status" aria-describedby="statusHelpBlock">
            <?php 
                $selectedActif = (isset($_SESSION['inputValues']['status']) && $_SESSION['inputValues']['status'] == '1') ? 'selected' : ''; 

                $selectedInactif = (isset($_SESSION['inputValues']['status']) && $_SESSION['inputValues']['status'] == '2') ? 'selected' : ''; 
            ?>
            <option <?= $selectedActif ?> value="1">Actif</option>
            <option <?= $selectedInactif ?> value="2">Inactif</option>
        </select>
        <small id="statusHelpBlock" class="form-text text-muted">
            Le statut de l'utilisateur
        </small>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>