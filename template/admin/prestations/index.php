<?php 
require_once _ROOTPATH_.'/template/admin/index.php';
?>

<section class="dashboardContent">


    <div class="dashboardContent__grid">
        <div class="dashboardContent__grid--item">
                <div class="title">Titre</div>
                <div class="price">Prix</div>
                <div class="description">Description</div>
            </div>
        <?php foreach ($prestations as $prestation) { ?>
            <div class="dashboardContent__grid--item">
                <div><?= $prestation['title'] ?></div>
                <div><?= $prestation['prices'] ?></div>
                <div><?= $prestation['description'] ?></div>
            </div>
        <?php } ?>
    </div>




</section>

</main>
</body> 
