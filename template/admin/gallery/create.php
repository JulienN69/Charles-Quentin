<?php 
require_once _ROOTPATH_.'/session.php';
require_once _ROOTPATH_.'/template/admin/index.php';

?>

<form method="post" class="login__form" action="?controller=admin&action=gallery&subaction=create">
    <?php 
    echo $form->input('name', 'Nom de la nouvelle galerie', 'form-group_email');
    ?>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <?php if (isset($errors['csrf_token'])){
                        echo '<div class="invalid-feedback">'. $errors['csrf_token'] . '</div>';
                    }
                    ?>
    <button class="addButton" type="submit" name="submit">valider</button>
</form>