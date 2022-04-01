<?php $title = "Erreur"; ?>
    <html lang="fr">
    <?php ob_start(); ?>
    <body>Erreur !  Page not found </body>
    </html>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>