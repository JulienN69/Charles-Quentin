
<?php 
require_once _ROOTPATH_.'/template/header.php';
use App\HTML\Form;
use App\Entity\User;

$user = new User();
$errors = [];

// if (!empty($_POST)) {
//     if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){

//     }
// } 
if (!empty($_POST)) {
    if (empty($_POST['email']) || empty($_POST['password'])){
        $errors['password'] = ['Identifiant ou mot de passe incorrect'];
    }
} 

$form = new Form($user, $errors);

?>

<img src="assets\images\family-ge2e36490b_1280.jpg" alt="image" class="login__img"> 

    <h1 class="login__title">Connexion</h1>
    <form method="POST" class="login__form">
        <?php 
        echo $form->input('email', 'adresse email');
        echo $form->input('password', 'mot de passe');
        ?>

            <button type="submit">connexion</button>
    </form>

    


    <?php




?>

<?php require_once _ROOTPATH_.'/template/footer.php' ?>