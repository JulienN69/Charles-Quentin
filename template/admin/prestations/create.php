<?php 
require_once _ROOTPATH_.'/template/admin/index.php';
?>

<section class="dashboardContent">

    <form action="?controller=admin&action=prestations&subaction=create" method="post" class="formPrestation" enctype="multipart/form-data">
        <h2 class="formPrestation__title">Création d'une nouvelle prestation</h2>
        <label for="title">Titre</label>
        <input type="text" name="title" required>

        <label for="price">Prix</label>
        <input type="text" name="price" required>

        <label for="description">Description</label>
        <textarea name="description" rows="4" required></textarea>

        <label for="photo">Image</label>
        <input type="file" name="photo" accept="image/*">

        <input type="submit" value="valider" class="formPrestation__button">
    </form>

</section>

</main>
</body> 