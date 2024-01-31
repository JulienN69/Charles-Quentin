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
                    <a class="deleteButton js-modal" href="#">supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>

<aside id="modal" class="modal" aria-hidden="true" role="dialog" aria-modal="false" aria-labelledby="titlemodal" style="display:none">
    <div class="modal-wrapper">
        <h3 id="titlemodal">Voulez-vous supprimer cette prestation ? (attention tout suppression est définitive)</h3>
        <div class="modalButtonsContainer">
            <button type="button" class="addButton">oui</button>
            <button type="button" class="addButton js-modal-close">non</button>
        </div>
    </div>
</aside>



</section>

</main>
</body> 
<script src="assets/js/modal.js"></script>
