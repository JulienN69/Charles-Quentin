<?php require_once _ROOTPATH_.'/template/header.php' ?>


<img src="assets\images\couple-g4b1e56824_640.jpg" alt="image" class="prestation-cover__image">
<h2 class ="prestation-cover__title">prestations</h2>
<div class="prestation-grid-container">

<?php

foreach ($prestations as $prestation) {
    echo '<div class="prestation-grid-container__item">';
    echo '<img src="assets/images/' . $prestation['photo'] . '" alt="image">';
    echo '<div class="prestation-grid-container__item__text">';
    echo '<span class="prestation-grid-container__item__text--title">' . $prestation['title'] . '</span>';
    echo '<span class="prestation-grid-container__item__text--prices">' . $prestation['price']. '</span>';
    echo '</div>';
    echo '<div class="prestation-grid-container__item__description">';
    echo '<p class="prestation-grid-container__item__description--p">' . $prestation['description'] . '</p>';
    echo '</div>';
    echo '</div>';
}
?>



</div>

<?php $footerClass = 'footer-blue'; ?>
<?php require_once _ROOTPATH_.'/template/footer.php' ?>