<?php 
    $pageName = "Réinistialisation de mot de passe";
    require_once 'inc/auto_Include.php';
    
    $auth = App::getAuth();
    $db = App::getDatabase();
    $validator = new Validator($_POST);

    if(!empty($_GET) && !empty($_GET['id']) && !empty($_GET['token'])){
        $user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);
        if($user){
            if(!empty($_POST) && !empty($_POST['password'])){
                $validator->isConfirmed('your_pass',"Vos mots de passes ne correspondent pas !");
                if($validator->isValid()){
                    $db->query('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?', [$auth->hashPassword($_POST['your_pass']), $_GET['id']]);
                    $auth->connect($user);
                    Session::getInstance()->setFlash('success','Votre mot de passe à bien été modifié');
                    App::redirect('shop.php');
                }else{
                    $errors = $validator->getErrors();
                }
            }
        }else{
            Session::getInstance()->setFlash('danger',"Ce token n'est pas valide");
            App::redirect('login.php');
        }
    }else{
        App::redirect('login.php');
    }

?>

    <div class="main">

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/3d-slider-shap.png" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Réinitialisation de mot de passe</h2>
                        <?php require 'inc/head.php'; ?>
                        <?php if(!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <p>Formulaire rempli incorrectement</p>
                                <ul>
                                    <?php foreach($errors as $error): ?>
                                        <li><?= $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_pass" id="your_pass" placeholder="Mot de passe"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass_confirm"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass_confirm" id="your_pass_confirm" placeholder="Confirmer mot de passe"/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="reset" id="reset" class="form-submit" value="Réinitialiser"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php require_once 'inc/footer.php'; ?>