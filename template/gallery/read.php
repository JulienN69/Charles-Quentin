<?php require_once _ROOTPATH_.'/template/header.php' ?>

<main class="gallery--main">
    <section class="gallery">

        <nav class="gallery-nav">
            <?php
            foreach ($gallery as $gall) {
                echo '<a 
                    href="?controller=gallery&action=read&category='.$gall['gallery_id'].'"
                    data-category-id="'.$gall['gallery_id'].'" 
                    class="gallery-nav__a gallery-js-'.$gall['name'].'">'. $gall['name'] . '</a>';
            }
            ?>
        </nav>

    
        <div class="gallery-photos">
            <div class="gallery-photo">

                <?php
                
                foreach ($photos as $photo) {
                    echo '<div class="gallery-photo__container">';
                    echo '<img src="assets/images/mariage/' . $photo['name'] .'" alt="image" class="gallery-photo__img"></img>';
                    echo '</div>';
                }
            
                ?>
            </div>
            <div class="arrow-container">
                <div class="arrow-container__btn--right">
                    <a class="arrow-js-right" >&lt;</a>
                </div>
                <div class="arrow-container__btn--left">
                    <a class="arrow-js-left">&gt;</a>
                </div>
            </div>
        </div>
    </section>
</main>
            <footer class="footer">
                <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0 0 50 50" fill="black">
                        <path d="M32,11h5c0.552,0,1-0.448,1-1V3.263c0-0.524-0.403-0.96-0.925-0.997C35.484,2.153,32.376,2,30.141,2C24,2,20,5.68,20,12.368 V19h-7c-0.552,0-1,0.448-1,1v7c0,0.552,0.448,1,1,1h7v19c0,0.552,0.448,1,1,1h7c0.552,0,1-0.448,1-1V28h7.222 c0.51,0,0.938-0.383,0.994-0.89l0.778-7C38.06,19.518,37.596,19,37,19h-8v-5C29,12.343,30.343,11,32,11z"></path>
                        </svg>
                </a>
                <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0 0 50 50" fill="black">
                        <path d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z"></path>
                        </svg>
                </a>
            </footer>
            <script src="assets/js/gallery.js"></script>
            <script src="assets/js/photos.js"></script>
            <script src="assets/js/script.js"></script>
        </body>
</html>