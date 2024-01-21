<?php 
require_once _ROOTPATH_.'/template/admin/index.php';
$numberTotalPrestation = count($prestations);
?>

<section class="dashboardContent">


    <div class="dashboardContent__grid">
        <div class="dashboardContent__grid--header">
                <div class="numberTotal">Prestations(<?= $numberTotalPrestation ?>)</div>
                <a class="addButton" href="?controller=admin&action=prestations&subaction=create">Ajouter</a>
            </div>
        <div class="dashboardContent__grid--item">
                <div class="titleHeader">Titre</div>
                <div class="priceHeader">Prix</div>
                <div class="descriptionHeader">Description</div>
            </div>
        <?php foreach ($prestations as $prestation) { ?>
            <div class="dashboardContent__grid--item">
                <div><?= $prestation['title'] ?></div>
                <div class="price"><?= $prestation['price'] ?></div>
                <div class="description"><?= $prestation['description'] ?></div>
                <div class="buttonContainer">
                    <a class="updateButton" href="?controller=admin&action=prestations&subaction=update&id=<?= $prestation['id']; ?>">modifier</a>
                    <a class="deleteButton" href="#">supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>




</section>

</main>
</body> 
