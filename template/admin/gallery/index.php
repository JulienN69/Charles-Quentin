<?php 
require_once _ROOTPATH_.'/template/admin/index.php';
?>


<section class="dashboardContent">


    <div class="dashboardContent__grid">
        <div class="dashboardContent__grid--header">
                <div class="numberTotal">Gallerie</div>
                <a class="addButton" href="#">Ajouter</a>
            </div>
        <div class="dashboardContent__grid--item">
                <div class="titleHeader">Titre</div>
                <div class="priceHeader">Nombre de photos</div>
                <div class="descriptionHeader">Miniatures</div>
            </div>
        <?php foreach ($gallery as $gall) { ?>
            <div class="dashboardContent__grid--item">
                <div><?= $gall['name'] ?></div>
                <div class="price">
<?php
    $numberPhotosByGallery = 0;
    foreach ($photos as $photo) {
        if ($photo['gallery_id'] === $gall['gallery_id']) {
            $numberPhotosByGallery += 1;
        }
    }
    echo $numberPhotosByGallery;
?>               
                </div>
                <div class="miniature-container">
<?php

    foreach ($photos as $photo) {
        if ($photo['gallery_id'] === $gall['gallery_id']) {
            echo '<img
            class="miniature"
            src="assets/images/' . $gall['name'] . '/' . $photo['name'] . '"
            alt="img" />';
        }
    }

?> 

                </div>
                <div class="buttonContainer">
                    <a class="updateButton" href="#">modifier</a>
                    <a class="js-modal" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 64 64">
<path d="M 28 6 C 25.791 6 24 7.791 24 10 L 24 12 L 23.599609 12 L 10 14 L 10 17 L 54 17 L 54 14 L 40.400391 12 L 40 12 L 40 10 C 40 7.791 38.209 6 36 6 L 28 6 z M 28 10 L 36 10 L 36 12 L 28 12 L 28 10 z M 12 19 L 14.701172 52.322266 C 14.869172 54.399266 16.605453 56 18.689453 56 L 45.3125 56 C 47.3965 56 49.129828 54.401219 49.298828 52.324219 L 51.923828 20 L 12 19 z M 20 26 C 21.105 26 22 26.895 22 28 L 22 51 L 19 51 L 18 28 C 18 26.895 18.895 26 20 26 z M 32 26 C 33.657 26 35 27.343 35 29 L 35 51 L 29 51 L 29 29 C 29 27.343 30.343 26 32 26 z M 44 26 C 45.105 26 46 26.895 46 28 L 45 51 L 42 51 L 42 28 C 42 26.895 42.895 26 44 26 z"></path>
</svg></a>
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


