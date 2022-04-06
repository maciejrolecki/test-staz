<?php $title = "Add Peoduct"; ?>
<?php ob_start(); ?>
<div class="container">
<form action="displayAddCategory" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>