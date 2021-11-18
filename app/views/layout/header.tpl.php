<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>oShop BackOffice</title>

    <!-- Getting bootstrap (and reboot.css) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--
        And getting Font Awesome 4.7 (free)
        To get HTML code icons : https://fontawesome.com/v4.7.0/icons/
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <!-- We can still have our own CSS file -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php
    // On inclut des sous-vues => "partials"
    include __DIR__.'/../partials/nav.tpl.php';
    ?>

    <div class="container my-4">

        <!-- On vérifie qu'on a un message de succès et si oui on l'affiche
        @copyright 2021 Paul Gaugris -->
        <?php if (isset($_SESSION['successMessage'])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['successMessage'] ?>
                <?php unset($_SESSION['successMessage']) ?>
            </div>
        <?php endif; ?>

        <!-- On vérifie qu'on a  une erreur stockée dans la session. Et si c'est le cas, on l'affiche -->
        <?php if(isset($_SESSION['errorMessage'])): ?>
            <?php foreach($_SESSION['errorMessage'] as $errorMessage): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errorMessage ?>
                </div>
            <?php endforeach; ?>
            <!-- Après avoir affiché l'erreur de la session, on n'en a plus besoin, on peut la supprimer. -->
            <?php unset($_SESSION['errorMessage']);?>
        <?php endif; ?>

