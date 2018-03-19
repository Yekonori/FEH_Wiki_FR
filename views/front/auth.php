<?php ob_start(); ?>
    <link rel="stylesheet" href="/assets/stylesheets/nav.css">
<?php $stylesheetNav = ob_get_clean(); ?>

<?php ob_start(); ?> <!-- Démarre le tampon de sortie -->

<!-- ******************************************************** -->
<!-- ******************** Page d'Accueil ******************** -->
<!-- ******************************************************** -->

<?php include  __DIR__ . '/../partials/nav.php'; ?>

<!-- ob_get_clean -> récupere les octets dans la mémoire tampon et les mets dans une variable | echo pour l'afficher -->
<?php $content = ob_get_clean(); ?>


<?php include __DIR__ . '/../layouts/master.php' ; ?>