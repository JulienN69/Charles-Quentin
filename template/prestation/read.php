<?php require_once _ROOTPATH_.'/template/header.php' ?>


<img src="assets\images\couple-g4b1e56824_640.jpg" alt="image" class="prestation-cover__image">
<h2 class ="prestation-cover__title">prestations</h2>
<div class="prestation-grid-container">

<?php
foreach ($prestations as $prestation) {
    ?>
    <div class="prestation-grid-container__item">
        <img src="assets/images/<?= $prestation['photo'] ?>" alt="image">
        <div class="prestation-grid-container__item__text">
            <span class="prestation-grid-container__item__text--title"><?=  $prestation['title'] ?></span>
            <span class="prestation-grid-container__item__text--prices"><?=  $prestation['price'] ?></span>
        </div>
        <div class="prestation-grid-container__item__description">
            <p class="prestation-grid-container__item__description--p"><?=  $prestation['description'] ?></p>
        </div>
    </div>
    <?php
}
?>



</div>

<?php $footerClass = 'footer-blue'; ?>
<?php require_once _ROOTPATH_.'/template/footer.php' ?>