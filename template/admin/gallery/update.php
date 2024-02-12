<?php 
require_once _ROOTPATH_.'/session.php';
require_once _ROOTPATH_.'/template/admin/index.php';

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : $gallery['name'];

?>

<form method="post" class="login__form" action="?controller=admin&action=gallery&subaction=update&id=<?= $gallery['gallery_id'] ?>">
    <?php 
    echo $form->input('name', 'Nom de la nouvelle galerie', 'form-group_email', $name);
    ?>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <?php if (isset($errors['csrf_token'])){
                        echo '<div class="invalid-feedback">'. $errors['csrf_token'] . '</div>';
                    } else if (isset($errors['title'])){
                        echo '<div class="invalid-feedback">'. $errors['title'] . '</div>';
                    }
                    ?>
    <button class="addButton" type="submit" name="submit">valider</button>
</form>