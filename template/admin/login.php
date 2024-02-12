<?php 
require_once _ROOTPATH_.'/session.php';
require_once _ROOTPATH_.'/template/header.php';
use App\HTML\Form;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\NotFoundException;


$user = new User();
$errors = [];

if (!empty($_POST)) {
    $user->setEmail($_POST['email']);
    $errors['password'] = 'Adresse email ou mot de passe incorrect';
    
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $u = new UserRepository;
        try {
            $user = $u->findUserByEmail($_POST['email']); 
            if ($user !== null) {
                if (password_verify($_POST['password'], $user->getPassword()) === true) {
                    session_regenerate_id(true);
                    $_SESSION['user'] = $user;
                    if ($user->getRoles() === ['admin']) {
                        header('location: ?controller=admin&action=home');
                        exit;
                    } else {
                        header('location: ?controller=home&action=home');
                        exit;
                    }
                }   else {
                    $user->setPassword('');
                }
            }             
        } catch (NotFoundException $e){    
        }
    } 
} 

$form = new Form($user, $errors);

?>

<img src="assets\images\family-ge2e36490b_1280.jpg" alt="image" class="login__img"> 

<h1 class="login__title">Connexion</h1>

<?php  if(isset($_GET['forbidden'])):  ?>
<div class="errorAccess">
    Vous ne pouvez pas accéder à la page
</div>
<?php endif; ?>

<form method="POST" class="login__form" action="?controller=admin&action=login" onsubmit="validateForm()">
    <?php 
    echo $form->input('email', 'adresse email', 'form-group_email');
    echo $form->input('password', 'mot de passe', 'form-group_password');
    ?>
    <button class="addButton" type="submit" name="submit">connexion</button>
</form>

<script src="assets/js/validateForm.js"></script>
<?php require_once _ROOTPATH_.'/template/footer.php' ?>
