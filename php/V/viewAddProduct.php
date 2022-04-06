<?php $title = "Add Product"; ?>
<?php ob_start(); ?>
<div class="container">
    <form action="addProduct" method="post">
        Name: <input type="text" name="name"><br>
        Status: <input type="text" name="status"><br>
        Description: <input type="text" name="description"><br>
        Image url: <input type="text" name="image"><br>
        <?php foreach ($cats as $cat) : ?>
            <input type="checkbox" name="<?= $cat['id'] ?>"> <?= $cat['name'] ?><br>
        <?php endforeach ?>
        <input type="submit">
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>