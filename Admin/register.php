<?php 
	require_once 'inc/auto_Include.php';
	require_once 'inc/functions.php';

	$title = "Fenouil" ;
	$function = "Register";

	$errors = array();

	$validator = new Validator($_POST);
	$db = App::getDatabase();

	require_once 'inc/header.php';
	require_once 'inc/navbar.php';
	
	if(!empty($_POST) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['addresse']) && !empty($_POST['town'])):

		$validator->isAlpha('firstName', "Nom invalid !");
		$validator->isAlpha('lastName', "Prenom invalid !");
		$validator->isEmail('email', "Invalid email !");
		($validator->isValid())? $validator->isUniq('email', $db, 'users', 'Cet email est déjà utilisé !') : null ;

		$validator->isPhone('phone', 'Phone Field is Incorrect !');
		($validator->isValid())? $validator->isUniq('phone', $db, 'users', 'Cet numéro est déjà utilisé !') : null ;

		$validator->isConfirmed('password', 'Mot de passe invalide ou identique !');
		$validator->isSized('addresse', 10, 250, 'Addresse trop courte !', 'Addresse trop longe!');
		$validator->isSized('town', 3, 50, 'Town trop courte !', 'Town trop longe!');
		$validator->isSized('town', 3, 50, 'Town trop courte !', 'Town trop longe!');
		
		$validator->isChecked('agree-term', 'Veuillez accepter les conditions d"utilisations');

		if($validator->isValid()){
			App::getAuth()->register(
				$db, 
				ucfirst(htmlspecialchars($_POST['firstName'])),
				ucfirst(htmlspecialchars($_POST['lastName'])),
				strtolower(htmlspecialchars($_POST['email'])),
				htmlspecialchars($_POST['phone']),
				htmlspecialchars($_POST['password']),
				htmlspecialchars($_POST['addresse']),
				htmlspecialchars($_POST['town']),
				htmlspecialchars($_POST['country'])
			);

			$session = Session::getInstance();
			$session->setFlash('success', 'Un email de confirmation vous à été envoyé pour valider votre compte');
			App::redirect("login.php");

		} else {
			$errors = $validator->getErrors();
		}
	endif;
?>
	
	<!--======= SUB BANNER =========-->
	<section class="sub-bnr" data-stellar-background-ratio="0.5">
		<div class="position-center-center">
			<div class="container">
				<h4>REGISTER</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
					Sed feugiat, tellus vel tristique posuere, diam</p>
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">REGISTER</li>
				</ol>
			</div>
		</div>
	</section>
	
	<!-- Content -->
	<div id="content"> 
		
		<!--======= PAGES INNER =========-->
		<section class="chart-page padding-top-100 padding-bottom-100">
			<div class="container"> 
				
				<!-- Payments Steps -->
				<div class="shopping-cart"> 
					
					<!-- SHOPPING INFORMATION -->
					<div class="cart-ship-info register">
						<div class="row"> 
							
							<!-- REGISTER FORM -->
							<div class="col-sm-12">
								<h6>REGISTER</h6>

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

								<form method="POST">
									<ul class="row">
										
										<!-- Name -->
										<li class="col-md-6">
											<label> *FIRST NAME
												<input type="text" name="firstName" placeholder="First Name" required>
											</label>
										</li>
										<!-- LAST NAME -->
										<li class="col-md-6">
											<label> *LAST NAME
												<input type="text" name="lastName" placeholder="Last Name" required>
											</label>
										</li>
										
										<!-- EMAIL ADDRESSe -->
										<li class="col-md-6">
											<label> *EMAIL ADDRESSe
												<input type="email" name="email" placeholder="Email addresse" required>
											</label>
										</li>
										<!-- PHONE -->
										<li class="col-md-6">
											<label> *PHONE
												<input type="phone" name="phone" placeholder="Phone" required>
											</label>
										</li>
										
										<!-- password -->
										<li class="col-md-6">
											<label> *password
												<input type="password" name="password" placeholder="password" required>
											</label>
										</li>
										
										<!-- password -->
										<li class="col-md-6">
											<label> *password
												<input type="password" name="password_confirm" placeholder="confirm your password" required>
											</label>
										</li>

										<li class="col-md-6"> 
											<!-- ADDRESSe -->
											<label>*ADDRESSe
												<input type="text" name="addresse" placeholder="Addresse" required>
											</label>
										</li>
										
										<!-- COUNTRY -->
										<li class="col-md-6">
											<label> *COUNTRY
												<select class="selectpicker" name="country">
													<option>Select You Country</option>
													<option id="country-country">Lorem</option>
												</select>
											</label>
										</li>
										
										<!-- TOWN/CITY -->
										<li class="col-md-6">
											<label>*TOWN/CITY
												<input type="text" name="town" placeholder="TOWN/CITY" required>
											</label>
										</li>

										<li class="col-md-12">
					                      <div class="checkbox margin-0 margin-top-20">
					                        <input id="checkbox1" name="agree-term" class="styled" type="checkbox">
					                        <label for="checkbox1">I agree <a href="conditions.html">conditions</a></label>
					                      </div>
					                    </li>

										<li class="col-md-12">
											<button type="submit" class="btn">REGISTER NOW</button>
										</li>
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- About -->
		<section class="small-about padding-top-150 padding-bottom-150">
			<div class="container"> 
				
				<!-- Main Heading -->
				<div class="heading text-center">
					<h4>about PAVSHOP</h4>
					<p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odio luctus non. Nulla lacinia,
						eros vel fermentum consectetur, risus purus tempc, et iaculis odio dolor in ex. </p>
				</div>
				
				<!-- Social Icons -->
				<ul class="social_icons">
					<li><a href="#."><i class="icon-social-facebook"></i></a></li>
					<li><a href="#."><i class="icon-social-twitter"></i></a></li>
					<li><a href="#."><i class="icon-social-tumblr"></i></a></li>
					<li><a href="#."><i class="icon-social-youtube"></i></a></li>
					<li><a href="#."><i class="icon-social-dribbble"></i></a></li>
				</ul>
			</div>
		</section>
		
		<?php require_once 'inc/newsletter.php'; ?>
	</div>
	<?php require_once 'inc/footer.php'; ?>
	</body>
</html>