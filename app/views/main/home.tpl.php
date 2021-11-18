<?php if(isset($_SESSION['connectedUser'])): ?>
    <p class="display-4">Bonjour <?= $_SESSION['connectedUser']->getPseudo() ?> </p>
<?php else: ?>
    <p class="display-4">
        Bienvenue dans le backOffice du <strong>Maître du Jeu de Thiercelieux</strong>...
    </p>
<?php endif; ?>

<div class="row mt-5">
    <div class="col-12 col-md-6">
        <div class="card text-white mb-3 bg-primary">
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card text-white mb-3">
        </div>
    </div>
</div>