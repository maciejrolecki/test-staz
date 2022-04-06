<?php $title = "Add Category"; ?>
<?php ob_start(); ?>
<div class="container">
<form action="addCategory" method="post">
Category Name: <input type="text" name="name"><br>
<input type="submit" value="Submit">
</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>