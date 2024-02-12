<?php 
require_once _ROOTPATH_.'/session.php';
require_once _ROOTPATH_.'/template/admin/index.php';

$titleValue = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : $prestation->getTitle();
$priceValue = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : $prestation->getPrice();
$descriptionValue = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : $prestation->getDescription();

?>

<section class="dashboardContent">

    <form action="?controller=admin&action=prestations&subaction=update&id=<?= $prestation->getId()?>" method="post" class="formPrestation" enctype="multipart/form-data">
        <h2 class="formPrestation__title">Modification d'une nouvelle prestation</h2>

        <label for="title">Titre</label>
        <input type="text" name="title" value="<?= $titleValue ?>"  required>
        <?php if (isset($errors['title'])){
            echo '<div class="invalid-feedback">'. $errors['title'] . '</div>';
        }
        ?>

        <label for="price">Prix</label>
        <input type="text" name="price" value="<?= $priceValue ?>" required>
        <?php if (isset($errors['price'])){
            echo '<div class="invalid-feedback">'. $errors['price'] . '</div>';
        }
        ?>

        <label for="description">Description</label>
        <textarea name="description" rows="4" required><?= $descriptionValue ?></textarea>
        <?php if (isset($errors['description'])){
            echo '<div class="invalid-feedback">'. $errors['description'] . '</div>';
        }
        ?>

        <img src="assets/images/<?= $prestation->getPhoto() ?>" alt="image" style="width: 20%; padding-top: 1rem">

        <label for="photo">Changer image de couverture :</label>
        <input type="file" name="photo">
        <?php if (isset($errors['photo'])){
            echo '<div class="invalid-feedback">'. $errors['photo'] . '</div>';
        }
        ?>

        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">

        <input type="submit" value="valider" class="formPrestation__button">
    </form>

</section>

</main>
</body> 