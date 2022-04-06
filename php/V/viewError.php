<?php $title = "Error"; ?>
<html lang="en">

<head>
    <title>Error</title>
</head>
<?php ob_start(); ?>

<body>Error ! Page not found </body>

</html>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>