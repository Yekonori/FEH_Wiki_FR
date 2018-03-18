<?= ob_start(); ?> <!-- Démarre le tampon de sortie -->

<!-- ******************************************************** -->
<!-- ******************** Page d'Accueil ******************** -->
<!-- ******************************************************** -->

<p>Tout fonctionne ?</p>

<!-- ob_get_clean -> récupere les octets dans la mémoire tampon et les mets dans une variable | echo pour l'afficher -->
<?= $content = ob_get_clean(); ?>


<?= include __DIR__ . '/../layouts/master.php' ; ?>