<?php 
require_once _ROOTPATH_.'/session.php';
require_once _ROOTPATH_.'/template/admin/index.php';

$titleValue = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
$priceValue = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '';
$descriptionValue = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
?>

<section class="dashboardContent">

    <form action="?controller=admin&action=prestations&subaction=create" method="post" class="formPrestation" enctype="multipart/form-data">
        <h2 class="formPrestation__title">Création d'une nouvelle prestation</h2>
        <label for="title">Titre</label>
        <input type="text" name="title" required value="<?= $titleValue ?>">
        <?php if (isset($errors['title'])){
            echo '<div class="invalid-feedback">'. $errors['title'] . '</div>';
        }
        ?>

        <label for="price">Prix</label>
        <input type="text" name="price" required value="<?= $priceValue ?>">
        <?php if (isset($errors['price'])){
            echo '<div class="invalid-feedback">'. $errors['price'] . '</div>';
        }
        ?>

        <label for="description">Description</label>
        <textarea name="description" rows="4" required ><?= $descriptionValue ?></textarea>
        <?php if (isset($errors['description'])){
            echo '<div class="invalid-feedback">'. $errors['description'] . '</div>';
        }
        ?>

        <label for="photo">Photo de couverture :</label>
        <input type="file" name="photo">
        <?php if (isset($errors['photo'])){
            echo '<div class="invalid-feedback">'. $errors['photo'] . '</div>';
        }
        ?>

        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        <?php if (isset($errors['csrf_token'])){
            echo '<div class="invalid-feedback">'. $errors['csrf_token'] . '</div>';
        }
        ?>

        <input type="submit" value="valider" class="formPrestation__button">
    </form>

</section>

</main>
</body> 