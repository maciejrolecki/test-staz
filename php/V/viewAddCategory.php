<?php $title = "Add Category"; ?>
<?php ob_start(); ?>
<div class="container">
<form action="M/addCategory.php" method="post">
Category Name: <input type="text" name="name"><br>
<input type="submit">
</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>