<?php 
$bodyClass = "adminBody";
$menuClass = "adminMenu";
require_once _ROOTPATH_.'/session.php';
require_once _ROOTPATH_.'/template/admin/index.php';
?>


<section class="dashboardContent galleryPhoto">
    <h2 class="galleryPhoto__title">photos</h2>

    <div class="categoryPhoto">
        <?php foreach ($gallery as $gall) { ?>
            <div>
                <h3><?= $gall['name'] ?></h3>
                <form action="?controller=admin&action=photo&subaction=read" method="post" class="formPhoto" enctype="multipart/form-data">                  

                <label class="custom-file-input">
                    <input type="file" name="photo" id="photoInput">
                    Add photo <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1.5rem"><path d="M3 19H21V21H3V19ZM13 5.82843V17H11V5.82843L4.92893 11.8995L3.51472 10.4853L12 2L20.4853 10.4853L19.0711 11.8995L13 5.82843Z"></path></svg>
                </label>
                <div id="fileName"></div>
                    <?php if (isset($errors['photo'])){
                        echo '<div class="invalid-feedback">'. $errors['photo'] . '</div>';
                    }
                    ?>
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <?php if (isset($errors['csrf_token'])){
                        echo '<div class="invalid-feedback">'. $errors['csrf_token'] . '</div>';
                    }
                    ?>
                    <input type="hidden" name="gallery_id" value="<?= $gall['gallery_id'] ?>">
                    <input type="hidden" name="gallery_name" value="<?= $gall['name'] ?>">
                    <input type="submit" value="valider" class="formPhoto__button">

                </form>
                <?php foreach ($photos as $photo) { 
                    if ($photo['gallery_id'] === $gall['gallery_id']) {                    
                    ?>
                    <div class="categoryPhoto__grid">
                        <img class="mini" src="assets/images/<?= $gall['name'] ?>/<?= $photo['name'] ?>" alt="<?= $photo['name'] ?>">
                        <div class="delete-overlay">
                            <a class="delete-button js-modal" title="Supprimer" href="?controller=admin&action=photo&subaction=delete&id=<?= $photo['photo_id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64" width="24">
                                    <path d="M 28 6 C 25.791 6 24 7.791 24 10 L 24 12 L 23.599609 12 L 10 14 L 10 17 L 54 17 L 54 14 L 40.400391 12 L 40 12 L 40 10 C 40 7.791 38.209 6 36 6 L 28 6 z M 28 10 L 36 10 L 36 12 L 28 12 L 28 10 z M 12 19 L 14.701172 52.322266 C 14.869172 54.399266 16.605453 56 18.689453 56 L 45.3125 56 C 47.3965 56 49.129828 54.401219 49.298828 52.324219 L 51.923828 20 L 12 19 z M 20 26 C 21.105 26 22 26.895 22 28 L 22 51 L 19 51 L 18 28 C 18 26.895 18.895 26 20 26 z M 32 26 C 33.657 26 35 27.343 35 29 L 35 51 L 29 51 L 29 29 C 29 27.343 30.343 26 32 26 z M 44 26 C 45.105 26 46 26.895 46 28 L 45 51 L 42 51 L 42 28 C 42 26.895 42.895 26 44 26 z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        <?php } ?>
    </div>

</section>

<aside id="modal" class="modal" aria-hidden="true" role="dialog" aria-modal="false" aria-labelledby="titlemodal" style="display:none">
            <div class="modal-wrapper">
                <h3 id="titlemodal">Voulez-vous supprimer cette photo ? (attention tout suppression est définitive)</h3>
                <div class="modalButtonsContainer">
                    <button type="button" class="addButton js-modal-validate">oui</button>
                    <button type="button" class="addButton js-modal-close">non</button>
                </div>
            </div>
        </aside>

</main>
</body> 

<script src="assets/js/modal.js"></script>
<script src="assets/js/fileUpload.js"></script>