<?php 
	$pageName = "Mot de passe oublier";
	require_once 'inc/auto_Include.php';
	
	$errors = array();

	$validator = new Validator($_POST);
	$db = App::getDatabase();
	$auth = App::getAuth();
	$session = Session::getInstance();

	if(!empty($_POST) && !empty($_POST['login_mail']) && !empty($_POST['reset'])):
		$validator->isEmail('login_mail', "Votre E-mail n'est pas valide !");
		if($validator->isValid()){
			if($auth->resetPassword($db, $_POST['login_mail'])){
				$session->setFlash('success', 'Les instructions du rappel de mot de passe vous ont été envoyées par e-mail');
			} else {
				$session->setFlash('danger', 'Aucun compte ne correspond à cet adresse');
			}
		}else{
			$errors = $validator->getErrors();
		}
	endif;
?>

	<div class="main">
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure><img src="img/3d-slider-shap.png" alt="sing up image"></figure>
					</div>

					<div class="signin-form">
						<h2 class="form-title">Réinitialisation</h2>

						
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
								<label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="login_mail" id="your_email" placeholder="E-mail"/>
							</div>
							<div class="form-group form-button">
								<input type="submit" name="reset" id="reset" class="form-submit" value="Envoyer"/>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</section>

	</div>
	<?php require_once 'inc/footer.php'; ?>