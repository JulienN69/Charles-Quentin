<?php 
require_once _ROOTPATH_.'/session.php';
require_once _ROOTPATH_.'/template/admin/index.php';

?>

<form method="POST" class="login__form" action="?controller=admin&action=gallery&subaction=create" enctype="multipart/form-data">
    <?php 
    echo $form->input('name', 'Nom de la nouvelle galerie', 'form-group_email');
    ?>
    <button class="addButton" type="submit" name="submit">valider</button>
</form>