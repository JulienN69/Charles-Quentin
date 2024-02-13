<?php require_once _ROOTPATH_.'/template/header.php' ?>

<img src="assets\images\photographe.jpg" alt="image" class="contact-cover">
<div class="contact-cover__container">

    <div class="form-contact">
        <h2 class="form-contact__title">Contactez-moi</h2>
        <form action="https://formspree.io/f/mrgnqepy" method="post" class="form-contact__container">
            <div class="form-contact__container--div">
                <div class="form-contact__group" style="margin-right: 5px">
                    <label for="firstName">Prénom</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="form-contact__group" style="margin-left: 5px">
                    <label for="lastName">Nom</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            </div>           
            <div class="form-contact__group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-contact__group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-contact__group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-contact__group">
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>

</div>

<?php $footerClass = 'footer-blue'; ?>
<?php require_once _ROOTPATH_.'/template/footer.php' ?>