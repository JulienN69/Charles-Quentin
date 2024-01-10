<?php require_once _ROOTPATH_.'/template/header.php' ?>



    <h1 class="home__title">  backoffice  
    <?php
                echo '<ul>';
                foreach ($gallery as $gal) {

                    echo '<li>' . $gal['name'] . '</li>';

                }
                echo '</ul>';
                ?>
    </h1>
    



<?php require_once _ROOTPATH_.'/template/footer.php' ?>