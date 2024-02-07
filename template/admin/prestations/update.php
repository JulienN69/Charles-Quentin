<?php 
require_once _ROOTPATH_.'/template/admin/index.php';
?>

<section class="dashboardContent">

    <form action="?controller=admin&action=prestations&subaction=update&id=<?= $prestation->getId()?>" method="post" class="formPrestation" enctype="multipart/form-data">
        <h2 class="formPrestation__title">Modification d'une nouvelle prestation</h2>

        <label for="title">Titre</label>
        <input type="text" name="title" value="<?= $prestation->getTitle() ?>"  required>

        <label for="price">Prix</label>
        <input type="text" name="price" value="<?= $prestation->getPrice() ?>" required>

        <label for="description">Description</label>
        <textarea name="description" rows="4" required><?= $prestation->getDescription() ?></textarea>

        <img src="assets/images/<?= $prestation->getPhoto() ?>" alt="image" style="width: 20%; padding-top: 1rem">

        <label for="photo">Changer image de couverture :</label>
        <input type="file" name="photo" accept="image/*">

        <input type="submit" value="valider" class="formPrestation__button">
    </form>

</section>

</main>
</body> 