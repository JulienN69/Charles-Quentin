<?php 
require_once _ROOTPATH_.'/template/admin/index.php';
?>

<section class="dashboarContent">
    <ul>
        <?php foreach ($gallery as $gal) { ?>
            <li><?= $gal['name'] ?></li>
        <?php } ?>
    </ul>
</section>

</main>
</body> 